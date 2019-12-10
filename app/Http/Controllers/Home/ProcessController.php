<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SystemProcess;
use Faker\Generator as Faker;

class ProcessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $btn_classes = ['btn-warning','btn-warning','btn-success','btn-primary','btn-success','btn-primary'];

        $processes = SystemProcess::get();
        $count=0;


        return view('home.processes.index',compact('processes','btn_classes','count'));
    }




    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(SystemProcess $process)
    {
        return view('home.processes.show',compact('process'));
    }


}
