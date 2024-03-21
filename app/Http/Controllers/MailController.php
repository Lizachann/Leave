<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;

class MailController extends Controller
{

    public function mail($email,$subject,$body){
        $data = [
            'subject' => $subject,
            'body' => $body,
        ];
        try {

            Mail::to($email)->send(new SendMail($data));
            return true;
        }catch (\Exception $e){
            // If email sending fails, log the error
//            Log::error('Failed to send email: ' . $e->getMessage());

            // Set session error message
//            session()->flash('error', 'Failed to send email.');

            // Return false to indicate failure
            return false;
        }
    }

}
