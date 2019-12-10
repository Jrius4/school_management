<?php

namespace App\Http\Controllers\Backend;

use App\Service;
use App\ServiceCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use App\Http\Requests\ServiceCategoryRequest;
use App\Http\Requests\ServiceCategoryStoreRequest;
use App\Http\Controllers\Backend\BackendController;
use App\Http\Requests\ServiceCategoryUpdateRequest;

class ServiceCategoryController extends BackendController
{

    protected $uploadPath;

    public function __construct()
    {
        parent::__construct();
        $this->uploadPath = public_path(config('cms.service-image.directory'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = ServiceCategory::with('services')->orderBy('title')->paginate($this->limit);
        $categoriesCount = ServiceCategory::count();
        return view("backend.service-categories.index", compact('categories', 'categoriesCount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(ServiceCategory $category)
    {
        return view("backend.service-categories.create", compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ServiceCategoryRequest $request)
    {
        $data = $this->handleRequest($request);
        ServiceCategory::create($data);
        return redirect("/backend/service-categories")->with("message", "New service category was created successfully!");
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
        $category=ServiceCategory::findOrFail($id);
        return view("backend.service-categories.edit", compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ServiceCategoryRequest $request, $id)
    {
        $category = ServiceCategory::findOrFail($id);
        $oldImage = $category->image;
        $data     = $this->handleRequest($request);
        $category->update($data);

        if ($oldImage !== $category->image) {
            $this->removeImage($oldImage);
        }

        return redirect("/backend/service-categories")->with("message", "Service Category was updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Service::withTrashed()->where('service_category_id', $id)->update(['service_category_id' => config('cms.default_category_id')]);

        $category = ServiceCategory::findOrFail($id);
        $category->delete();
        $this->removeImage($category->image);

        return redirect("/backend/service-categories")->with("message", "Service Category was deleted successfully!");
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
