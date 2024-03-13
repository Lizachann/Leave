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
            'to_date' => ['required', 'string', 'max:255'],
            'work_covered' => ['required', 'string', 'max:255'],

        ]);
        try{

        $leave = new Tblleave($validatedData);
        $leave->leaveDays_left = Auth::user()->av_leave;
        $leave->emp_id = Auth::user()->id;

        $leave->save();

        return redirect()->route('staff_view_leave_detail', ['id' => $leave->id])
            ->with('success', 'Apply Leave Successfully!!');

        } catch (\Exception $e) {
    // Redirect back with error message
        return redirect()->back()->with('error', 'Failed to apply leave data!');
        }
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
