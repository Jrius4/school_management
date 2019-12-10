<?php

namespace App\Http\Controllers\Backend;

use App\NdebiTechClient;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Http\Requests\NdebiTechClientRequest;
use App\Http\Controllers\Backend\BackendController;

class NdebiTechClientController extends BackendController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $uploadPath;

    public function __construct()
    {
        parent::__construct();
        $this->uploadPath = public_path(config('cms.image.directory'));
    }

    public function index(Request $request)
    {
        $onlyTrashed = FALSE;

        if (($status = $request->get('status')) && $status == 'trash')
        {
            $clients       = NdebiTechClient::onlyTrashed()->latest()->paginate($this->limit);
            $clientCount   = NdebiTechClient::onlyTrashed()->count();
            $onlyTrashed = TRUE;
        }
        else
        {
            $clients       = NdebiTechClient::latest()->paginate($this->limit);
            $clientCount   = NdebiTechClient::count();
        }

        $statusList = $this->statusList($request);

        return view("backend.ndebi-tech-clients.index", compact('clients', 'clientCount', 'onlyTrashed', 'statusList'));
    }

    private function statusList($request)
    {
        return [
            'all'       => NdebiTechClient::count(),
            'trash'     => NdebiTechClient::onlyTrashed()->count(),
        ];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(NdebiTechClient $client)
    {
        return view('backend.ndebi-tech-clients.create',compact('client'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NdebiTechClientRequest $request)
    {
        $data = $this->handleRequest($request);

        $newclient = NdebiTechClient::create($data);
        
        return redirect('/backend/ndebi-tech-clients')->with('message', 'Your client was created successfully!');
    }

    private function handleRequest($request)
    {
        $data = $request->all();

        if ($request->hasFile('logo'))
        {
            $image       = $request->file('logo');
            $fileName    = $image->getClientOriginalName();
            $destination = $this->uploadPath;

            $successUploaded = $image->move($destination, $fileName);

            if ($successUploaded)
            {
                $width     = config('cms.image.thumbnail.width');
                $height    = config('cms.image.thumbnail.height');
                $extension = $image->getClientOriginalExtension();
                $thumbnail = str_replace(".{$extension}", "_thumb.{$extension}", $fileName);

                Image::make($destination . '/' . $fileName)
                    ->resize($width, $height)
                    ->save($destination . '/' . $thumbnail);
            }

            $data['logo'] = $fileName;
        }

        return $data;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = NdebiTechClient::findOrFail($id);
        return view('backend.ndebi-tech-clients.edit',compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $client  = NdebiTechClient::findOrFail($id);
        $oldImage = $client->logo;
        $data     = $this->handleRequest($request);

        $client->update($data);

        if ($oldImage !== $client->logo) {
            $this->removeImage($oldImage);
        }
        return redirect('/backend/ndebi-tech-clients')->with('message', 'Your client was updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        NdebiTechClient::findOrFail($id)->delete();

        return redirect('/backend/ndebi-tech-clients')->with('trash-message-client', ['Your client moved to Trash', $id]);
    }

    public function forceDestroy($id)
    {
        $client = NdebiTechClient::withTrashed()->findOrFail($id);
        $client->forceDelete();

        $this->removeImage($client->image);

        return redirect('/backend/ndebi-tech-clients?status=trash')->with('message', 'Your client has been deleted successfully');
    }

    public function restore($id)
    {
        $client = NdebiTechClient::withTrashed()->findOrFail($id);
        $client->restore();

        return redirect()->back()->with('message', 'You client has been moved from the Trash');
    }

    private function removeImage($image)
    {
        if ( ! empty($image) )
        {
            $imagePath     = $this->uploadPath . '/' . $image;
            $ext           = substr(strrchr($image, '.'), 1);
            $thumbnail     = str_replace(".{$ext}", "_thumb.{$ext}", $image);
            $thumbnailPath = $this->uploadPath . '/' . $thumbnail;

            if ( file_exists($imagePath) ) unlink($imagePath);
            if ( file_exists($thumbnailPath) ) unlink($thumbnailPath);
        }
    }
}
