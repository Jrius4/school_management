<?php

namespace App\Http\Controllers\Backend;

use App\FieldIndustry;
use Illuminate\Http\Request;
use App\Http\Requests\FieldIndustryRequest;
use App\Http\Controllers\Backend\BackendController;

class FieldIndustryController extends BackendController
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
            $industries       = FieldIndustry::onlyTrashed()->latest()->paginate($this->limit);
            $industryCount   = FieldIndustry::onlyTrashed()->count();
            $onlyTrashed = TRUE;
        }
        else
        {
            $industries       = FieldIndustry::latest()->paginate($this->limit);
            $industryCount   = FieldIndustry::count();
        }

        $statusList = $this->statusList($request);

        return view("backend.field-industries.index", compact('industries', 'industryCount', 'onlyTrashed', 'statusList'));
    }

    private function statusList($request)
    {
        return [
            'all'       => FieldIndustry::count(),
            'trash'     => FieldIndustry::onlyTrashed()->count(),
        ];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(FieldIndustry $industry)
    {
        return view('backend.field-industries.create',compact('industry'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FieldIndustryRequest $request)
    {
       

        $newindustry = FieldIndustry::create($request->all());
        
        return redirect('/backend/field-industries')->with('message', 'Your industry was created successfully!');
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
        $industry = FieldIndustry::findOrFail($id);
        return view('backend.field-industries.edit',compact('industry'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FieldIndustryRequest $request, $id)
    {
        $industry  = FieldIndustry::findOrFail($id);

        $industry->update($request->all());

        return redirect('/backend/field-industries')->with('message', 'Your industry was updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        FieldIndustry::findOrFail($id)->delete();

        return redirect('/backend/field-industries')->with('trash-message-industry', ['Your industry moved to Trash', $id]);
    }

    public function forceDestroy($id)
    {
        $industry = FieldIndustry::withTrashed()->findOrFail($id);
        $industry->forceDelete();


        return redirect('/backend/field-industries?status=trash')->with('message', 'Your industry has been deleted successfully');
    }

    public function restore($id)
    {
        $industry = FieldIndustry::withTrashed()->findOrFail($id);
        $industry->restore();

        return redirect()->back()->with('message', 'You industry has been moved from the Trash');
    }

}