<?php

namespace App\Http\Controllers\Home;

use App\QuoteRequest;
use App\ClientTestimony;
use App\NdebiTechClient;
use App\ServiceCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function admin()
    {
        return view('layouts.backend.admin');
    }

    public function index()
    {
        $categories = ServiceCategory::get();
        $testimonies = ClientTestimony::get();
        $clients = NdebiTechClient::get();
        return view('home.landing-page.index', compact('categories','testimonies','clients'));
    }


    public function aboutUs()
    {
        return view('home.about-us.index');
    }

    public function contactUs()
    {
        return view('home.contact-us.index');
    }

    public function mail()
    {
        $data = array('name'=>'Kazibwe Julius Junior','body'=>"Test mail");

        Mail::send('emails.index',$data,function($message){
            $message->to('kazibwejuliusjunior@gmail.com','Artisan Web')
            ->subject('Ndebi Tech Web Testing Mail');
            $message->from('kazibwejuliusjunior@gmail.com','Kazibwe Julius Junior');

        });

        echo "Email Sent. Check your inbox.";

    }
}
