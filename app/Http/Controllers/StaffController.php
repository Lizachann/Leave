<?php

namespace App\Http\Controllers;

use App\Models\Tblleave;

use App\Models\User;
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

        $leave->hod_remark = '0';
        $leave->hod_date = '0';
        $leave->admin_remark = '0';
        $leave->admin_date = '0';


        $leave->save();
        return redirect()->route('staff.applyLeave')->with('success', 'Apply Leave Successfully!!');
    }

    public function leave_history_dashboard(){

        $emp_id = Auth::user()->id;
        $leaves = Tblleave::where('emp_id',$emp_id)->get();
        $pendingLeaves = Tblleave::where('emp_id',$emp_id)
            -> where('admin_remark',0)
            ->get();

        $approvedLeaves = Tblleave::where('emp_id',$emp_id)
            -> where('admin_remark',1)
            ->get();
        $rejectedLeaves = Tblleave::where('emp_id',$emp_id)
            -> where('admin_remark',2)
            ->get();

        $leaveCount = $leaves->count();
        $countPending = $pendingLeaves->count();
        $countApproved= $approvedLeaves->count();
        $countRejected= $rejectedLeaves->count();
        return [
            'leaveCount'=> $leaveCount,
            'countPending'=>$countPending,
            'countApproved'=>$countApproved,
            'countRejected'=>$countRejected
            ] ;
    }

    public function leave_history(){

        $emp_id = Auth::user()->id;
        $leaves = Tblleave::where('emp_id',$emp_id)->get();
        $counts = $this->leave_history_dashboard();
        $leaveCount = $counts['leaveCount'];
        $countPending = $counts['countPending'];
        $countApproved = $counts['countApproved'];
        $countRejected = $counts['countRejected'];

        return view('staff.leave_history.leave_history', [
            'leaves' => $leaves,
            'leaveCount'=> $leaveCount,
            'countPending'=>$countPending,
            'countApproved'=>$countApproved,
            'countRejected'=>$countRejected
        ]);
    }

    public function pending_leave_history(){

        $emp_id = Auth::user()->id;
        $pendingLeaves = Tblleave::where('emp_id',$emp_id)
            -> where('admin_remark',0)
            ->get();
        $counts = $this->leave_history_dashboard();
        $leaveCount = $counts['leaveCount'];
        $countPending = $counts['countPending'];
        $countApproved = $counts['countApproved'];
        $countRejected = $counts['countRejected'];

        return view('staff.leave_history.pending_history', [
            'pendingLeaves'=>$pendingLeaves,
            'leaveCount'=> $leaveCount,
            'countPending'=>$countPending,
            'countApproved'=>$countApproved,
            'countRejected'=>$countRejected
        ]);
    }
    public function approved_leave_history(){

        $emp_id = Auth::user()->id;
        $approvedLeaves = Tblleave::where('emp_id',$emp_id)
            -> where('admin_remark',1)
            ->get();
        $counts = $this->leave_history_dashboard();
        $leaveCount = $counts['leaveCount'];
        $countPending = $counts['countPending'];
        $countApproved = $counts['countApproved'];
        $countRejected = $counts['countRejected'];
        return view('staff.leave_history.approved_history', [
            'approvedLeaves'=> $approvedLeaves,
            'leaveCount'=> $leaveCount,
            'countPending'=>$countPending,
            'countApproved'=>$countApproved,
            'countRejected'=>$countRejected
        ]);
    }

    public function rejected_leave_history(){

        $emp_id = Auth::user()->id;
        $rejectedLeaves = Tblleave::where('emp_id',$emp_id)
            -> where('admin_remark',2)
            ->get();
        $counts = $this->leave_history_dashboard();
        $leaveCount = $counts['leaveCount'];
        $countPending = $counts['countPending'];
        $countApproved = $counts['countApproved'];
        $countRejected = $counts['countRejected'];
        return view('staff.leave_history.rejected_history', [
            'rejectedLeaves'=>$rejectedLeaves,
            'leaveCount'=> $leaveCount,
            'countPending'=>$countPending,
            'countApproved'=>$countApproved,
            'countRejected'=>$countRejected
        ]);
    }






    public function view_leave_detail($id){

        $leaves = Tblleave::where('id', $id)->get();

        $leave = Tblleave::findOrFail($id);
        $emp_id = $leave->emp_id;
        $employees = User::where('id', $emp_id)->get();

        return view('staff.leave_detail',[
            'leaves' => $leaves,
            'employees' => $employees,
            'id' =>  $id,

        ]);

    }



}
