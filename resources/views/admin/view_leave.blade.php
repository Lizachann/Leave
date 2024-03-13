
<x-app-layout class="bg-gray-100">

    {{--        header--}}
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg -mt-5">
                <div class="px-6 pt-3 text-xl leading-tight font-semibold">
                    @if($pages == 0)
                        All Leave
                    @elseif($pages == 1)
                        Pending Leave
                    @elseif($pages == 2)
                        Approved Leave
                    @elseif($pages == 3)
                        Rejected Leave
                    @endif
                </div>
                <div class="px-9 pt-3 pb-3 text-l leading-tight ">
                    <a href="/home">
                        Home
                    </a>
                    >
                    <a href="/admin/all/leave">
                        All Leave
                    </a>

                </div>
            </div>
        </div>
    </div>

    {{--    show all leave--}}
    <div class="view_dataTable">
        <div class="container wrapper pt-2 sm:px-18 lg:px-28 apply-form -mt-8 ">

            <table class="table table-bordered table-hover pt-3  ">

                <thead>
                <tr>
                    <th class="col-md-2">Staff Name</th>
                    <th class="col-md-2">Leave Type</th>
                    <th class="col-md-2">Applied Date</th>
                    <th class="col-md-2">HOD Status</th>
                    <th class="col-md-2">Admin Status</th>
                    <th class="col-md-2">Action</th>
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
                        <td>{{$leave->created_at}} </td>
                        <td>
                            @if($leave->hod_remark == 0)
                                Pending
                            @elseif($leave->hod_remark == 1)
                                Approved
                            @elseif($leave->hod_remark == 2)
                                Rejected
                            @endif
                        </td>
                        <td>
                            @if($leave->admin_remark == 0)
                                Pending
                            @elseif($leave->admin_remark == 1)
                                Approved
                            @elseif($leave->admin_remark == 2)
                                Rejected
                            @endif
                        </td>
                        <td class=" justify-center items-center flex">
                            <button class=" bg-green-500 px-3 py-1 rounded" >
                                <a href="{{ route('admin_view_leave_detail', ['id' => $leave->id]) }}"  >
                                    Edit
                                </a>
                            </button>

                            <button class=" bg-red-500 ml-5 px-3 py-1  rounded  " >
                                <a href=""  >
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class=" bi bi-trash w-6 h-6 " viewBox="0 0 16 16">
                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                        <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                                    </svg>
                                </a>
                            </button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <br><br> <br><br>
        </div>
    </div>
</x-app-layout>


