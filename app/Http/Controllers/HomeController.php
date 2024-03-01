<?php

namespace App\Http\Controllers;

use App\Models\Tblleave;
use Illuminate\Http\Request;
use App\Models\User;
use illuminate\support\facades\auth;

class HomeController extends Controller
{
    public function index(){

        if(Auth::id()){

            $role=Auth()->user()->role;

//  ********************************Staffff************************************************************************************************************

            if($role=='staff'){
//                dashboard
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

                return view('staff.staffhome', [
                    'leaves' => $leaves,
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

                return view('admin.adminhome');
            }

//  ********************************Hoddddddd************************************************************************************************************

            else if($role=='hod'){

                return view('hod.hodhome');
            }
        }
    }


}
