<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test;
use Illuminate\Support\Facades\Hash;

class TestController extends Controller

{

    public function index(){
        return view('test');
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
        ]);

        // Create a new user instance
        $test = new Test();
        $test->name = $validatedData['name'];
        $test->email = $validatedData['email'];
        $test->password = Hash::make($validatedData['password']);
        $test->save();

        // Redirect the user after storing the data
        return redirect()->route('tests.index')->with('success', 'User created successfully!');
    }
}
