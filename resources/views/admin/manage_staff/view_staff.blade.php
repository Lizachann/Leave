
<x-app-layout class="bg-gray-100">
    {{--        header--}}
    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg -mt-5">
                <div class="px-6 pt-3 text-xl leading-tight font-semibold">
                    @if($page == 0)
                        Manage Staff
                    @elseif($page == 1)
                        Admin Department
                    @elseif($page == 2)
                        Labour Department
                    @elseif($page == 3)
                        Public Relation Department
                    @elseif($page == 4)
                        Finance Department
                    @elseif($page == 5)
                        Membership Department
                    @elseif($page == 6)
                        Information Technologies Department
                    @endif
                </div>
                <div class="px-9 pt-3 pb-3 text-l leading-tight ">
                    <a href="/home">
                        Home
                    </a>
                    >
                    <a href="{{route('admin_view_staff')}}">
                        All Employee
                    </a>

                </div>
            </div>
        </div>
    </div>

    {{--    dashboard--}}
    <div class="-mt-5">
        @include('admin.manage_staff.dashboard')
    </div>

    {{--    leave type--}}

    <div class="flex flex-wrap  ml-[6%] mb-10">
        <div class="col-lg-2 col-md-6 mb-4 w-fit">
            <a class=" bn border bg-gray-300 px-4 py-2 mr-3  rounded" href="{{route('admin_view_admin')}}">
                Admin
            </a>
        </div>
        <div class="col-lg-2 col-md-6 mb-4 w-fit">
            <a class=" bn border bg-gray-300 px-4 py-2 mr-3  rounded" href="{{route('admin_view_labour')}}">
                Labour
            </a>
        </div>
        <div class="col-lg-2 col-md-6 mb-4 w-fit">
            <a class=" bn border bg-gray-300 px-4 py-2 mr-3 rounded" href="{{route('admin_view_pr')}}">
                Public Relation
            </a>
        </div>
        <div class="col-lg-2 col-md-6 mb-4 w-fit">
            <a class=" bn border bg-gray-300 px-4 py-2  mr-3 rounded" href="{{route('admin_view_finance')}}">
                Finance
            </a>
        </div>
        <div class="col-lg-2 col-md-6 mb-4 w-fit">
            <a class=" bn border bg-gray-300 px-4 py-2  mr-3 rounded" href="{{route('admin_view_membership')}}">
                Membership
            </a>
        </div>
        <div class="col-lg-2 col-md-6 mb-4 w-fit">
            <a class=" bn border bg-gray-300 px-4 py-2  mr-3 rounded" href="{{route('admin_view_it')}}">
                Information Technologies
            </a>
        </div>
    </div>


    {{--    show all leave--}}
    <div class="view_dataTable">
        <div class="container wrapper pt-2 sm:px-10 lg:px-20 apply-form -mt-8 staff_info ">
            <table class="table table-bordered table-hover pt-3  ">
                <thead>
                <tr>
                    <th class="col-md-3">Full Name</th>
                    <th class="col-md-3">Email</th>
                    <th class="col-md-3">Phone Number</th>
                    <th class="col-md-2">Position</th>
                    <th class="col-md-1 ">Ave.Leave</th>
                    <th class="col-md-1">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($employees as $employee)

                    <tr>
                        <td >
                            <div class="flex items-center">
                                {{$employee->last_name}} {{$employee->first_name}}
                                @if($employee->role === 'hod')
                                    <h1 class="bg-blue-100 w-fit h-fit py-0.5 px-1 text-blue-800 rounded text-[10px] font-semibold ml-2">
                                        HOD
                                    </h1>
                                @endif
                            </div>
                        </td>
                        <td> {{$employee->email}} </td>
                        <td>{{$employee->phone_num}} </td>
                        <td>{{$employee->position_staff}}</td>
                        <td>{{$employee->av_leave}} </td>
                        <td >
                            <div class=" justify-center items-center flex h-full">
                                <button class=" bg-green-600 px-2.5 py-1 rounded te" >
                                    <a href="{{ route('admin_staff_detail', ['id' => $employee->id]) }}"  >
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen w-5 h-5" viewBox="0 0 16 16">
                                            <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001m-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708z"/>
                                        </svg>
                                    </a>
                                </button>
                                <form>
                                    <button class=" bg-red-600 ml-5 px-2.5 py-1 rounded te" >
                                        <a href=""  >
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class=" bi bi-trash w-5 h-5 " viewBox="0 0 16 16">
                                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                                <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                                            </svg>
                                        </a>
                                    </button>
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



