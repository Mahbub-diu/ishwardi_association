<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\DemoMail;

class MailController extends Controller
{
    /**

     * Write code on Method

     *

     * @return response()

     */

    public function index()

    {

        $mailData = [

            'title' => 'Thanks Email',

            'body' => 'Dear Sir/Madam,'

        ];

         
		
        Mail::to('ashifcse9@gmail.com')->send(new DemoMail($mailData));

           

        dd("Email is sent successfully.");

    }
}
