<?php

namespace App\Http\Controllers;

use App\Models\Tblleave;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class AdminController extends Controller
{
    /**
     * Display the registration view.
     */
    public function addStaff()
    {
        $currentID = User::latest()->value('staff_ID');
        $numericPart = (int)substr($currentID, 1); // Extract numeric part and convert to integer
        $nextNumericPart = $numericPart + 1; // Increment numeric part by 1
        $nextID = "G" . str_pad($nextNumericPart, strlen($currentID) - 1, "0", STR_PAD_LEFT);

        return view('admin.addStaff',[
            'nextID' => $nextID
        ]);
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
            'email' => 'required|string|max:255|email|unique:users,email',
            'password' => 'required|string|min:4',
            'position_staff' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'string', 'max:255'],
            'dob' => ['required', 'string', 'max:255'],
            'department' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'av_leave' => ['required', 'string', 'max:255'],
            'phone_num' => ['required', 'string', 'max:255'],
            'role' => ['required', 'string', 'max:255'],
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        $user = new User($validatedData);

        $user->staff_ID = $request->input('staff_ID');
        $user->save();

        return redirect()->route('admin.addStaff')->with('success', 'User created successfully!');
    }


    public function view_all_leave(){

        $leaves = Tblleave::all();
        $employees = User::all();
        $pages = 0;

        return view('admin.view_leave', [
            'leaves' => $leaves,
            'employees' => $employees,
            'pages' => $pages,
        ]);
    }

    public function view_pending_leave(){


        $leaves = Tblleave::where('admin_remark', 0 )->get();
        $employees = User::all();
        $pages = 1;

        return view('admin.view_leave', [
            'leaves' => $leaves,
            'employees' => $employees,
            'pages' => $pages,
        ]);
    }

    public function view_approved_leave(){

        $leaves = Tblleave::where('admin_remark', 1)->get();
        $employees = User::all();
        $pages = 2;

        return view('admin.view_leave', [
            'leaves' => $leaves,
            'employees' => $employees,
            'pages' => $pages,
        ]);
    }

    public function view_rejected_leave(){

        $leaves = Tblleave::where('admin_remark', 2 )->get();
        $employees = User::all();
        $pages = 3;

        return view('admin.view_leave', [
            'leaves' => $leaves,
            'employees' => $employees,
            'pages' => $pages,
        ]);
    }

    public function view_leave_detail($id){

        $leaves = Tblleave::where('id', $id)->get();

        $leave = Tblleave::findOrFail($id);
        $emp_id = $leave->emp_id;
        $employees = User::where('id', $emp_id)->get();


        return view('admin.leave_detail',[
            'leaves' => $leaves,
            'employees' => $employees,
            'id' =>  $id,
        ]);


    }

    public function admin_approval(Request $request, $id){

        $leave = Tblleave::findOrFail($id);

        $allLeaves = Tblleave::all();

        $leave->admin_remark = (int)$request->input('admin_remark');
        $leave->admin_date = Carbon::now()->toDateString();
        $emp_id = $leave->emp_id;

        $employee = User::findOrFail($emp_id);

        if($leave->admin_remark == 1 && $leave->leave_type === "Annual Leave"){
                $leaveDays_left = $employee->av_leave - $leave->request_days;
                $employee->av_leave = $leaveDays_left;
                foreach ($allLeaves as $allLeave){
                    $leaveId = $allLeave->emp_id;
                    if($leaveId == $emp_id){
                        $allLeave->leaveDays_left = $leaveDays_left;
                    }
                    $allLeave->save();
                }
            }else{
            foreach ($allLeaves as $allLeave){
                $leaveId = $allLeave->emp_id;
                if($leaveId == $emp_id){
                    $allLeave->leaveDays_left = $employee->av_leave;
                }
                $allLeave->save();
            }
        }

        $employee->save();
        $leave->save();

        return redirect()->route('view_all_leave') ->
        with(
            'success' , 'Change Status Approval successfully!'
        );


//        return redirect()->route('view_leave_detail', [$id]) ->
//        with(
//            'success' , 'Change Status Approval successfully!'
//         );
    }



}
