<?php
//
//namespace App\Http\Controllers\Auth;
//
//use App\Http\Controllers\Controller;
//use App\Models\User;
//use App\Providers\RouteServiceProvider;
//use Illuminate\Auth\Events\Registered;
//use Illuminate\Http\RedirectResponse;
//use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Auth;
//use Illuminate\Support\Facades\Hash;
//use Illuminate\Validation\Rules;
//use Illuminate\View\View;
//
//class RegisteredUserController extends Controller
//{
//    /**
//     * Display the registration view.
//     */
//    public function create(): View
//    {
//        return view('auth.register');
//    }
//
//    /**
//     * Handle an incoming registration request.
//     *
//     * @throws \Illuminate\Validation\ValidationException
//     */
//    public function store(Request $request): RedirectResponse
//    {
//        $request->validate([
//            'FirstName' => ['required', 'string', 'max:255'],
//            'LastName' => ['required', 'string', 'max:255'],
//            'Staff_ID' => ['required', 'string', 'max:255'],
//            'Position_Staff' => ['required', 'string', 'max:255'],
//            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
//            'password' => ['required', 'confirmed', Rules\Password::defaults()],
//            'Gender' => ['required', 'string', 'max:255'],
//            'Dob' => ['required', 'string', 'max:255'],
//            'Department' => ['required', 'string', 'max:255'],
//            'Address' => ['required', 'string', 'max:255'],
//            'Av_leave' => ['required', 'string', 'max:255'],
//            'Phonenumber' => ['required', 'string', 'max:255'],
//            'role' => ['required', 'string', 'max:255'],
//
//         ]);
//
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
//
//        ]);
//
//        event(new Registered($user));
//
//        Auth::login($user);
//
//        return redirect(RouteServiceProvider::HOME);
//    }
//}
