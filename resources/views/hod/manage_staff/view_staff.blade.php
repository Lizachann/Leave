
<x-app-layout class="bg-gray-100">

    {{--        header--}}
    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg -mt-5">
                <div class="px-6 pt-3 text-xl leading-tight font-semibold">
                    Manage Staff
                </div>
                <div class="px-9 pt-3 pb-3 text-l leading-tight ">
                    <a href="/home">
                        Home
                    </a>
                </div>
            </div>
        </div>
    </div>

    {{--    dashboard--}}
    <div class="-mt-14">
        @include('hod.manage_staff.dashboard')
    </div>

    {{--    show all leave--}}
    <div class="view_dataTable">
        <div class="container wrapper pt-2 sm:px-10 lg:px-20 apply-form -mt-8 staff_info ">
            <table class="table table-bordered table-hover pt-3  ">

                <thead>
                <tr>
                    <th class="col-md-3">Full Name</th>
                    <th class="col-md-3">Email</th>
                    <th class="col-md-2">Phone Number</th>
                    <th class="col-md-2">Position</th>
                    <th class="col-md-2 ">Ave.Leave</th>
                    <th class="col-md-1">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($employees as $employee)

                    <tr>
                        <td>{{$employee->last_name}} {{$employee->first_name}} </td>
                        <td> {{$employee->email}} </td>
                        <td>{{$employee->phone_num}} </td>
                        <td>{{$employee->position_staff}}</td>
                        <td>{{$employee->av_leave}} </td>
                        <td >
                            <div class=" justify-center items-center flex">
                                <button class=" px-3 py-1 rounded" >
                                    <a href="{{ route('staff_detail', ['id' => $employee->id]) }}"  >
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



