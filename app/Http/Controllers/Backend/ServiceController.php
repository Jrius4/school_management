<?php

namespace App\Http\Controllers\Backend;

use App\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceRequest;
use Intervention\Image\Facades\Image;
use App\Http\Controllers\Backend\BackendController;

class ServiceController extends BackendController
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
            $services       = Service::onlyTrashed()->with('serviceCategory')->latest()->paginate($this->limit);
            $serviceCount   = Service::onlyTrashed()->count();
            $onlyTrashed = TRUE;
        }
        else
        {
            $services       = Service::with('serviceCategory')->latest()->paginate($this->limit);
            $serviceCount   = Service::count();
        }

        $statusList = $this->statusList($request);

        return view("backend.services.index", compact('services', 'serviceCount', 'onlyTrashed', 'statusList'));
    }

    private function statusList($request)
    {
        return [
            'all'       => Service::count(),
            'trash'     => Service::onlyTrashed()->count(),
        ];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Service $service)
    {
        return view('backend.services.create',compact('service'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ServiceRequest $request)
    {
        $data = $this->handleRequest($request);

        $newService = Service::create($data);
        
        return redirect('/backend/services')->with('message', 'Your service was created successfully!');
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
        $service = Service::findOrFail($id);
        return view('backend.services.edit',compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ServiceRequest $request, $id)
    {
        $service  = Service::findOrFail($id);
        $oldImage = $service->image;
        $data     = $this->handleRequest($request);

        $service->update($data);

        if ($oldImage !== $service->image) {
            $this->removeImage($oldImage);
        }
        return redirect('/backend/services')->with('message', 'Your service was updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Service::findOrFail($id)->delete();

        return redirect('/backend/services')->with('trash-message-service', ['Your service moved to Trash', $id]);
    }

    public function forceDestroy($id)
    {
        $service = Service::withTrashed()->findOrFail($id);
        $service->forceDelete();

        $this->removeImage($service->image);

        return redirect('/backend/services?status=trash')->with('message', 'Your service has been deleted successfully');
    }

    public function restore($id)
    {
        $service = Service::withTrashed()->findOrFail($id);
        $service->restore();

        return redirect()->back()->with('message', 'You service has been moved from the Trash');
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
