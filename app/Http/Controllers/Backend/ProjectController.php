<?php

namespace App\Http\Controllers\Backend;

use App\Project;
use Illuminate\Http\Request;
use App\Http\Requests\ProjectRequest;
use Intervention\Image\Facades\Image;
use App\Http\Controllers\Backend\BackendController;

class ProjectController extends BackendController
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
            $projects       = Project::onlyTrashed()->with('projectCategory')->orderBy('created_at','asc')->paginate($this->limit);
            $projectCount   = Project::onlyTrashed()->count();
            $onlyTrashed    = TRUE;
        }
        else
        {
            $projects       = Project::with('projectCategory')->orderBy('created_at','asc')->paginate($this->limit);
            $projectCount   = Project::count();
        }

        $statusList = $this->statusList($request);

        return view("backend.projects.index", compact('projects', 'projectCount', 'onlyTrashed', 'statusList'));
    }

    private function statusList($request)
    {
        return [
            'all'       => Project::count(),
            'trash'     => Project::onlyTrashed()->count(),
        ];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Project $project)
    {
        return view('backend.projects.create',compact('project'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectRequest $request)
    {
        $data = $this->handleRequest($request);

        $newProject = Project::create($data);

        return redirect('/backend/projects')->with('message', 'Your project was created successfully!');
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
        $project = Project::findOrFail($id);
        return view('backend.projects.edit',compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProjectRequest $request, $id)
    {
        $project  = Project::findOrFail($id);
        $oldImage = $project->image;
        $data     = $this->handleRequest($request);

        $project->update($data);

        if ($oldImage !== $project->image) {
            $this->removeImage($oldImage);
        }
        return redirect('/backend/projects')->with('message', 'Your project was updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Project::findOrFail($id)->delete();

        return redirect('/backend/projects')->with('trash-message-project', ['Your project moved to Trash', $id]);
    }

    public function forceDestroy($id)
    {
        $project = Project::withTrashed()->findOrFail($id);
        $project->forceDelete();

        $this->removeImage($project->image);

        return redirect('/backend/projects?status=trash')->with('message', 'Your project has been deleted successfully');
    }

    public function restore($id)
    {
        $project = Project::withTrashed()->findOrFail($id);
        $project->restore();

        return redirect()->back()->with('message', 'You project has been moved from the Trash');
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
