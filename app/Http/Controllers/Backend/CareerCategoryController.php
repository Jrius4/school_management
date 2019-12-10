<?php

namespace App\Http\Controllers\Backend;

use App\Career;
use App\CareerCategory;
use Illuminate\Http\Request;
use App\Http\Requests\CareerCategoryStoreRequest;
use App\Http\Requests\CareerCategoryUpdateRequest;
use App\Http\Controllers\Backend\BackendController;

class CareerCategoryController extends BackendController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = CareerCategory::with('careers')->orderBy('title')->paginate($this->limit);
        $categoriesCount = CareerCategory::count();
        return view("backend.career-categories.index", compact('categories', 'categoriesCount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(CareerCategory $category)
    {
        return view("backend.career-categories.create", compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CareerCategoryStoreRequest $request)
    {
        CareerCategory::create($request->all());
        return redirect("/backend/career-categories")->with("message", "New career category was created successfully!");
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
        $category=CareerCategory::findOrFail($id);
        return view("backend.career-categories.edit", compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CareerCategoryUpdateRequest $request, $id)
    {
        CareerCategory::findOrFail($id)->update($request->all());

        return redirect("/backend/career-categories")->with("message", "career Category was updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Career::withTrashed()->where('career_category_id', $id)->update(['career_category_id' => config('cms.default_category_id')]);

        $category = CareerCategory::findOrFail($id);
        $category->delete();

        return redirect("/backend/career-categories")->with("message", "career Category was deleted successfully!");
    }
}
