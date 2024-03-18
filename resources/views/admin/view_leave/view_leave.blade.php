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
                    <a href="/admin/all/leave">
                        All Leave
                    </a>

                </div>
            </div>
        </div>
    </div>

    {{--    dashboard--}}
    <div class="-mt-14">
        @include('admin.view_leave.view_leave_dashboard')
    </div>

    {{--    leave type--}}

    <div class="row ml-[6%] mb-10">
        <div class="col-lg-3 col-md-6 mb-4 w-fit">
            <a class=" bn border bg-gray-300 px-5 py-2 mr-5  rounded" href="{{route('admin_annual')}}">
                Annual Leave
            </a>
        </div>
        <div class="col-lg-3 col-md-6 mb-4 w-fit">
            <a class=" bn border bg-gray-300 px-5 py-2 mr-5  rounded" href="{{route('admin_medical')}}">
                Medical Leave
            </a>
        </div>
        <div class="col-lg-3 col-md-6 mb-4 w-fit">
            <a class=" bn border bg-gray-300 px-5 py-2 mr-5 rounded" href="{{route('admin_compensatory')}}">
                Compensatory Leave
            </a>
        </div>
        <div class="col-lg-3 col-md-6 w-fit">
            <a class=" bn border bg-gray-300 px-5 py-2  mr-5 rounded" href="{{route('admin_maternity')}}">
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
                @foreach($leaves as $index => $leave)
                    <tr>
                        @foreach ($employees as $employee)
                            @if($leave->emp_id == $employee->id)
                                <td>
                                    <div class="flex items-center">
                                        {{$employee->last_name}} {{$employee->first_name}}
                                        @if($employee->role === 'hod')
                                            <h1 class="bg-blue-100 w-fit h-fit py-0.5 px-1 text-blue-800 rounded text-[10px] font-semibold ml-2">
                                                HOD
                                            </h1>
                                    @endif
                                </td>

                            @endif
                        @endforeach
                        <td> {{$leave->leave_type}} </td>
                        <td>{{$leave->created_at}} </td>
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
                                <button class=" bg-green-600 px-2.5 py-1 rounded te" >
                                    <a href="{{ route('admin_view_leave_detail', ['id' => $leave->id]) }}"  >
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen w-5 h-5" viewBox="0 0 16 16">
                                            <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001m-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708z"/>
                                        </svg>
                                    </a>
                                </button>
                                <!-- Use a unique modal ID for each row -->
                                @php $modalId = 'exampleModal_' . $index; @endphp


                                <form action="{{ route('delete_leave',['id' => $leave->id]) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button type="button" class="bg-red-600 ml-5 px-2.5 py-1 rounded te" data-bs-toggle="modal" data-bs-target="#{{ $modalId }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class=" bi bi-trash w-5 h-5 " viewBox="0 0 16 16">
                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                            <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                                        </svg>
                                    </button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="{{ $modalId }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered"> <!-- Changed class to modal-dialog-centered -->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title text-xl font-semibold  pt-10" id="exampleModalLabel"> Are you sure you want to delete this leave?</h5>
                                                    <button type="button" class="-mt-10 hover:bg-gray-300" data-bs-dismiss="modal" aria-label="Close">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle w-5 h-5" viewBox="0 0 16 16">
                                                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                                                            <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708"/>
                                                        </svg>
                                                    </button>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn bg-gray-200 hover:bg-blue-200 bg-blue-600" data-bs-dismiss="modal">No</button>
                                                    <button type="submit" class="btn bg-gray-200 hover:bg-red-200 bg-red-600">Yes</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
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

<script>
    // Check if there is a success message in the session
    @if(session('success'))
    showSuccessAlert('Leave record deleted successfully!');
    @endif
    @if(session('error'))
    showErrorAlert('Failed to delete leave record!');
    @endif
</script>
