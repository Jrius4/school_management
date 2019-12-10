<?php

namespace App\Http\Controllers\Backend;

use App\ClientTestimony;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Http\Requests\ClientTestimonyRequest;
use App\Http\Controllers\Backend\BackendController;

class ClientTestimonyController extends BackendController
{
    protected $uploadPath;

    public function __construct()
    {
        parent::__construct();
        $this->uploadPath = public_path(config('cms.image.directory'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $onlyTrashed = FALSE;

        if (($status = $request->get('status')) && $status == 'trash')
        {
            $testimonies       = ClientTestimony::onlyTrashed()->latest()->paginate($this->limit);
            $testimonyCount   = ClientTestimony::onlyTrashed()->count();
            $onlyTrashed    = TRUE;
        }
        else
        {
            $testimonies       = ClientTestimony::latest()->paginate($this->limit);
            $testimonyCount   = ClientTestimony::count();
        }

        $statusList = $this->statusList($request);

        return view("backend.client-testimonies.index", compact('testimonies', 'testimonyCount', 'onlyTrashed', 'statusList'));
    }

    private function statusList($request)
    {
        return [
            'all'       => ClientTestimony::count(),
            'trash'     => ClientTestimony::onlyTrashed()->count(),
        ];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(ClientTestimony $testimony)
    {
        return view('backend.client-testimonies.create',compact('testimony'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClientTestimonyRequest $request)
    {
        $data = $this->handleRequest($request);

        $newTestimony = ClientTestimony::create($data);
        
        return redirect('/backend/client-testimonies')->with('message', 'Your testimony was created successfully!');
    }

    private function handleRequest($request)
    {
        $data = $request->all();

        if ($request->hasFile('image'))
        {
            $image       = $request->file('image');
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

            $data['image'] = $fileName;
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
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $testimony = ClientTestimony::findOrFail($id);
        return view('backend.client-testimonies.edit',compact('testimony'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ClientTestimonyRequest $request, $id)
    {
        $testimony  = ClientTestimony::findOrFail($id);
        $oldImage = $testimony->image;
        $data     = $this->handleRequest($request);

        $testimony->update($data);

        if ($oldImage !== $testimony->image) {
            $this->removeImage($oldImage);
        }
        return redirect('/backend/client-testimonies')->with('message', 'Your testimony was updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ClientTestimony::findOrFail($id)->delete();

        return redirect('/backend/client-testimonies')->with('trash-message-testimony', ['Your testimony moved to Trash', $id]);
    }

    public function forceDestroy($id)
    {
        $testimony = ClientTestimony::withTrashed()->findOrFail($id);
        $testimony->forceDelete();

        $this->removeImage($testimony->image);

        return redirect('/backend/client-testimonies?status=trash')->with('message', 'Your testimony has been deleted successfully');
    }

    public function restore($id)
    {
        $testimony = ClientTestimony::withTrashed()->findOrFail($id);
        $testimony->restore();

        return redirect()->back()->with('message', 'You testimony has been moved from the Trash');
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