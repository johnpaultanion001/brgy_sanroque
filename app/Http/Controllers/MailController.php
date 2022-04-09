<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;

class MailController extends Controller
{
    public function sendMail(){

        $details = [
            'title' => 'test',
            'body'  => 'this is for testing'
        ];

        Mail::to("johnpaultanion003@gmail.com")
                ->send(new TestMail($details));
        return "EmAIL sended";
    }
}
