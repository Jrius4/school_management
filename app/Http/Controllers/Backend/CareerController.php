<?php

namespace App\Http\Controllers\Backend;

use App\Career;
use Illuminate\Http\Request;
use App\Http\Requests\CareerRequest;
use Intervention\Image\Facades\Image;
use App\Http\Controllers\Backend\BackendController;

class CareerController extends BackendController
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
            $careers       = Career::onlyTrashed()->with('careerCategory')->latest()->paginate($this->limit);
            $careerCount   = Career::onlyTrashed()->count();
            $onlyTrashed = TRUE;
        }
        else
        {
            $careers       = Career::with('careerCategory')->latest()->paginate($this->limit);
            $careerCount   = Career::count();
        }

        $statusList = $this->statusList($request);

        return view("backend.careers.index", compact('careers', 'careerCount', 'onlyTrashed', 'statusList'));
    }

    private function statusList($request)
    {
        return [
            'all'       => Career::count(),
            'trash'     => Career::onlyTrashed()->count(),
        ];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Career $career)
    {
        return view('backend.careers.create',compact('career'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CareerRequest $request)
    {
        $data = $this->handleRequest($request);

        $newcareer = Career::create($data);
        
        return redirect('/backend/careers')->with('message', 'Your career was created successfully!');
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
        $career = Career::findOrFail($id);
        return view('backend.careers.edit',compact('career'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CareerRequest $request, $id)
    {
        $career  = Career::findOrFail($id);
        $oldImage = $career->image;
        $data     = $this->handleRequest($request);

        $career->update($data);

        if ($oldImage !== $career->image) {
            $this->removeImage($oldImage);
        }
        return redirect('/backend/careers')->with('message', 'Your career was updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Career::findOrFail($id)->delete();

        return redirect('/backend/careers')->with('trash-message-career', ['Your career moved to Trash', $id]);
    }

    public function forceDestroy($id)
    {
        $career = Career::withTrashed()->findOrFail($id);
        $career->forceDelete();

        $this->removeImage($career->image);

        return redirect('/backend/careers?status=trash')->with('message', 'Your career has been deleted successfully');
    }

    public function restore($id)
    {
        $career = Career::withTrashed()->findOrFail($id);
        $career->restore();

        return redirect()->back()->with('message', 'You career has been moved from the Trash');
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
