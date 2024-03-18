<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Tblleave;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Password;
use Illuminate\View\View;

class ProfileController extends Controller
{
//    /**
//     * Display the user's profile form.
//     */
//    public function edit(Request $request): View
//    {
//        return view('profile.edit', [
//            'user' => $request->user(),
//        ]);
//    }
//
//    /**
//     * Update the user's profile information.
//     */
//    public function update(ProfileUpdateRequest $request): RedirectResponse
//    {
//        $request->user()->fill($request->validated());
//
//        if ($request->user()->isDirty('email')) {
//            $request->user()->email_verified_at = null;
//        }
//
//        $request->user()->save();
//
//        return Redirect::route('profile.edit')->with('status', 'profile-updated');
//    }
//
//    /**
//     * Delete the user's account.
//     */
//    public function destroy(Request $request): RedirectResponse
//    {
//        $request->validateWithBag('userDeletion', [
//            'password' => ['required', 'current-password'],
//        ]);
//
//        $user = $request->user();
//
//        Auth::logout();
//
//        $user->delete();
//
//        $request->session()->invalidate();
//        $request->session()->regenerateToken();
//
//        return Redirect::to('/');
//    }



    public function index(){

        $leaves = Tblleave::where('emp_id',Auth::user()->id)
                        -> orderBy('created_at', 'desc')
                        -> get();
        $approved_leaves = Tblleave::where('emp_id',Auth::user()->id)
                        -> where('admin_remark',1)
                        -> orderBy('created_at', 'desc')
                        -> get();
        $rejected_leaves = Tblleave::where('emp_id',Auth::user()->id)
            -> where('admin_remark',2)
            -> orderBy('created_at', 'desc')
            -> get();
        $pending_leaves = Tblleave::where('emp_id',Auth::user()->id)
            -> where('admin_remark',0)
            -> orderBy('created_at', 'desc')
            -> get();

        if(Auth::user()->role === 'staff'){
            $goto = 'staff_view_leave_detail';
        }else  if(Auth::user()->role === 'admin'){
            $goto = 'admin_view_leave_detail';
        }
        else  if(Auth::user()->role === 'hod'){
            $goto = 'hod_view_leave_detail';
        }

        $page = 0;

        return view('profile.profile',[
            'leaves' => $leaves,
            'goto' => $goto,
            'approved_leaves' => $approved_leaves,
            'rejected_leaves' => $rejected_leaves,
            'pending_leaves' => $pending_leaves,
            'page' => $page

        ]);
    }


    public function setting(Request $request){

        $employee = User::findOrFail(Auth::user()->id);

        $employee->first_name = $request->input('first_name');
        $employee->last_name = $request->input('last_name');
        $employee->phone_num = $request->input('phone_num');
        $employee->dob = $request->input('dob');
        $employee->gender = $request->input('gender');
        $employee->address = $request->input('address');
       if($employee->role == 'admin'){
           $employee->email = $request->input('email');
           $employee->department = $request->input('department');
           $employee->position_staff = $request->input('position_staff');
           $employee->role = $request->input('role');
       }


        $employee->save();

        return redirect()->route('profile') ->
        with(
            'success' , 'Change Status Approval successfully!'
        );
    }



    public function update(Request $request): RedirectResponse
    {
        $validated = $request->validateWithBag('updatePassword', [
            'current_password' => ['required', 'current_password'],
            'password' => 'required|string|min:4',
        ]);

        $request->user()->update([
            'password' => Hash::make($validated['password']),
        ]);

        return redirect()->back() ->
        with(
            'success' , 'Password updated successfully!'
        );
    }


    public function store(Request $request) {

        $userId = Auth::id();
        $profileImage = $request->file('profile');

        // Validate the uploaded file
        $request->validate([
            'profile' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120', // Max size is 2MB (2048 KB)
        ]);


//        // Check if file size exceeds the maximum allowed size
        if ($request->file('profile')->getSize() >5120 * 1024 ) { // Convert KB to bytes

            return redirect()->back()->with('file_error', 'File size exceeds the maximum allowed limit of 2MB!');
        }
//
        try{
            if ($profileImage) {

                // Get the existing profile image path for the user
                $existingProfilePath = User::where('id', $userId)->value('profile');

                // If an existing profile image exists, delete it
                if ($existingProfilePath) {
                    Storage::disk('public')->delete($existingProfilePath);
                }

                $originalFilename = $userId . '_' . $profileImage->getClientOriginalName();

                // Store the uploaded file with its original name
                $profileImagePath = $profileImage->storeAs('profile_images', $originalFilename, 'public');

                // Save the profile image path to the database for the user
                User::where('id', $userId)->update(['profile' => $profileImagePath]);
            }

            return redirect()->back()->with('success', 'Profile Uploaded successfully!');
        } catch (\Exception $e) {

            // Redirect back with error message
            return redirect()->back()->with('error', 'Failed to Uploaded Profile!');
        }
    }


}
