<?php

namespace App\Http\Controllers;

use App\Models\Tblleave;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;


class StaffController extends MailController
{
    public function applyLeave(){
        $leaves = Tblleave::where('emp_id', Auth::user()->id)->get();
        return view('staff.applyleave', ['
        leaves' => $leaves

        ]);
    }

    public function store_applyLeave(Request $request)

    {try {
        $validatedData = $request->validate([
            'leave_type' => ['required', 'string', 'max:255'],
            'request_days' => ['required', 'string', 'max:255'],
            'from_date' => ['required', 'string', 'max:255'],
            'to_date' => ['required', 'string', 'max:255'],
            'work_covered' => ['required', 'string', 'max:255'],
        ]);

            // Save leave data to the database
            $leave = new Tblleave($validatedData);
            $leave->leaveDays_left = Auth::user()->av_leave;
            $leave->emp_id = Auth::user()->id;
            $leave->save();
//
            $hods = User::where('department', Auth::user()->department)
                ->where('role', 'hod')
                ->get();
        foreach ($hods as $hod) {
            $hodemail = $hod->email;
            // Perform any actions with the email address, such as sending an email
        }
            // Send email between staff and admin
          $this->mail(
                Auth::user()->email,
                'Apply Leave',
                Auth::user()->first_name . " " . Auth::user()->last_name . ", has applied for " . $leave->request_days . " days " . $leave->leave_type .
                " From:     " . $leave->from_date . "\n" .
                "To:       " . $leave->to_date . "\n" .
                "Description: " . $leave->work_covered
            );
            // Send email between admin and hod
            $this->mail(
                $hodemail,
                'Apply Leave',
                Auth::user()->first_name . " " . Auth::user()->last_name . ", has applied for " . $leave->request_days . " days " . $leave->leave_type .
                "From:     " . $leave->from_date . "\n" .
                "To:       " . $leave->to_date . "\n" .
                "Description: " . $leave->work_covered
            );

            // If both leave saving and email sending are successful
        return redirect()->route('staff_view_leave_detail', ['id' => $leave->id])->with('success', 'Apply Leave successfully!');

    } catch (ValidationException | \Exception $e) {
            // Redirect back with error message if any error occurs
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
        $page = 0;

        return view('staff.leave_history.leave_history', [
            'leaves' => $leaves,
            'leaveCount'=> $leaveCount,
            'countPending'=>$countPending,
            'countApproved'=>$countApproved,
            'countRejected'=>$countRejected,
            'page' => $page
        ]);
    }

    public function pending_leave_history(){

        $emp_id = Auth::user()->id;
        $leaves = Tblleave::where('emp_id',$emp_id)
            -> where('admin_remark',0)
            ->get();
        $counts = $this->leave_history_dashboard();
        $leaveCount = $counts['leaveCount'];
        $countPending = $counts['countPending'];
        $countApproved = $counts['countApproved'];
        $countRejected = $counts['countRejected'];
        $page = 1;

        return view('staff.leave_history.leave_history', [
            'leaves' => $leaves,
            'leaveCount'=> $leaveCount,
            'countPending'=>$countPending,
            'countApproved'=>$countApproved,
            'countRejected'=>$countRejected,
            'page' => $page
        ]);
    }
    public function approved_leave_history(){

        $emp_id = Auth::user()->id;
        $leaves = Tblleave::where('emp_id',$emp_id)
            -> where('admin_remark',1)
            ->get();
        $counts = $this->leave_history_dashboard();
        $leaveCount = $counts['leaveCount'];
        $countPending = $counts['countPending'];
        $countApproved = $counts['countApproved'];
        $countRejected = $counts['countRejected'];
        $page = 2;

        return view('staff.leave_history.leave_history', [
            'leaves' => $leaves,
            'leaveCount'=> $leaveCount,
            'countPending'=>$countPending,
            'countApproved'=>$countApproved,
            'countRejected'=>$countRejected,
            'page' => $page
        ]);
    }

    public function rejected_leave_history(){

        $emp_id = Auth::user()->id;
        $leaves = Tblleave::where('emp_id',$emp_id)
            -> where('admin_remark',2)
            ->get();
        $counts = $this->leave_history_dashboard();
        $leaveCount = $counts['leaveCount'];
        $countPending = $counts['countPending'];
        $countApproved = $counts['countApproved'];
        $countRejected = $counts['countRejected'];
        $page = 3;

        return view('staff.leave_history.leave_history', [
            'leaves' => $leaves,
            'leaveCount'=> $leaveCount,
            'countPending'=>$countPending,
            'countApproved'=>$countApproved,
            'countRejected'=>$countRejected,
            'page' => $page
        ]);
    }

    public function annual_leave(){

//        $emp_id = Auth::user()->id;
        $leaves = Tblleave::where('emp_id',Auth::user()->id)
            -> where('leave_type','Annual Leave')
            ->get();

        $counts = $this->leave_history_dashboard();
        $leaveCount = $counts['leaveCount'];
        $countPending = $counts['countPending'];
        $countApproved = $counts['countApproved'];
        $countRejected = $counts['countRejected'];
        $page = 4;

        return view('staff.leave_history.leave_history', [
            'leaves' => $leaves,
            'leaveCount'=> $leaveCount,
            'countPending'=>$countPending,
            'countApproved'=>$countApproved,
            'countRejected'=>$countRejected,
            'page' => $page,
        ]);
    }


    public function medical_leave(){

        $leaves = Tblleave::where('emp_id',Auth::user()->id)
            ->where('leave_type','Medical Leave')
            ->get();

        $counts = $this->leave_history_dashboard();
        $leaveCount = $counts['leaveCount'];
        $countPending = $counts['countPending'];
        $countApproved = $counts['countApproved'];
        $countRejected = $counts['countRejected'];
        $page = 5;

        return view('staff.leave_history.leave_history', [
            'leaves' => $leaves,
            'leaveCount'=> $leaveCount,
            'countPending'=>$countPending,
            'countApproved'=>$countApproved,
            'countRejected'=>$countRejected,
            'page' => $page,
        ]);
    }
    public function compensatory_leave(){

        $leaves = Tblleave::where('emp_id', Auth::user()->id)
            ->where('leave_type','Compensatory Leave')
            ->get();

        $counts = $this->leave_history_dashboard();
        $leaveCount = $counts['leaveCount'];
        $countPending = $counts['countPending'];
        $countApproved = $counts['countApproved'];
        $countRejected = $counts['countRejected'];
        $page = 6;

        return view('staff.leave_history.leave_history', [
            'leaves' => $leaves,
            'leaveCount'=> $leaveCount,
            'countPending'=>$countPending,
            'countApproved'=>$countApproved,
            'countRejected'=>$countRejected,
            'page' => $page,
        ]);
    }
    public function maternity_leave(){

        $leaves = Tblleave::where('emp_id', Auth::user()->id)
            ->where('leave_type','Maternity Leave')
            ->get();

        $counts = $this->leave_history_dashboard();
        $leaveCount = $counts['leaveCount'];
        $countPending = $counts['countPending'];
        $countApproved = $counts['countApproved'];
        $countRejected = $counts['countRejected'];
        $page = 7;

        return view('staff.leave_history.leave_history', [
            'leaves' => $leaves,
            'leaveCount'=> $leaveCount,
            'countPending'=>$countPending,
            'countApproved'=>$countApproved,
            'countRejected'=>$countRejected,
            'page' => $page,
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
