<x-app-layout>

    @foreach($leaves as $leave)
        @foreach ($employees as $employee)
            <form>
                {{--    header--}}
                <div class="py-12">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 -mt-5 ">
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="px-6 pt-3 text-xl leading-tight font-semibold">
                                {{ __("Leave Details") }}
                            </div>
                            <div class="px-9 pt-3 pb-3 text-l leading-tight ">
                                <a href="/home">
                                    Home
                                </a>
                                >
                                <a href="/staff/leave/history">
                                    Leave History
                                </a>
                                > Leave Detail

                            </div>
                        </div>
                    </div>
                </div>


                {{--    Leave detail --}}
                <div class="container apply-form pt-2 sm:px-18 lg:px-28 -mt-6" >
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card contact-support">
                                <div class="card-body -mt-8 -mx-5">
                                    <div class="text-blue-800 pb-6 text-2xl leading-tight font-bold  ">
                                        {{ __("Leave Detail") }}
                                    </div>
                                    <form action="">
                                        <div class="row form-wrap">
                                            <div class="form-group required col-md-4 my-2 ">
                                                <label class="control-label mb-2 font-semibold ">Full Name</label>
                                                <label class="form-control border-black bg-gray-200" >
                                                    {{$employee->last_name}} {{$employee->first_name}}
                                                </label>
                                            </div>

                                            <div class="form-group required col-md-4 my-2 ">
                                                <label class="control-label mb-2 font-semibold ">Staff Position</label>
                                                <label class="form-control border-black bg-gray-200" >
                                                    {{ $employee->position_staff  }}
                                                </label>
                                            </div>

                                            <div class="form-group required col-md-4 my-2 ">
                                                <label class="control-label mb-2 font-semibold ">Staff ID</label>
                                                <label class="form-control border-black bg-gray-200" >
                                                    {{ $employee->staff_ID }}
                                                </label>
                                            </div>

                                            <div class="form-group required col-md-4 my-2 ">
                                                <label class="control-label mb-2 font-semibold ">Phone Number</label>
                                                <label class="form-control border-black bg-gray-200" >
                                                    {{ $employee->phone_num }}

                                                </label>
                                            </div>

                                            <div class="form-group required col-md-4 my-2 ">
                                                <label class="control-label mb-2 font-semibold ">Leave Type</label>
                                                <label class="form-control border-black bg-gray-200" >
                                                    {{ $leave->leave_type }}
                                                </label>
                                            </div>

                                            <div class="form-group required col-md-4 my-2 ">
                                                <label class="control-label mb-2 font-semibold">Role</label>
                                                <label class="form-control border-black bg-gray-200" >
                                                    {{ $employee->role }}

                                                </label>
                                            </div>

                                            <div class="form-group required col-md-4 my-2 ">
                                                <label class="control-label mb-2 font-semibold">Applied Date</label>
                                                <label class="form-control border-black bg-gray-200" >
                                                    {{ $leave->created_at }}

                                                </label>
                                            </div>

                                            <div class="form-group required col-md-4 my-2 ">
                                                <label class="control-label mb-2 font-semibold">Requested Number of Days</label>
                                                <label class="form-control border-black bg-gray-200" >
                                                    {{ $leave->request_days }}

                                                </label>
                                            </div>

                                            <div class="form-group required col-md-4 my-2 ">
                                                <label class="control-label mb-2 font-semibold">Number Days still outstanding</label>
                                                <label class="form-control border-black bg-gray-200" >
                                                    {{ $employee->av_leave }}

                                                </label>
                                            </div>


                                            <div class="form-group required col-md-6 my-2 ">
                                                <label class="control-label mb-2 font-semibold">Leave Period</label>
                                                <label class="form-control border-black bg-gray-200" >
                                                    <label class="font-semibold">From </label>
                                                    {{ $leave->from_date }}
                                                    <label class="font-semibold">To</label>
                                                    {{$leave->to_date}}
                                                </label>
                                            </div>


                                            <div class="form-group required col-md-6 my-2 ">
                                                <label class="control-label mb-2 font-semibold">Email</label>
                                                <label class="form-control border-black bg-gray-200" >
                                                    {{ $employee->email }}

                                                </label>
                                            </div>

                                            <div class="form-group required  my-2 ">
                                                <label class="control-label mb-2 font-semibold">Description</label>
                                                <label class="form-control border-black bg-gray-200" >
                                                    {{ $leave->work_covered }}

                                                </label>
                                            </div>

                                            <div class="form-group required col-md-6 my-2 ">
                                                <label class="control-label mb-2 font-semibold">HOD's Approval</label>
                                                <label class="form-control border-black bg-gray-200" >
                                                    @if($leave->hod_remark == 0)
                                                        Pending
                                                    @elseif($leave->hod_remark == 1)
                                                        Approved
                                                    @elseif($leave->hod_remark == 2)
                                                        Rejected
                                                    @endif
                                                </label>
                                            </div>

                                            <div class="form-group required col-md-6 my-2 ">
                                                <label class="control-label mb-2 font-bold text-red-700">Admin's Approval</label>
                                                <label class="form-control border-black bg-gray-200" >
                                                    @if($leave->admin_remark == 0)
                                                        Pending
                                                    @elseif($leave->admin_remark == 1)
                                                        Approved
                                                    @elseif($leave->admin_remark == 2)
                                                        Rejected
                                                    @endif
                                                </label>
                                            </div>

                                            <div class="form-group required col-md-6 my-2 ">
                                                <label class="control-label mb-2 font-semibold">Date for HOD's Approval</label>
                                                <label class="form-control border-black bg-gray-200" >
                                                    @if($leave->hod_date == 0 )
                                                        N/A
                                                    @else
                                                        {{ $leave->hod_date}}
                                                    @endif
                                                </label>
                                            </div>

                                            <div class="form-group required col-md-6 my-2 ">
                                                <label class="control-label mb-2 font-semibold">Date for Admin's Approval</label>
                                                <label class="form-control border-black bg-gray-200" >
                                                    @if($leave->admin_date == 0 )
                                                        N/A
                                                    @else
                                                        {{ $leave->admin_date}}
                                                    @endif
                                                </label>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        @endforeach
    @endforeach
</x-app-layout>

