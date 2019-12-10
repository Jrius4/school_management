<?php

namespace App\Http\Controllers\Backend;

use App\QuoteRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Backend\BackendController;

class QuoteRequestController extends BackendController
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
            $quote_requests       = QuoteRequest::onlyTrashed()->with('fieldIndustry')->latest()->paginate(5);
            $quote_requestCount   = QuoteRequest::onlyTrashed()->count();
            $onlyTrashed = TRUE;
        }
        else
        {
            $quote_requests       = QuoteRequest::with('fieldIndustry')->latest()->paginate(5);
            $quote_requestCount   = QuoteRequest::count();
        }

        $statusList = $this->statusList($request);

        return view("backend.quote-requests.index", compact('quote_requests', 'quote_requestCount', 'onlyTrashed', 'statusList'));

    }

    private function statusList($request)
    {
        return [
            'all'       => QuoteRequest::count(),
            'trash'     => QuoteRequest::onlyTrashed()->count(),
        ];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(QuoteRequest $quote_request)
    {
        return view('backend.quote-requests.show',compact('quote_request'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
