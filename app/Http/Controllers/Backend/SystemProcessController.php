<?php

namespace App\Http\Controllers\Backend;

use App\SystemProcess;
use Illuminate\Http\Request;
use App\Http\Requests\SystemProcessRequest;
use App\Http\Controllers\Backend\BackendController;

class SystemProcessController extends BackendController
{
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
            $processes       = SystemProcess::onlyTrashed()->latest()->paginate($this->limit);
            $processCount   = SystemProcess::onlyTrashed()->count();
            $onlyTrashed = TRUE;
        }
        else
        {
            $processes       = SystemProcess::latest()->paginate($this->limit);
            $processCount   = SystemProcess::count();
        }

        $statusList = $this->statusList($request);

        return view("backend.system-processes.index", compact('processes', 'processCount', 'onlyTrashed', 'statusList'));
    }

    private function statusList($request)
    {
        return [
            'all'       => SystemProcess::count(),
            'trash'     => SystemProcess::onlyTrashed()->count(),
        ];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(SystemProcess $process)
    {
        return view('backend.system-processes.create',compact('process'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SystemProcessRequest $request)
    {
       

        $newprocess = SystemProcess::create($request->all());
        
        return redirect('/backend/system-processes')->with('message', 'Your process was created successfully!');
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
        $process = SystemProcess::findOrFail($id);
        return view('backend.system-processes.edit',compact('process'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SystemProcessRequest $request, $id)
    {
        $process  = SystemProcess::findOrFail($id);

        $process->update($request->all());

        return redirect('/backend/system-processes')->with('message', 'Your process was updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        SystemProcess::findOrFail($id)->delete();

        return redirect('/backend/system-processes')->with('trash-message-process', ['Your process moved to Trash', $id]);
    }

    public function forceDestroy($id)
    {
        $process = SystemProcess::withTrashed()->findOrFail($id);
        $process->forceDelete();


        return redirect('/backend/system-processes?status=trash')->with('message', 'Your process has been deleted successfully');
    }

    public function restore($id)
    {
        $process = SystemProcess::withTrashed()->findOrFail($id);
        $process->restore();

        return redirect()->back()->with('message', 'You process has been moved from the Trash');
    }

}