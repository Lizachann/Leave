<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use illuminate\support\facades\auth;

class HomeController extends Controller
{
    public function index(){

        if(Auth::id()){

            $role=Auth()->user()->role;
            if($role=='staff'){

                return view('staff.staffhome');
            }
            else if($role=='admin'){
                return view('admin.adminhome');
            }
            else if($role=='hod'){
                return view('hod.hodhome');
            }
        }
    }


}
