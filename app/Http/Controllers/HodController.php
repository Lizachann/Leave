<?php

namespace App\Http\Controllers;

use App\Models\Tblleave;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class HodController extends MailController
{

    public function applyLeave(){
        $leaves = Tblleave::where('emp_id', Auth::user()->id)->get();
        return view('hod.applyleave', ['
        leaves' => $leaves

        ]);
    }

    public function store_applyLeave(Request $request)
    {
        try {
        // Validate the request data
        $validatedData = $request->validate([
            'leave_type' => ['required', 'string', 'max:255'],
            'request_days' => ['required', 'string', 'max:255'],
            'from_date' => ['required', 'string', 'max:255'],
            'to_date' => ['required', 'string', 'max:255'],
            'work_covered' => ['required', 'string', 'max:255'],
        ]);
            // Create a new leave object with validated data
            $leave = new Tblleave($validatedData);

            // Set additional fields
            $leave->leaveDays_left = Auth::user()->av_leave;
            $leave->emp_id = Auth::user()->id;
            $leave->hod_remark = '1';
            $leave->hod_date = Carbon::now()->toDateString();

            // Save the leave object
            $leave->save();


// Message Body
            $this -> mail (Auth::user()->email, 'Apply Leave',
                Auth::user()->first_name . " " . Auth::user()->last_name . ", has applied for " . $leave->leave_type . " for " . $leave->request_days . " days \n" .
                "From:     " . $leave->from_date . "\n" .
                "To:       " . $leave->to_date . "\n" .
                "Description: " . $leave->work_covered
            );

            // Redirect with success message
            return redirect()->route('hod_view_leave_detail', ['id' => $leave->id])->with('success', 'Apply Leave successfully!');

        }
        catch (ValidationException|\Exception $e) {
            // Redirect back with error message
            return redirect()->back()->with('error', 'Failed to apply leave data!');
        }
    }


    public function staff_leave_dashboard(){

        $departments = Auth::User()->department;
        $employees = User::where('department', $departments)
            ->where('role', 'staff')
            ->get();
        $employeeIds = $employees->pluck('id');
        $leaves = Tblleave::whereIn('emp_id', $employeeIds)->get();
        $pendingLeaves = Tblleave::whereIn('emp_id',$employeeIds)
            -> where('hod_remark',0)
            ->get();
        $approvedLeaves = Tblleave::whereIn('emp_id',$employeeIds)
            -> where('hod_remark',1)
            ->get();
        $rejectedLeaves = Tblleave::whereIn('emp_id',$employeeIds)
            -> where('hod_remark',2)
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

    public function view_all_leave(){

        $departments = Auth::User()->department;

        $employees = User::where('department', $departments)
            ->where('role', 'staff')
            ->get();

        $employeeIds = $employees->pluck('id');
        $leaves = Tblleave::whereIn('emp_id', $employeeIds)->get();

        $counts = $this->staff_leave_dashboard();
        $leaveCount = $counts['leaveCount'];
        $countPending = $counts['countPending'];
        $countApproved = $counts['countApproved'];
        $countRejected = $counts['countRejected'];
        $page = 0;

        return view('hod.view_staff_leave.view_leave', [
            'leaves' => $leaves,
            'employees' => $employees,
            'leaveCount'=> $leaveCount,
            'countPending'=>$countPending,
            'countApproved'=>$countApproved,
            'countRejected'=>$countRejected,
            'page' => $page,
        ]);
    }

    public function view_pending_leave(){

        $departments = Auth::User()->department;

        $employees = User::where('department', $departments)
            ->where('role', 'staff')
            ->get();
        $employeeIds = $employees->pluck('id');
        $leaves = Tblleave::whereIn('emp_id', $employeeIds)
            -> where('hod_remark', 0 )
            ->get();

        $counts = $this->staff_leave_dashboard();
        $leaveCount = $counts['leaveCount'];
        $countPending = $counts['countPending'];
        $countApproved = $counts['countApproved'];
        $countRejected = $counts['countRejected'];
        $page = 1;

        return view('hod.view_staff_leave.view_leave', [
            'leaves' => $leaves,
            'employees' => $employees,
            'leaveCount'=> $leaveCount,
            'countPending'=>$countPending,
            'countApproved'=>$countApproved,
            'countRejected'=>$countRejected,
            'page' => $page,
        ]);
    }

    public function view_approved_leave(){

        $departments = Auth::User()->department;

        $employees = User::where('department', $departments)
            ->where('role', 'staff')
            ->get();
        $employeeIds = $employees->pluck('id');
        $leaves = Tblleave::whereIn('emp_id', $employeeIds)
            -> where('hod_remark', 1 )
            ->get();

        $counts = $this->staff_leave_dashboard();
        $leaveCount = $counts['leaveCount'];
        $countPending = $counts['countPending'];
        $countApproved = $counts['countApproved'];
        $countRejected = $counts['countRejected'];
        $page = 2;

        return view('hod.view_staff_leave.view_leave', [
            'leaves' => $leaves,
            'employees' => $employees,
            'leaveCount'=> $leaveCount,
            'countPending'=>$countPending,
            'countApproved'=>$countApproved,
            'countRejected'=>$countRejected,
            'page' => $page,
        ]);
    }

    public function view_rejected_leave(){

        $departments = Auth::User()->department;
        $employees = User::where('department', $departments)
            ->where('role', 'staff')
            ->get();
        $employeeIds = $employees->pluck('id');
        $leaves = Tblleave::whereIn('emp_id', $employeeIds)
            -> where('hod_remark', 2 )
            ->get();

        $counts = $this->staff_leave_dashboard();
        $leaveCount = $counts['leaveCount'];
        $countPending = $counts['countPending'];
        $countApproved = $counts['countApproved'];
        $countRejected = $counts['countRejected'];
        $page = 3;

        return view('hod.view_staff_leave.view_leave', [
            'leaves' => $leaves,
            'employees' => $employees,
            'leaveCount'=> $leaveCount,
            'countPending'=>$countPending,
            'countApproved'=>$countApproved,
            'countRejected'=>$countRejected,
            'page' => $page,
        ]);
    }

    public function annual_leave(){

        $departments = Auth::User()->department;

        $employees = User::where('department', $departments)
            ->where('role', 'staff')
            ->get();

        $employeeIds = $employees->pluck('id');
        $leaves = Tblleave::whereIn('emp_id', $employeeIds)
            ->where('leave_type','Annual Leave')
            ->get();

        $counts = $this->staff_leave_dashboard();
        $leaveCount = $counts['leaveCount'];
        $countPending = $counts['countPending'];
        $countApproved = $counts['countApproved'];
        $countRejected = $counts['countRejected'];
        $page = 4;

        return view('hod.view_staff_leave.view_leave', [
            'leaves' => $leaves,
            'employees' => $employees,
            'leaveCount'=> $leaveCount,
            'countPending'=>$countPending,
            'countApproved'=>$countApproved,
            'countRejected'=>$countRejected,
            'page' => $page,
        ]);
    }

    public function medical_leave(){

        $departments = Auth::User()->department;

        $employees = User::where('department', $departments)
            ->where('role', 'staff')
            ->get();

        $employeeIds = $employees->pluck('id');
        $leaves = Tblleave::whereIn('emp_id', $employeeIds)
            ->where('leave_type','Medical Leave')
            ->get();

        $counts = $this->staff_leave_dashboard();
        $leaveCount = $counts['leaveCount'];
        $countPending = $counts['countPending'];
        $countApproved = $counts['countApproved'];
        $countRejected = $counts['countRejected'];
        $page = 5;

        return view('hod.view_staff_leave.view_leave', [
            'leaves' => $leaves,
            'employees' => $employees,
            'leaveCount'=> $leaveCount,
            'countPending'=>$countPending,
            'countApproved'=>$countApproved,
            'countRejected'=>$countRejected,
            'page' => $page,
        ]);
    }

    public function compensatory_leave(){

        $departments = Auth::User()->department;

        $employees = User::where('department', $departments)
            ->where('role', 'staff')
            ->get();

        $employeeIds = $employees->pluck('id');
        $leaves = Tblleave::whereIn('emp_id', $employeeIds)
            ->where('leave_type','Compensatory Leave')
            ->get();

        $counts = $this->staff_leave_dashboard();
        $leaveCount = $counts['leaveCount'];
        $countPending = $counts['countPending'];
        $countApproved = $counts['countApproved'];
        $countRejected = $counts['countRejected'];
        $page = 6;

        return view('hod.view_staff_leave.view_leave', [
            'leaves' => $leaves,
            'employees' => $employees,
            'leaveCount'=> $leaveCount,
            'countPending'=>$countPending,
            'countApproved'=>$countApproved,
            'countRejected'=>$countRejected,
            'page' => $page,
        ]);
    }

    public function maternity_leave(){

        $departments = Auth::User()->department;

        $employees = User::where('department', $departments)
            ->where('role', 'staff')
            ->get();

        $employeeIds = $employees->pluck('id');
        $leaves = Tblleave::whereIn('emp_id', $employeeIds)
            ->where('leave_type','Maternity Leave')
            ->get();

        $counts = $this->staff_leave_dashboard();
        $leaveCount = $counts['leaveCount'];
        $countPending = $counts['countPending'];
        $countApproved = $counts['countApproved'];
        $countRejected = $counts['countRejected'];
        $page = 7;

        return view('hod.view_staff_leave.view_leave', [
            'leaves' => $leaves,
            'employees' => $employees,
            'leaveCount'=> $leaveCount,
            'countPending'=>$countPending,
            'countApproved'=>$countApproved,
            'countRejected'=>$countRejected,
            'page' => $page,
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
        try {

            $leave = Tblleave::findOrFail($id);
            $emp_id = $leave->emp_id;
            $employee = User::findOrFail($emp_id);
            $email = $employee->email;
            $subject = '';
            $body = '';
            $remark = (int)$request->input('hod_remark') ;
            if($remark == 1 ){
                $body='Your Leave Application has been Approved by '.Auth::user()->first_name.' '.Auth::user()->last_name;
                $subject='TAFTAC Leave Application APPROVED';
            }else if($remark == 2 ){
                $body='Your Leave Application has been Rejected by '.Auth::user()->first_name.' '.Auth::user()->last_name;
                $subject='TAFTAC Leave Application REJECTED';
            }

           if($this->mail($email, $subject, $body)){
               Tblleave::where('id', $id)->update([
                   'hod_remark' => $remark,
                   'hod_date' => Carbon::now()->toDateString()
               ]);
           }

            // Set the success session variable
            return redirect()->back()->with('success', 'Change Status Approval successfully!');
        }
        catch (ValidationException|\Exception $e) {
            // Redirect back with error message
            return redirect()->back()->with('error', 'Failed to Change Status Approval!');
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
        return view('hod.leave_history.leave_history_dashboard', [
            'leaveCount'=> $leaveCount,
            'countPending'=>$countPending,
            'countApproved'=>$countApproved,
            'countRejected'=>$countRejected
        ]) ;
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

        return view('hod.leave_history.leave_history', [
            'leaves' => $leaves,
            'leaveCount'=> $leaveCount,
            'countPending'=>$countPending,
            'countApproved'=>$countApproved,
            'countRejected'=>$countRejected,
            'page' => $page,
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

        return view('hod.leave_history.leave_history', [
            'leaves' => $leaves,
            'leaveCount'=> $leaveCount,
            'countPending'=>$countPending,
            'countApproved'=>$countApproved,
            'countRejected'=>$countRejected,
            'page' => $page,
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

        return view('hod.leave_history.leave_history', [
            'leaves' => $leaves,
            'leaveCount'=> $leaveCount,
            'countPending'=>$countPending,
            'countApproved'=>$countApproved,
            'countRejected'=>$countRejected,
            'page' => $page,
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

        return view('hod.leave_history.leave_history', [
            'leaves' => $leaves,
            'leaveCount'=> $leaveCount,
            'countPending'=>$countPending,
            'countApproved'=>$countApproved,
            'countRejected'=>$countRejected,
            'page' => $page,
        ]);
    }


    public function history_annual_leave(){

        $leaves = Tblleave::where('emp_id',Auth::user()->id)
            -> where('leave_type','Annual Leave')
            ->get();

        $counts = $this->leave_history_dashboard();
        $leaveCount = $counts['leaveCount'];
        $countPending = $counts['countPending'];
        $countApproved = $counts['countApproved'];
        $countRejected = $counts['countRejected'];
        $page = 4;

        return view('hod.leave_history.leave_history', [
            'leaves' => $leaves,
            'leaveCount'=> $leaveCount,
            'countPending'=>$countPending,
            'countApproved'=>$countApproved,
            'countRejected'=>$countRejected,
            'page' => $page,
        ]);
    }


    public function history_medical_leave(){

        $leaves = Tblleave::where('emp_id',Auth::user()->id)
            ->where('leave_type','Medical Leave')
            ->get();

        $counts = $this->leave_history_dashboard();
        $leaveCount = $counts['leaveCount'];
        $countPending = $counts['countPending'];
        $countApproved = $counts['countApproved'];
        $countRejected = $counts['countRejected'];
        $page = 5;

        return view('hod.leave_history.leave_history', [
            'leaves' => $leaves,
            'leaveCount'=> $leaveCount,
            'countPending'=>$countPending,
            'countApproved'=>$countApproved,
            'countRejected'=>$countRejected,
            'page' => $page,
        ]);
    }
    public function history_compensatory_leave(){

        $leaves = Tblleave::where('emp_id', Auth::user()->id)
            ->where('leave_type','Compensatory Leave')
            ->get();

        $counts = $this->leave_history_dashboard();
        $leaveCount = $counts['leaveCount'];
        $countPending = $counts['countPending'];
        $countApproved = $counts['countApproved'];
        $countRejected = $counts['countRejected'];
        $page = 6;

        return view('hod.leave_history.leave_history', [
            'leaves' => $leaves,
            'leaveCount'=> $leaveCount,
            'countPending'=>$countPending,
            'countApproved'=>$countApproved,
            'countRejected'=>$countRejected,
            'page' => $page,
        ]);
    }
    public function history_maternity_leave(){

        $leaves = Tblleave::where('emp_id', Auth::user()->id)
            ->where('leave_type','Maternity Leave')
            ->get();

        $counts = $this->leave_history_dashboard();
        $leaveCount = $counts['leaveCount'];
        $countPending = $counts['countPending'];
        $countApproved = $counts['countApproved'];
        $countRejected = $counts['countRejected'];
        $page = 7;

        return view('hod.leave_history.leave_history', [
            'leaves' => $leaves,
            'leaveCount'=> $leaveCount,
            'countPending'=>$countPending,
            'countApproved'=>$countApproved,
            'countRejected'=>$countRejected,
            'page' => $page,
        ]);
    }



    public function view_staff(){

        $departments = Auth::User()->department;

        $employees = User::where('department', $departments)
            ->where('role', 'staff')
            ->get();

        $allEmployee = User::all()->count();
        $female = User::where('gender','Female')->count();
        $headDp = User::where('role','hod')->count();
        $ownDp = $employees->count();




        return view('hod.manage_staff.view_staff',[
            'employees' => $employees,
            'allEmployee'=>$allEmployee,
            'female'=>$female,
            'headDp'=>$headDp,
            'ownDp'=>$ownDp
        ]);
    }

    public function staff_detail( $id){

            $employees = User::where('id', $id)->get();

            return view('hod.manage_staff.staff_info_detail', [
                'employees' => $employees,
                'id' => $id,
            ]);

    }

    public function edit_staff_detail(Request $request, $id){
        try {
            User::where('id', $id)->update([
                'first_name' => $request->input('first_name'),
                'last_name' => $request->input('last_name'),
                'phone_num' => $request->input('phone_num'),
                'position_staff' => $request->input('position_staff'),
                'gender' => $request->input('gender'),
                'dob' => $request->input('dob'),
                'address' => $request->input('address')
            ]);


            return redirect()->back()->with('success', 'Edit Staff Information successfully!');
        } catch (ValidationException|\Exception $e) {
            // Redirect back with error message
            return redirect()->back()->with('error', 'Failed to Change Staff Information!');
        }
    }

    public function update(Request $request, $id): RedirectResponse
    {

        try {
            // Validate the request
            $validated = $request->validateWithBag('updatePassword', [
                'password' => 'required|string|min:4',
            ]);

            // Find the user whose password needs to be updated
            $user = User::findOrFail($id);

            // Update the user's password
            $user->update([
                'password' => Hash::make($validated['password']),
            ]);


            return redirect()->back()->with('successPw', 'Successfully Update Staff Password!');
        }
        catch (ValidationException|\Exception $e) {
            // Handle validation errors
            return redirect()->back()->with('errorPw', 'Failed to Update Staff Password!');
        }
    }



}
