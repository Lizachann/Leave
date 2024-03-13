<x-app-layout>

    @foreach($leaves as $leave)
    @foreach ($employees as $employee)
        <form method="POST" action="{{ route('admin_approval', ['id' => $leave->id]) }}">
        @csrf
        @method('POST')

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
                        <a href="/admin/all/leave">
                            All Leave
                        </a>
                        > Leave Detail

                    </div>
                </div>
            </div>
        </div>


        {{--    applyleave--}}
        <div class="container apply-form pt-2 sm:px-18 lg:px-28 -mt-8 " >
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
                                        <label class="form-control border-black bg-gray-200 h-10" >
                                            {{$employee->last_name}} {{$employee->first_name}}
                                        </label>
                                    </div>

                                    <div class="form-group required col-md-4 my-2 ">
                                        <label class="control-label mb-2 font-semibold ">Staff Position</label>
                                        <label class="form-control border-black bg-gray-200 h-10" >
                                            {{ $employee->position_staff  }}
                                        </label>
                                    </div>

                                    <div class="form-group required col-md-4 my-2 ">
                                        <label class="control-label mb-2 font-semibold ">Staff ID</label>
                                        <label class="form-control border-black bg-gray-200 h-10" >
                                            {{ $employee->staff_ID }}
                                        </label>
                                    </div>

                                    <div class="form-group required col-md-4 my-2 ">
                                        <label class="control-label mb-2 font-semibold ">Phone Number</label>
                                        <label class="form-control border-black bg-gray-200 h-10" >
                                            {{ $employee->phone_num }}

                                        </label>
                                    </div>

                                    <div class="form-group required col-md-4 my-2 ">
                                        <label class="control-label mb-2 font-semibold ">Leave Type</label>
                                        <label class="form-control border-black bg-gray-200 h-10" >
                                            {{ $leave->leave_type }}
                                        </label>
                                    </div>

                                    <div class="form-group required col-md-4 my-2 ">
                                        <label class="control-label mb-2 font-semibold">Role</label>
                                        <label class="form-control border-black bg-gray-200 h-10" >
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
                                        <label class="form-control border-black bg-gray-200 h-10" >
                                            {{ $leave->request_days }}

                                        </label>
                                    </div>

                                    <div class="form-group required col-md-4 my-2 ">
                                        <label class="control-label mb-2 font-semibold">Number Days still outstanding</label>
                                        <label class="form-control border-black bg-gray-200 h-10" >
                                            {{ $employee->av_leave }}

                                        </label>
                                    </div>


                                    <div class="form-group required col-md-6 my-2 ">
                                        <label class="control-label mb-2 font-semibold">Leave Period</label>
                                        <label class="form-control border-black bg-gray-200 h-10" >
                                            <label class="font-semibold">From </label>
                                            {{ $leave->from_date }}
                                            <label class="font-semibold">To</label>
                                            {{$leave->to_date}}
                                        </label>
                                    </div>


                                    <div class="form-group required col-md-6 my-2 ">
                                        <label class="control-label mb-2 font-semibold">Email</label>
                                        <label class="form-control border-black bg-gray-200 h-10" >
                                            {{ $employee->email }}

                                        </label>
                                    </div>

                                    <div class="form-group required  my-2 ">
                                        <label class="control-label mb-2 font-semibold">Description</label>
                                        <label class="form-control border-black bg-gray-200 h-10" >
                                            {{ $leave->work_covered }}

                                        </label>
                                    </div>

                                    <div class="form-group required col-md-6 my-2 ">
                                        <label class="control-label mb-2 font-semibold">HOD's Approval</label>
                                        <label class="form-control border-black bg-gray-200 h-10" >
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
                                        <select id="admin_remark" name="admin_remark" class="rounded-lg focus:ring-blue-500
                                        focus:border-blue-500 block w-full p-2.5 border border-black" required >
                                            <option value="">
                                                @if($leave->admin_remark == 0)
                                                    Change from Pending to
                                                @elseif($leave->admin_remark == 1)
                                                    Change from Approved to
                                                @elseif($leave->admin_remark == 2)
                                                    Change from Rejected to
                                                @endif </option>
{{--                                            <option value="0">Pending</option>--}}
                                            <option value="1">Approved</option>
                                            <option value="2">Rejected</option>
                                        </select>
                                    </div>

                                    <div class="form-group required col-md-6 my-2 ">
                                        <label class="control-label mb-2 font-semibold">Date for HOD's Approval</label>
                                        <label class="form-control border-black bg-gray-200 h-10" >
                                            @if($leave->hod_date == 0 )
                                                N/A
                                            @else
                                                {{ $leave->hod_date}}
                                            @endif
                                        </label>
                                    </div>

                                    <div class="form-group required col-md-6 my-2 ">
                                        <label class="control-label mb-2 font-semibold">Date for Admin's Approval</label>
                                        <label class="form-control border-black bg-gray-200 h-10" >
                                            @if($leave->admin_date == 0 )
                                                N/A
                                            @else
                                                {{ $leave->admin_date}}
                                            @endif
                                        </label>
                                    </div>
                                    <div class="flex mt-8 justify-between items-center x">
                                       <button type="submit" class="btn text-md text-white hover:bg-blue-950 bg-blue-800 px-10 py-2 ">Changed Statues</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            @if (session('success'))
                <script>
                    alert("{{ session('success') }}");
                </script>
            @endif
    </form>
        @endforeach
    @endforeach

</x-app-layout>

