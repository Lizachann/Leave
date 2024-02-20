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
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
//            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
//            'password' => ['required', 'confirmed', Rules\Password::defaults()],
//            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
//            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
            'email' => 'required|string|max:255|email|unique:users,email',
            'password' => 'required|string|min:4',

            'staff_ID' => ['required', 'string', 'max:255'],
            'position_staff' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'string', 'max:255'],
            'dob' => ['required', 'string', 'max:255'],
            'department' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'av_leave' => ['required', 'string', 'max:255'],
            'phone_num' => ['required', 'string', 'max:255'],
            'role' => ['required', 'string', 'max:255'],

         ]);

        $user = new User();
        $user->first_name = $validatedData['first_name'];
        $user->last_name = $validatedData['last_name'];
        $user->email = $validatedData['email'];
        $user->password = Hash::make($validatedData['password']);
        $user->staff_ID = $validatedData['staff_ID'];
        $user->position_staff = $validatedData['position_staff'];
        $user->gender = $validatedData['gender'];
        $user->dob = $validatedData['dob'];
        $user->department = $validatedData['department'];
        $user->address = $validatedData['address'];
        $user->av_leave = $validatedData['av_leave'];
        $user->phone_num = $validatedData['phone_num'];
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

    public function view_all_leave(){

    }


}
