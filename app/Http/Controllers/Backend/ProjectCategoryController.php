<?php

namespace App\Http\Controllers\Backend;

use App\Project;
use App\ProjectCategory;
use Illuminate\Http\Request;
use App\Http\Requests\ProjectCategoryStoreRequest;
use App\Http\Controllers\Backend\BackendController;
use App\Http\Requests\ProjectCategoryUpdateRequest;

class ProjectCategoryController extends BackendController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = ProjectCategory::with('projects')->orderBy('title')->paginate($this->limit);
        $categoriesCount = ProjectCategory::count();
        return view("backend.project-categories.index", compact('categories', 'categoriesCount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(ProjectCategory $category)
    {
        return view("backend.project-categories.create", compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectCategoryStoreRequest $request)
    {
        ProjectCategory::create($request->all());
        return redirect("/backend/project-categories")->with("message", "New project category was created successfully!");
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
        $category=ProjectCategory::findOrFail($id);
        return view("backend.project-categories.edit", compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProjectCategoryUpdateRequest $request, $id)
    {
        ProjectCategory::findOrFail($id)->update($request->all());

        return redirect("/backend/project-categories")->with("message", "Service Category was updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Project::withTrashed()->where('project_category_id', $id)->update(['project_category_id' => config('cms.default_category_id')]);

        $category = ProjectCategory::findOrFail($id);
        $category->delete();

        return redirect("/backend/project-categories")->with("message", "Project Category was deleted successfully!");
    }
}
