<?php

namespace App\Http\Controllers;

use App\Models\Tblleave;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
class HodController extends Controller
{

    public function applyLeave(){
        $leaves = Tblleave::where('emp_id', Auth::user()->id)->get();
        return view('hod.applyleave', ['
        leaves' => $leaves

        ]);
    }

    public function store_applyLeave(Request $request){

        $validatedData = $request->validate([
            'leave_type' => ['required', 'string', 'max:255'],
            'request_days' => ['required', 'string', 'max:255'],
            'from_date' => ['required', 'string', 'max:255'],
            'from_time' => ['required', 'string', 'max:255'],
            'to_date' => ['required', 'string', 'max:255'],
            'to_time' => ['required', 'string', 'max:255'],
            'work_covered' => ['required', 'string', 'max:255'],

        ]);

        $leave = new Tblleave();
        $leave->leave_type = $validatedData['leave_type'];
        $leave->request_days = $validatedData['request_days'];
        $leave->leaveDays_left = Auth::user()->av_leave;
        $leave->from_date = $validatedData['from_date'];
        $leave->from_time = $validatedData['from_time'];
        $leave->to_date = $validatedData['to_date'];
        $leave->to_time = $validatedData['to_time'];
        $leave->work_covered = $validatedData['work_covered'];
        $leave->emp_id = Auth::user()->id;

        $leave->hod_remark = '1';
        $leave->hod_date = Carbon::now()->toDateString();
        $leave->admin_remark = '0';
        $leave->admin_date = '0';


        $leave->save();
        return redirect()->route('hod.applyLeave')->with('success', 'Apply Leave Successfully!!');
    }

    public function view_all_leave(){

        $departments = Auth::User()->department;

        $employees = User::where('department', $departments)
            ->where('role', 'staff')
            ->get();

        $employeeIds = $employees->pluck('id');
        $leaves = Tblleave::whereIn('emp_id', $employeeIds)->get();

        return view('hod.view_leave.all_leave', [
            'leaves' => $leaves,
            'employees' => $employees,
        ]);
    }

    public function view_pending_leave(){

        $departments = Auth::User()->department;

        $employees = User::where('department', $departments)->get();

        $employeeIds = $employees->pluck('id');
        $leaves = Tblleave::whereIn('emp_id', $employeeIds)
            -> where('hod_remark', 0 )
            ->get();

        return view('hod.view_leave.pending_leave', [
            'leaves' => $leaves,
            'employees' => $employees,
        ]);
    }

    public function view_approved_leave(){

        $departments = Auth::User()->department;

        $employees = User::where('department', $departments)->get();

        $employeeIds = $employees->pluck('id');
        $leaves = Tblleave::whereIn('emp_id', $employeeIds)
            -> where('hod_remark', 1 )
            ->get();

        return view('hod.view_leave.approved_leave', [
            'leaves' => $leaves,
            'employees' => $employees,
        ]);
    }

    public function view_rejected_leave(){

        $departments = Auth::User()->department;

        $employees = User::where('department', $departments)->get();

        $employeeIds = $employees->pluck('id');
        $leaves = Tblleave::whereIn('emp_id', $employeeIds)
            -> where('hod_remark', 2 )
            ->get();

        return view('hod.view_leave.rejected_leave', [
            'leaves' => $leaves,
            'employees' => $employees,
        ]);
    }

    public function hod_view_leave_detail($id){

        $leaves = Tblleave::where('id', $id)->get();

        $leave = Tblleave::findOrFail($id);
        $emp_id = $leave->emp_id;
        $employees = User::where('id', $emp_id)->get();

        return view('hod.leave_detail',[
            'leaves' => $leaves,
            'employees' => $employees,
            'id' =>  $id,
        ]);

    }

    public function hod_approval(Request $request, $id){

        $leave = Tblleave::findOrFail($id);

        $leave->hod_remark = (int)$request->input('hod_remark');
        $leave->hod_date = Carbon::now()->toDateString();

        $leave->save();

        return redirect()->route('hod_view_all_leave') ->
        with([
            'success' , 'Change Status Approval successfully!']);

    }

    public function leave_history(){

        $emp_id = Auth::user()->id;
        $leaves = Tblleave::where('emp_id',$emp_id)->get();

        return view('hod.leave_history.leave_history', [
            'leaves' => $leaves,
        ]);
    }



}
