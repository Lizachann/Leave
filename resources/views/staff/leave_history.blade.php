
<x-app-layout class="bg-gray-100">

    {{--        header--}}
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg -mt-5">
                <div class="px-6 pt-3 text-xl leading-tight font-semibold">
                    {{ __("Leave History") }}
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
    <div class="row dashboard mb-10 ml-14 mr-14 ">
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-file-text fa-4x"></i>
                        </div>
                        <div class="col-xs-9 ">
                            <div class="flex justify-between">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                     class="bi bi-menu-button-wide-fill w-12 h-12 -ml-8" viewBox="0 0 16 16">
                                    <path d="M1.5 0A1.5 1.5 0 0 0 0 1.5v2A1.5 1.5 0 0 0 1.5 5h13A1.5 1.5 0 0 0 16 3.5v-2A1.5 1.5 0 0 0 14.5 0zm1 2h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1 0-1m9.927.427A.25.25 0 0 1 12.604 2h.792a.25.25 0 0 1 .177.427l-.396.396a.25.25 0 0 1-.354 0zM0 8a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm1 3v2a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2zm14-1V8a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v2zM2 8.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m0 4a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5" />
                                </svg>
                                <div class="text-right">
                                    <div class='huge '>
                                        {{$leaveCount}}
                                    </div>
                                    <div class="under-number ">All Leave</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ********************************************************************************************************* -->

        <div class="col-lg-3 col-md-6">
            <div class="panel panel-yellow">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-user fa-4x"></i>
                        </div>
                        <div class="col-xs-9">
                            <div class="flex justify-between">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-hourglass-split w-12 h-12 -ml-8" viewBox="0 0 16 16">
                                    <path d="M2.5 15a.5.5 0 1 1 0-1h1v-1a4.5 4.5 0 0 1 2.557-4.06c.29-.139.443-.377.443-.59v-.7c0-.213-.154-.451-.443-.59A4.5 4.5 0 0 1 3.5 3V2h-1a.5.5 0 0 1 0-1h11a.5.5 0 0 1 0 1h-1v1a4.5 4.5 0 0 1-2.557 4.06c-.29.139-.443.377-.443.59v.7c0 .213.154.451.443.59A4.5 4.5 0 0 1 12.5 13v1h1a.5.5 0 0 1 0 1zm2-13v1c0 .537.12 1.045.337 1.5h6.326c.216-.455.337-.963.337-1.5V2zm3 6.35c0 .701-.478 1.236-1.011 1.492A3.5 3.5 0 0 0 4.5 13s.866-1.299 3-1.48zm1 0v3.17c2.134.181 3 1.48 3 1.48a3.5 3.5 0 0 0-1.989-3.158C8.978 9.586 8.5 9.052 8.5 8.351z"/>
                                </svg>
                                <div class="text-right">
                                    <div class='huge '>
                                        {{$countPending}}
                                    </div>
                                    <div class="under-number ">Pending Leave</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ********************************************************************************************************* -->

        <div class="col-lg-3 col-md-6">
            <div class="panel panel-green">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-comments fa-4x"></i>
                        </div>

                        <div class="col-xs-9">
                            <div class="flex justify-between">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-hourglass-bottom w-12 h-12 -ml-8" viewBox="0 0 16 16">
                                    <path d="M2 1.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-1v1a4.5 4.5 0 0 1-2.557 4.06c-.29.139-.443.377-.443.59v.7c0 .213.154.451.443.59A4.5 4.5 0 0 1 12.5 13v1h1a.5.5 0 0 1 0 1h-11a.5.5 0 1 1 0-1h1v-1a4.5 4.5 0 0 1 2.557-4.06c.29-.139.443-.377.443-.59v-.7c0-.213-.154-.451-.443-.59A4.5 4.5 0 0 1 3.5 3V2h-1a.5.5 0 0 1-.5-.5m2.5.5v1a3.5 3.5 0 0 0 1.989 3.158c.533.256 1.011.791 1.011 1.491v.702s.18.149.5.149.5-.15.5-.15v-.7c0-.701.478-1.236 1.011-1.492A3.5 3.5 0 0 0 11.5 3V2z"/>
                                </svg>
                                <div class="text-right">
                                    <div class='huge '>
                                        {{$countApproved}}
                                    </div>
                                    <div class="under-number ">Approved Leave</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- ********************************************************************************************************* -->

        <div class="col-lg-3 col-md-6">
            <div class="panel panel-red">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-list fa-4x"></i>
                        </div>
                        <div class="col-xs-9 ">
                            <div class="flex justify-between">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-hourglass w-12 h-12 -ml-8" viewBox="0 0 16 16">
                                    <path d="M2 1.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-1v1a4.5 4.5 0 0 1-2.557 4.06c-.29.139-.443.377-.443.59v.7c0 .213.154.451.443.59A4.5 4.5 0 0 1 12.5 13v1h1a.5.5 0 0 1 0 1h-11a.5.5 0 1 1 0-1h1v-1a4.5 4.5 0 0 1 2.557-4.06c.29-.139.443-.377.443-.59v-.7c0-.213-.154-.451-.443-.59A4.5 4.5 0 0 1 3.5 3V2h-1a.5.5 0 0 1-.5-.5m2.5.5v1a3.5 3.5 0 0 0 1.989 3.158c.533.256 1.011.791 1.011 1.491v.702c0 .7-.478 1.235-1.011 1.491A3.5 3.5 0 0 0 4.5 13v1h7v-1a3.5 3.5 0 0 0-1.989-3.158C8.978 9.586 8.5 9.052 8.5 8.351v-.702c0-.7.478-1.235 1.011-1.491A3.5 3.5 0 0 0 11.5 3V2z"/>
                                </svg>
                                <div class="text-right">
                                    <div class='huge '>
                                        {{$countRejected}}
                                    </div>
                                    <div class="under-number ">Rejected Leave</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
{{--                <a href="categories.php">--}}
{{--                    <div class="panel-footer">--}}
{{--                        <span class="pull-left red">View Details</span>--}}
{{--                        <span class="pull-right red"><i class="fa fa-arrow-circle-right"></i></span>--}}
{{--                        <div class="clearfix"></div>--}}
{{--                    </div>--}}
{{--                </a>--}}
            </div>
        </div>
    </div>




    {{--    show all leave history --}}
    <div class="view_dataTable">
        <div class="container wrapper pt-2 sm:px-18 lg:px-28 apply-form  ">

            <table class="table table-bordered table-hover pt-3  ">

                <thead>
                <tr>
                    <th class="col-md-2">Leave Type</th>
                    <th class="col-md-2">Start Date</th>
                    <th class="col-md-2">End Date</th>
                    <th class="col-md-2">Leave Days</th>
                    <th class="col-md-2">HOD Status</th>
                    <th class="col-md-2">Admin Status</th>
                    <th class="col-md-2">Action</th>
                </tr>
                </thead>

                <tbody >
                @foreach($leaves as $leave)
                    <tr>
                        <td > {{$leave->leave_type}} </td>
                        <td>{{ \Carbon\Carbon::parse($leave->from_date)->format('d-m-Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($leave->to_date)->format('d-m-Y') }}</td>
                        <td>{{$leave->request_days}}</td>
                        <td>
                            @if($leave->hod_remark == 0)
                                Pending
                            @elseif($leave->hod_remark == 1)
                                Approved
                            @elseif($leave->hod_remark == 2)
                                Rejected
                            @endif
                        </td>
                        <td >
                            @if($leave->admin_remark == 0)
                                Pending
                            @elseif($leave->admin_remark == 1)
                                Approved
                            @elseif($leave->admin_remark == 2)
                                Rejected
                            @endif
                        </td>

                        <td class="flex justify-center">
                            <button class=" px-3 py-1 rounded" >
                                <a href="{{ route('staff_view_leave_detail', ['id' => $leave->id]) }}"  >
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye w-6 h-6" viewBox="0 0 16 16">
                                        <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z"/>
                                        <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
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


