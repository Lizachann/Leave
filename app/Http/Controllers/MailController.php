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
            return response()->json('great check email box');
        }catch (\Exception $th){
            return response()->json('something went wrong!');

        }
    }
//
//    public function mailFromStaff($subject,$body){
//        $data = [
//            'subject' => $subject,
//            'body' => $body
//        ];
//
//        try {
////            Mail::send('emails.from_staff', $data, function($message) use ($subject) {
////                $message->from(Auth::user()->email, Auth::user()->first_name . ' ' . Auth::user()->last_name)
////                    ->to('testlaravelterm4@gmail.com')
////                    ->subject($subject);
////            });
//
//            Mail::to('')->send(new SendMail($data));
//
//            return response()->json('great check email box');
//        } catch (\Exception $th) {
//            return response()->json('something went wrong!');
//        }

//    }


}
