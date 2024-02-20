<?php

namespace App\Http\Controllers;

use App\Models\Tblleave;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class StaffController extends Controller
{
    public function applyLeave(){
        $leaves = Tblleave::where('emp_id', Auth::user()->id)->get();



        return view('staff.applyleave', ['
        leaves' => $leaves

        ]);
    }

    public function store_applyLeave(Request $request){

        $validatedData = $request->validate([
            'leave_type' => ['required', 'string', 'max:255'],
            'request_days' => ['required', 'string', 'max:255'],
//            'leaveDays_left' => ['required', 'string', 'max:255'],
            'from_date' => ['required', 'string', 'max:255'],
            'from_time' => ['required', 'string', 'max:255'],
            'to_date' => ['required', 'string', 'max:255'],
            'to_time' => ['required', 'string', 'max:255'],
            'work_covered' => ['required', 'string', 'max:255'],
//            'hod_remark' => ['required', 'string', 'max:255'],
//            'hod_date' => ['required', 'string', 'max:255'],
//            'admin_remark' => ['required', 'string', 'max:255'],
//            'admin_date' => ['required', 'string', 'max:255'],

        ]);

        $leave = new Tblleave();
        $leave->leave_type = $validatedData['leave_type'];
        $leave->request_days = $validatedData['request_days'];
//        $leave->leaveDays_left = $validatedData['leaveDays_left'];
        $leave->leaveDays_left = Auth::user()->av_leave;
        $leave->from_date = $validatedData['from_date'];
        $leave->from_time = $validatedData['from_time'];
        $leave->to_date = $validatedData['to_date'];
        $leave->to_time = $validatedData['to_time'];
        $leave->work_covered = $validatedData['work_covered'];
        $leave->emp_id = Auth::user()->id;

        $leave->hod_remark = '0';
        $leave->hod_date = '0';
        $leave->admin_remark = '0';
        $leave->admin_date = '0';

//        $leave->hod_remark = $validatedData['hod_remark'];
//        $leave->hod_date = $validatedData['hod_date'];
//        $leave->admin_remark = $validatedData['admin_remark'];
//        $leave->admin_date = $validatedData['admin_date'] ;

        $leave->save();

        return redirect()->route('staff.applyLeave')->with('success', 'User created successfully!');

    }


}
