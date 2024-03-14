<?php

namespace App\Http\Controllers;

use App\Models\Tblleave;
use Illuminate\Http\Request;
use App\Models\User;
use illuminate\support\facades\auth;

class HomeController extends Controller
{
    public function index(){



//                my hod
        $hods = User::where('role', 'hod')
            ->where('department' , Auth::user()->department)
            ->get();

//                same department staff
        $same_departments = User::where('role', 'staff')
            -> where('department' , Auth::user()->department)
            -> get();

//                all staff
        $staffs = User::all();
        $allEmployee = User::all()->count();
        $allLeave = Tblleave::all()->count();
        $female = User::where('gender', 'Female')->count();
        $allHods = User::where('role', 'hod')->get();


        if(Auth::id()){

            $role=Auth()->user()->role;

//  ********************************Staffff************************************************************************************************************

            if($role=='staff'){
//                dashboard
                $emp_id = Auth::user()->id;

//                $leaves = Tblleave::where('emp_id',$emp_id)->get();

                $count = (new StaffController)->leave_history_dashboard();
                $leaveCount = $count['leaveCount'];
                $countPending = $count['countPending'];
                $countApproved = $count['countApproved'];
                $countRejected = $count['countRejected'];

                return view('staff.homepage.staffhome', [
//                    'leaves' => $leaves,
                    'leaveCount'=> $leaveCount,
                    'countPending'=>$countPending,
                    'countApproved'=>$countApproved,
                    'countRejected'=>$countRejected,
                    'hods' => $hods ,
                    'same_departments' => $same_departments,
                    'staffs' => $staffs,


                ]);
            }

//  ********************************Adminnn************************************************************************************************************


            else if($role=='admin'){


                $adminCount = User::where('department','Admin')
                                    ->whereIn('role',['staff','hod'])
                                    ->count();
                $labourCount = User::where('department','Labour')
                    ->whereIn('role',['staff','hod'])
                    ->count();
                $itCount = User::where('department','IT')
                    ->whereIn('role',['staff','hod'])
                    ->count();
                $prCount = User::where('department','PR')
                    ->whereIn('role',['staff','hod'])
                    ->count();
                $financeCount = User::where('department','Finance')
                    ->whereIn('role',['staff','hod'])
                    ->count();
                $membershipCount = User::where('department','Membership')
                    ->whereIn('role',['staff','hod'])
                    ->count();

                $count = (new AdminController())->staff_leave_dashboard();
                $leaveCount = $count['leaveCount'];
                $countPending = $count['countPending'];
                $countApproved = $count['countApproved'];
                $countRejected = $count['countRejected'];

                $hodCount = User::where('role', 'hod')->count();
                $allStaff = User::where('role', 'staff')->count();


                return view('admin.homepage.adminhome',[
                    'allEmployee' => $allEmployee,
                    'allLeave' => $allLeave,
                    'hodCount'=>$hodCount,
                    'allStaff'=>$allStaff,
                    'hods' => $allHods ,
                    'same_departments' => $same_departments,
                    'staffs' => $staffs,
                    'admin'=>$adminCount,
                    'labour'=>$labourCount,
                    'it'=>$itCount,
                    'pr'=>$prCount,
                    'finance'=>$financeCount,
                    'membership'=>$membershipCount,
                    'leaveCount'=> $leaveCount,
                    'countPending'=>$countPending,
                    'countApproved'=>$countApproved,
                    'countRejected'=>$countRejected,
                    ]);
            }

//  ********************************Hoddddddd************************************************************************************************************

            else if($role=='hod'){
                $count = (new HodController)->leave_history_dashboard();
                $leaveCount = $count['leaveCount'];
                $countPending = $count['countPending'];
                $countApproved = $count['countApproved'];
                $countRejected = $count['countRejected'];

                $counts = (new HodController)->staff_leave_dashboard();
                $leaveCounts = $counts['leaveCount'];
                $countsPending = $counts['countPending'];
                $countsApproved = $counts['countApproved'];
                $countsRejected = $counts['countRejected'];


                $ownDp = User::where('department',Auth::user()->department)->where('role','staff')->count();



                return view('hod.homepage.hodhome',[
                    'leaveCount'=> $leaveCount,
                    'countPending'=>$countPending,
                    'countApproved'=>$countApproved,
                    'countRejected'=>$countRejected,
                    'leaveCounts'=> $leaveCounts,
                    'countsPending'=>$countsPending,
                    'countsApproved'=>$countsApproved,
                    'countsRejected'=>$countsRejected,
                    'allEmployee' => $allEmployee,
                    'allLeave' => $allLeave,
                    'female'=> $female,
                    'ownDp' => $ownDp,
                    'hods' => $allHods ,
                    'same_departments' => $same_departments,
                    'staffs' => $staffs,
                ]);
            }
        }
    }


}
