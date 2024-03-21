
<x-app-layout class="bg-gray-100">

    {{--        header--}}
    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg -mt-5">
                <div class="px-6 pt-3 text-xl leading-tight font-semibold">
                    @if($page == 0)
                        All Leave
                    @elseif($page == 1)
                        Pending Leave
                    @elseif($page == 2)
                        Approved Leave
                    @elseif($page == 3)
                        Rejected Leave
                    @elseif($page == 4)
                        Annual Leave
                    @elseif($page == 5)
                        Medical Leave
                    @elseif($page == 6)
                        Compensatory Leave
                    @elseif($page == 7)
                        Maternity Leave
                    @endif
                </div>
                <div class="px-9 pt-3 pb-3 text-l leading-tight ">
                    <a href="/home">
                        Home
                    </a>
                    >
                    <a href="/hod/all/leave">
                        All Leave
                    </a>

                </div>
            </div>
        </div>
    </div>

    {{--    dashboard--}}
    <div class="-mt-14">
        @include('hod.view_staff_leave.staff_leave_dashboard')
    </div>

{{--    leave type--}}

    <div class="row ml-[6%] mb-10">
        <div class="col-lg-3 col-md-6 mb-4 w-fit">
            <a class=" bn border bg-gray-300 px-5 py-2 mr-5  rounded" href="{{route('hod_annual')}}">
                Annual Leave
            </a>
        </div>
        <div class="col-lg-3 col-md-6 mb-4 w-fit">
            <a class=" bn border bg-gray-300 px-5 py-2 mr-5  rounded" href="{{route('hod_medical')}}">
                Medical Leave
            </a>
        </div>
        <div class="col-lg-3 col-md-6 mb-4 w-fit">
            <a class=" bn border bg-gray-300 px-5 py-2 mr-5 rounded" href="{{route('hod_compensatory')}}">
                Compensatory Leave
            </a>
        </div>
        <div class="col-lg-3 col-md-6 w-fit">
            <a class=" bn border bg-gray-300 px-5 py-2  mr-5 rounded" href="{{route('hod_maternity')}}">
                Maternity Leave
            </a>
        </div>
    </div>


    {{--    show all leave--}}
    <div class="view_dataTable">
        <div class="container wrapper pt-2 sm:px-10 lg:px-20 apply-form -mt-8 ">
            <table class="table table-bordered table-hover pt-3  ">

                <thead>
                <tr>
                    <th class="col-md-3">Staff Name</th>
                    <th class="col-md-3">Leave Type</th>
                    <th class="col-md-2">Applied Date</th>
                    <th class="col-md-2">HOD Status</th>
                    <th class="col-md-2">Admin Status</th>
                    <th class="col-md-1">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($leaves as $leave)

                    <tr>
                        @foreach ($employees as $employee)
                            @if($leave->emp_id == $employee->id)
                                <td>{{$employee->last_name}} {{$employee->first_name}} </td>
                            @endif
                        @endforeach
                        <td> {{$leave->leave_type}} </td>
                        <td>{{ \Carbon\Carbon::parse($leave->created_at)->format('Y-m-d') }}</td>
                        <td>
                            @if($leave->hod_remark == 0)
                                <h1 class="text-yellow-600 font-semibold">Pending</h1>
                            @elseif($leave->hod_remark == 1)
                                <h1 class="text-green-600 font-semibold">Approved</h1>
                            @elseif($leave->hod_remark == 2)
                                <h1 class="text-red-600 font-semibold">Rejected</h1>
                            @endif
                        </td>
                        <td>
                            @if($leave->admin_remark == 0)
                                <h1 class="text-yellow-600 font-semibold">Pending</h1>
                            @elseif($leave->admin_remark == 1)
                                <h1 class="text-green-600 font-semibold">Approved</h1>
                            @elseif($leave->admin_remark == 2)
                                <h1 class="text-red-600 font-semibold">Rejected</h1>
                            @endif
                        </td>
                        <td >
                            <div class=" justify-center items-center flex">
                                <button class=" px-3 py-1 rounded" >
                                    <a href="{{ route('hod_view_leave_detail', ['id' => $leave->id]) }}"  >
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye w-6 h-6" viewBox="0 0 16 16">
                                            <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z"/>
                                            <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
                                        </svg>
                                    </a>
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>


            <br><br> <br><br>
        </div>
    </div>
</x-app-layout>



