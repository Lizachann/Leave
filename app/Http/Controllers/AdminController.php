<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class AdminController extends Controller
{

    public function post(){

            return view('post');
        }

    /**
     * Display the registration view.
     */
    public function addStaff()
    {
        return view('admin.addStaff');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function storeAddStaff(Request $request)
    {
        $validatedData = $request->validate([
            'FirstName' => ['required', 'string', 'max:255'],
            'LastName' => ['required', 'string', 'max:255'],
//            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
//            'password' => ['required', 'confirmed', Rules\Password::defaults()],
//            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
//            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
            'email' => 'required|string|max:255|email|unique:users,email',
            'password' => 'required|string|min:4',

            'Staff_ID' => ['required', 'string', 'max:255'],
            'Position_Staff' => ['required', 'string', 'max:255'],
            'Gender' => ['required', 'string', 'max:255'],
            'Dob' => ['required', 'string', 'max:255'],
            'Department' => ['required', 'string', 'max:255'],
            'Address' => ['required', 'string', 'max:255'],
            'Av_leave' => ['required', 'string', 'max:255'],
            'Phonenumber' => ['required', 'string', 'max:255'],
            'role' => ['required', 'string', 'max:255'],

         ]);

        $user = new User();
        $user->FirstName = $validatedData['FirstName'];
        $user->LastName = $validatedData['LastName'];
        $user->email = $validatedData['email'];
        $user->password = Hash::make($validatedData['password']);
        $user->Staff_ID = $validatedData['Staff_ID'];
        $user->Position_Staff = $validatedData['Position_Staff'];
        $user->Gender = $validatedData['Gender'];
        $user->Dob = $validatedData['Dob'];
        $user->Department = $validatedData['Department'];
        $user->Address = $validatedData['Address'];
        $user->Av_leave = $validatedData['Av_leave'];
        $user->Phonenumber = $validatedData['Phonenumber'];
        $user->role = $validatedData['role'];

        $user->save();

        return redirect()->route('admin.addStaff')->with('success', 'User created successfully!');




//        $user = User::create([
//            'FirstName' => $request->FirstName,
//            'LastName' => $request->LastName,
//            'Staff_ID' => $request->Staff_ID,
//            'Position_Staff' => $request->Position_Staff,
//            'email' => $request->email,
//            'password' => Hash::make($request->password),
//            'Gender' => $request->Gender,
//            'Dob' => $request->Dob,
//            'Department' => $request->Department,
//            'Address' => $request->Address,
//            'Av_leave' => $request->Av_leave,
//            'Phonenumber' => $request->Phonenumber,
//            'role' =>$request->role,

//        ]);
    }
}
