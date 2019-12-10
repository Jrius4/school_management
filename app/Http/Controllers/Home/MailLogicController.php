<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MailLogicController extends Controller
{




    public function mailSend()
    {
        $data = array('name'=>'Sam Jose','body'=>"Test mail");

        Mail::send('emails.mail',$data,function($message){
            $message->to('artisansweb@gmail.com','Artisan Web')
            ->subject('Artisan Web Testing Mail');
            $message->from('kazibwejuliusjunior@gmail.com','Kazibwe Julius Junior');

        });

        echo "Email Sent. Check your inbox.";

    }
}
