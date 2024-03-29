<?php

namespace App\Http\Controllers;

use App\Models\Tblleave;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;

class AdminController extends MailController
{
    /**
     * Display the registration view.
     */

    //auto generate ID
//    public function addStaff()
//    {
//        $currentID = User::latest()->value('staff_ID');
//        $numericPart = (int)substr($currentID, 1); // Extract numeric part and convert to integer
//        $nextNumericPart = $numericPart + 1; // Increment numeric part by 1
//        $nextID = "G" . str_pad($nextNumericPart, strlen($currentID) - 1, "0", STR_PAD_LEFT);
//
//
//
//        return view('admin.addStaff',[
//            'nextID' => $nextID
//        ]);
//    }

    public function addStaff()
    {
        return view('admin.addStaff');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */

    public function storeAddStaff(Request $request)
    {
        try {
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
                //not auto generate ID
                'staff_ID' =>'required|string|max:255|unique:users',
            ]);

            $validatedData['password'] = Hash::make($validatedData['password']);

            $user = new User($validatedData);
            $user->save();

//            // Send verification email
//            $user->sendEmailVerificationNotification();

            $email = $request->input('email');

            // Message Body
            $this->mail($email, 'Welcome To TAFTAC', 'You have been added to Leave system of TAFTAC');

            return redirect()->route('admin.addStaff')->with('success', 'User created successfully!');
        } catch (ValidationException $e) {
            // Handle validation errors
            return redirect()->back()->with('errorValidation','Something Wrong With Validation!!');
        }
        catch (\Exception $e) {
            // Redirect back with error message for other exceptions
            return redirect()->route('admin.addStaff')->with('error', 'Failed to add staff!');
        }
    }



    public function staff_leave_dashboard(){

        $leaves = Tblleave::all();
        $pendingLeaves = Tblleave::where('admin_remark',0)->get();
        $approvedLeaves = Tblleave::where('admin_remark',1)->get();
        $rejectedLeaves = Tblleave::where('admin_remark',2)->get();

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

        $leaves = Tblleave::all();
        $employees = User::all();

        $counts = $this->staff_leave_dashboard();
        $leaveCount = $counts['leaveCount'];
        $countPending = $counts['countPending'];
        $countApproved = $counts['countApproved'];
        $countRejected = $counts['countRejected'];
        $page = 0;

        return view('admin.view_leave.view_leave', [
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


        $leaves = Tblleave::where('admin_remark', 0 )->get();
        $employees = User::all();

        $counts = $this->staff_leave_dashboard();
        $leaveCount = $counts['leaveCount'];
        $countPending = $counts['countPending'];
        $countApproved = $counts['countApproved'];
        $countRejected = $counts['countRejected'];
        $page = 1;

        return view('admin.view_leave.view_leave', [
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

        $leaves = Tblleave::where('admin_remark', 1)->get();
        $employees = User::all();

        $counts = $this->staff_leave_dashboard();
        $leaveCount = $counts['leaveCount'];
        $countPending = $counts['countPending'];
        $countApproved = $counts['countApproved'];
        $countRejected = $counts['countRejected'];
        $page = 2;

        return view('admin.view_leave.view_leave', [
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

        $leaves = Tblleave::where('admin_remark', 2 )->get();
        $employees = User::all();
        $counts = $this->staff_leave_dashboard();
        $leaveCount = $counts['leaveCount'];
        $countPending = $counts['countPending'];
        $countApproved = $counts['countApproved'];
        $countRejected = $counts['countRejected'];
        $page = 3;

        return view('admin.view_leave.view_leave', [
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

        $leaves = Tblleave::where('leave_type','Annual Leave')->get();
        $employees = User::all();
        $counts = $this->staff_leave_dashboard();
        $leaveCount = $counts['leaveCount'];
        $countPending = $counts['countPending'];
        $countApproved = $counts['countApproved'];
        $countRejected = $counts['countRejected'];
        $page = 4;

        return view('admin.view_leave.view_leave', [
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

        $leaves = Tblleave::where('leave_type','Medical Leave')->get();
        $employees = User::all();
        $counts = $this->staff_leave_dashboard();
        $leaveCount = $counts['leaveCount'];
        $countPending = $counts['countPending'];
        $countApproved = $counts['countApproved'];
        $countRejected = $counts['countRejected'];
        $page = 5;

        return view('admin.view_leave.view_leave', [
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


        $leaves = Tblleave::where('leave_type','Compensatory Leave')->get();
        $employees = User::all();
        $counts = $this->staff_leave_dashboard();
        $leaveCount = $counts['leaveCount'];
        $countPending = $counts['countPending'];
        $countApproved = $counts['countApproved'];
        $countRejected = $counts['countRejected'];
        $page = 6;

        return view('admin.view_leave.view_leave', [
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

        $leaves = Tblleave::where('leave_type','Maternity Leave')->get();
        $employees = User::all();
        $counts = $this->staff_leave_dashboard();
        $leaveCount = $counts['leaveCount'];
        $countPending = $counts['countPending'];
        $countApproved = $counts['countApproved'];
        $countRejected = $counts['countRejected'];
        $page = 7;

        return view('admin.view_leave.view_leave', [
            'leaves' => $leaves,
            'employees' => $employees,
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


        return view('admin.leave_detail',[
            'leaves' => $leaves,
            'employees' => $employees,
            'id' =>  $id,
        ]);


    }

    public function admin_approval(Request $request, $id)
    {
        try{
            $leave = Tblleave::findOrFail($id);

            $allLeaves = Tblleave::all();

            $leave->admin_remark = (int)$request->input('admin_remark');
            $leave->admin_date = Carbon::now()->toDateString();
            $emp_id = $leave->emp_id;

            $employee = User::findOrFail($emp_id);

            if ($leave->admin_remark == 1 && $leave->leave_type === "Annual Leave") {
                $leaveDays_left = $employee->av_leave - $leave->request_days;
                $employee->av_leave = $leaveDays_left;
                foreach ($allLeaves as $allLeave) {
                    $leaveId = $allLeave->emp_id;
                    if ($leaveId == $emp_id) {
                        $allLeave->leaveDays_left = $leaveDays_left;
                    }
                    $allLeave->save();
                }
            } else {
                foreach ($allLeaves as $allLeave) {
                    $leaveId = $allLeave->emp_id;
                    if ($leaveId == $emp_id) {
                        $allLeave->leaveDays_left = $employee->av_leave;
                    }
                    $allLeave->save();
                }
            }

            $employee->save();
            $leave->save();

            $email = $employee->email;
            $subject = '';
            $body = '';
            if($leave->admin_remark == 1 ){
                $body='Your Leave Application has been Approved by Admin';
                $subject='TAFTAC Leave Application APPROVED';
            }else if($leave->admin_remark == 2 ){
                $body='Your Leave Application has been Rejected by Admin';
                $subject='TAFTAC Leave Application REJECTED';
            }

            $this -> mail ($email, $subject,$body);

            return redirect()->back()->with(
                'success', 'Change Status Approval successfully!'
            );
        }
        catch (ValidationException | \Exception $e) {
            // Redirect back with error message
            return redirect()->back()->with('error', 'Failed to Change Status Approval!');
        }
    }

    public function staff_detail( $id){

        $employees = User::where('id', $id)->get();

        return view('admin.manage_staff.staff_info_detail', [
            'employees' => $employees,
            'id' => $id,
        ]);

    }

    public function edit_staff_detail(Request $request, $id){
        try {

            $user = User::findOrFail($id);
            $request->validate([
                'email' => 'required|string|max:255|email|unique:users,email,' . $user->id,
            ]);
            User::where('id', $id)->update([
                'first_name' => $request->input('first_name'),
                'last_name' => $request->input('last_name'),
                'phone_num' => $request->input('phone_num'),
                'email'=> $request->input('email'),
                'department'=> $request->input('department'),
                'position_staff' => $request->input('position_staff'),
                'gender' => $request->input('gender'),
                'dob' => $request->input('dob'),
                'address' => $request->input('address'),
                'av_leave'=> $request->input('av_leave'),
                'role'=> $request->input('role'),
            ]);
            Tblleave::where('emp_id',$id)->update([
                'leaveDays_left' =>  $request->input('av_leave'),
            ]);


            return redirect()->back()->with('success', 'Edit Staff Information successfully!');
        } catch (ValidationException|\Exception $e) {
            // Redirect back with error message
            return redirect()->back()->with('error', 'Failed to Change Staff Information!');
        }
    }


    public function view_staff(){

        $employees = User::whereIn('role',['staff','hod'])->get();

        $allEmployee = User::all()->count();
        $female = User::where('gender','Female')->count();
        $headDp = User::where('role','hod')->count();
        $allStaff = User::where('role', 'staff')->count();
        $page = 0;

        return view('admin.manage_staff.view_staff',[
            'employees' => $employees,
            'allEmployee'=>$allEmployee,
            'female'=>$female,
            'headDp'=>$headDp,
            'allStaff'=>$allStaff,
            'page'=>$page,
        ]);
    }

    public function view_admin(){

        $employees = User::whereIn('role', ['staff', 'hod'])
                        ->where('department', 'Admin')
                        ->get();
        $allEmployee = User::all()->count();
        $female = User::where('gender','Female')->count();
        $headDp = User::where('role','hod')->count();
        $allStaff = User::where('role', 'staff')->count();
        $page = 1;

        return view('admin.manage_staff.view_staff',[
            'employees' => $employees,
            'allEmployee'=>$allEmployee,
            'female'=>$female,
            'headDp'=>$headDp,
            'allStaff'=>$allStaff,
            'page'=>$page,
        ]);
    }

    public function view_labour(){

        $employees = User::whereIn('role', ['staff', 'hod'])
            ->where('department', 'Labour')
            ->get();
        $allEmployee = User::all()->count();
        $female = User::where('gender','Female')->count();
        $headDp = User::where('role','hod')->count();
        $allStaff = User::where('role', 'staff')->count();
        $page = 2;

        return view('admin.manage_staff.view_staff',[
            'employees' => $employees,
            'allEmployee'=>$allEmployee,
            'female'=>$female,
            'headDp'=>$headDp,
            'allStaff'=>$allStaff,
            'page'=>$page,
        ]);
    }
    public function view_pr(){

        $employees = User::whereIn('role', ['staff', 'hod'])
            ->where('department', 'PR')
            ->get();
        $allEmployee = User::all()->count();
        $female = User::where('gender','Female')->count();
        $headDp = User::where('role','hod')->count();
        $allStaff = User::where('role', 'staff')->count();
        $page = 3;

        return view('admin.manage_staff.view_staff',[
            'employees' => $employees,
            'allEmployee'=>$allEmployee,
            'female'=>$female,
            'headDp'=>$headDp,
            'allStaff'=>$allStaff,
            'page'=>$page,
        ]);
    }
    public function view_finance(){

        $employees = User::whereIn('role', ['staff', 'hod'])
            ->where('department', 'Finance')
            ->get();
        $allEmployee = User::all()->count();
        $female = User::where('gender','Female')->count();
        $headDp = User::where('role','hod')->count();
        $allStaff = User::where('role', 'staff')->count();
        $page = 4;

        return view('admin.manage_staff.view_staff',[
            'employees' => $employees,
            'allEmployee'=>$allEmployee,
            'female'=>$female,
            'headDp'=>$headDp,
            'allStaff'=>$allStaff,
            'page'=>$page,
        ]);
    }
    public function view_membership(){

        $employees = User::whereIn('role', ['staff', 'hod'])
            ->where('department', 'Membership')
            ->get();
        $allEmployee = User::all()->count();
        $female = User::where('gender','Female')->count();
        $headDp = User::where('role','hod')->count();
        $allStaff = User::where('role', 'staff')->count();
        $page = 5;

        return view('admin.manage_staff.view_staff',[
            'employees' => $employees,
            'allEmployee'=>$allEmployee,
            'female'=>$female,
            'headDp'=>$headDp,
            'allStaff'=>$allStaff,
            'page'=>$page,
        ]);
    }
    public function view_it(){

        $employees = User::whereIn('role', ['staff', 'hod'])
            ->where('department', 'IT')
            ->get();
        $allEmployee = User::all()->count();
        $female = User::where('gender','Female')->count();
        $headDp = User::where('role','hod')->count();
        $allStaff = User::where('role', 'staff')->count();
        $page = 6;

        return view('admin.manage_staff.view_staff',[
            'employees' => $employees,
            'allEmployee'=>$allEmployee,
            'female'=>$female,
            'headDp'=>$headDp,
            'allStaff'=>$allStaff,
            'page'=>$page,
        ]);
    }
    public function delete_leave($id){
        try {
            // Find the leave record by ID
            $leave = Tblleave::findOrFail($id);
            // Delete the leave record
            $leave->delete();
            // Redirect back with success message
            return redirect()->back()->with('success', 'Leave record deleted successfully!');
        } catch (\Exception $e) {
            // Handle any exceptions (e.g., if leave record not found)
            return redirect()->back()->with('error', 'Failed to delete leave record!');
        }
    }

    public function delete_staff($id){
        try {
            // Find the leave record by ID
            $staff = User::findOrFail($id);
            // Delete the leave record
            $staff->delete();
            // Redirect back with success message
            return redirect()->back()->with('success', 'Staff deleted successfully!');
        } catch (\Exception $e) {
            // Handle any exceptions (e.g., if leave record not found)
            return redirect()->back()->with('error', 'Failed to delete staff!');
        }
    }

    public function update(Request $request, $id): RedirectResponse
    {

        try {
            $validatedData = $request->validate([
                'password' => 'required|string|min:4',
            ]);

            // Find the user whose password needs to be updated
            $user = User::findOrFail($id);
            // Update the user's password

            $user->update([
                'password' => Hash::make($validatedData['password']),
            ]);

            return redirect()->back()->with('successPw', 'Successfully Update Staff Password!');
        }
        catch (ValidationException|\Exception $e) {
            // Handle validation errors
            return redirect()->back()->with('errorPw', 'Failed to Update Staff Password!');
        }
    }


}
