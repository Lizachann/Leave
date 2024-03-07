<x-app-layout>

    {{--        header--}}
    <div class="py-10">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg py-5 flex items-center ">

                <img src=" {{ asset ('assets/images/welcome.png') }}" alt=" Profile"
                     class= ' object-cover lg:w-[25%] w-[50%] h-full  ' />
                <div class="items-center w-full">
                    <div class="pl-[10%] pb-[2%] lg:text-2xl text-xl leading-tight font-semibold">
                        Welcome Back
                    </div>
                    <div class="pl-[10%] lg:text-4xl text-2xl text-blue-800 leading-tight font-semibold">
                        {{ Auth::user()->last_name.' '.Auth::user()->first_name }},
{{--                        Yang Chansovannmeanrith ,--}}
                    </div>
                </div>

            </div>
        </div>
    </div>

{{--    leave dashboard--}}

    <div class="pb-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg ">

                <div class="row dashboard mb-10 ml-14 mr-14 pt-5 ">
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
                            <a href="/staff/leave/history">
                                <div class="panel-footer">
                                    <span class="pull-left primary">View Details</span>
                                    <span class="pull-right primary"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
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
                            <a href="{{route('staff_pending_leave_history')}}">
                                <div class="panel-footer">
                                    <span class="pull-left yellow">View Details</span>
                                    <span class="pull-right yellow"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
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
                            <a href="{{route('staff_approved_leave_history')}}">
                                <div class="panel-footer">
                                    <span class="pull-left green">View Details</span>
                                    <span class="pull-right green"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
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
                            <a href="{{route('staff_rejected_leave_history')}}">
                                <div class="panel-footer">
                                    <span class="pull-left red">View Details</span>
                                    <span class="pull-right red"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

{{--    contact--}}
<div class="lg:flex col-lg-12  ">
    <div class="container apply-form max-w-7xl mx-auto lg:pb-20 pb-10" >
        <div class="card contact-support">
            <div class="card-body -mt-14 lg:-mx-16">
                <div class=" py-4 text-xl leading-tight font-semibold">
                    {{ __("My Head Department") }}
                </div>
                {{--                Detail--}}
                @foreach($hods as $hod)
                <div class=" flex items-center pb-4 ">
                    <img src=" {{ asset ('assets/images/user.jpg') }}" alt=" Profile"
                         class= 'rounded-full object-cover w-12 h-12 mr-3' />
                    <div class="flex justify-between w-full items-center ">
                        <div>
                            <h1 class="bg-blue-100 w-fit py-0.5 px-1 text-blue-800 rounded text-[10px] font-semibold">
                                {{$hod->position_staff}}
                            </h1>
                            <h1 class="text-l font-semibold py-1">
                                {{$hod->last_name.' '.$hod->first_name}}
                            </h1>
                            <h1 class="text-gray-500 text-[13px]">
                                {{$hod->email}}
                            </h1>
                        </div>
                        <div class="text-blue-500 text-[13px]">
                            {{$hod->phone_num}}
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="container apply-form max-w-7xl mx-auto lg:pb-20 pb-10" >
        <div class="card contact-support">
            <div class="card-body -mt-14 lg:-mx-16">
                <div class=" py-4 text-xl leading-tight font-semibold">
                    {{ __("Same Department Staff") }}
                </div>

                {{--                Detail--}}
                @foreach ($same_departments as $same_department)

                <div class=" flex items-center pb-4 ">
                    <img src=" {{ asset ('assets/images/user.jpg') }}" alt=" Profile"
                         class= 'rounded-full object-cover w-12 h-12 mr-3' />
                    <div class="flex justify-between w-full items-center ">
                        <div>
                            <h1 class="bg-blue-100 w-fit py-0.5 px-1 text-blue-800 rounded text-[10px] font-semibold">
                                {{$same_department->position_staff}}
                            </h1>
                            <h1 class="text-l font-semibold py-1">
                                {{$same_department->last_name.' '.$same_department->first_name}}
                            </h1>
                            <h1 class="text-gray-500 text-[13px]">
                                {{$same_department->email}}
                            </h1>
                        </div>
                        <div class="text-blue-500 text-[13px]">
                            {{$same_department->phone_num}}
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="container apply-form max-w-7xl mx-auto lg:pb-20 pb-10" >
        <div class="card contact-support">
            <div class="card-body -mt-14 lg:-mx-16">
                <div class=" py-4 text-xl leading-tight font-semibold ">
                    {{ __("All Contact") }}
                </div>

{{--                Admin department --}}
                <div class="pb-3 pl-4 text-l leading-tight font-semibold text-blue-800 ">
                    Admin
                </div>
                {{--                Detail--}}
                @foreach($staffs as $staff)
                    @if($staff->department === "Admin" )
                <div class=" flex items-center pb-4 ">
                    <img src=" {{ asset ('assets/images/user.jpg') }}" alt=" Profile"
                         class= 'rounded-full object-cover w-12 h-12 mr-3' />
                    <div class="flex justify-between w-full items-center ">
                        <div>
                            <h1 class="bg-blue-100 w-fit py-0.5 px-1 text-blue-800 rounded text-[10px] font-semibold">
                                {{$staff->position_staff}}
                            </h1>
                            <h1 class="text-l font-semibold py-1">
                                {{$staff->last_name.' '.$staff->first_name}}
                            </h1>
                            <h1 class="text-gray-500 text-[13px]">
                                {{$staff->email}}
                            </h1>
                        </div>
                        <div class="text-blue-500 text-[13px]">
                            {{$staff->phone_num}}
                        </div>
                    </div>
                </div>
                @endif
                @endforeach


                {{--                Labour department --}}
                <div class="pb-3 pl-4 text-l leading-tight font-semibold text-blue-800 ">
                    Labour
                </div>
                {{--                Detail--}}
                @foreach($staffs as $staff)
                    @if($staff->department === "Labour" )
                        <div class=" flex items-center pb-4 ">
                            <img src=" {{ asset ('assets/images/user.jpg') }}" alt=" Profile"
                                 class= 'rounded-full object-cover w-12 h-12 mr-3' />
                            <div class="flex justify-between w-full items-center ">
                                <div>
                                    <h1 class="bg-blue-100 w-fit py-0.5 px-1 text-blue-800 rounded text-[10px] font-semibold">
                                        {{$staff->position_staff}}
                                    </h1>
                                    <h1 class="text-l font-semibold py-1">
                                        {{$staff->last_name.' '.$staff->first_name}}
                                    </h1>
                                    <h1 class="text-gray-500 text-[13px]">
                                        {{$staff->email}}
                                    </h1>
                                </div>
                                <div class="text-blue-500 text-[13px]">
                                    {{$staff->phone_num}}
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach



                {{--                Membership department --}}
                <div class="pb-3 pl-4 text-l leading-tight font-semibold text-blue-800 ">
                    Membership
                </div>
                {{--                Detail--}}
                @foreach($staffs as $staff)
                    @if($staff->department === "Membership" )
                        <div class=" flex items-center pb-4 ">
                            <img src=" {{ asset ('assets/images/user.jpg') }}" alt=" Profile"
                                 class= 'rounded-full object-cover w-12 h-12 mr-3' />
                            <div class="flex justify-between w-full items-center ">
                                <div>
                                    <h1 class="bg-blue-100 w-fit py-0.5 px-1 text-blue-800 rounded text-[10px] font-semibold">
                                        {{$staff->position_staff}}
                                    </h1>
                                    <h1 class="text-l font-semibold py-1">
                                        {{$staff->last_name.' '.$staff->first_name}}
                                    </h1>
                                    <h1 class="text-gray-500 text-[13px]">
                                        {{$staff->email}}
                                    </h1>
                                </div>
                                <div class="text-blue-500 text-[13px]">
                                    {{$staff->phone_num}}
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach



                {{--                PR department --}}
                <div class="pb-3 pl-4 text-l leading-tight font-semibold text-blue-800 ">
                    Public Relation
                </div>
                {{--                Detail--}}
                @foreach($staffs as $staff)
                    @if($staff->department === "PR" )
                        <div class=" flex items-center pb-4 ">
                            <img src=" {{ asset ('assets/images/user.jpg') }}" alt=" Profile"
                                 class= 'rounded-full object-cover w-12 h-12 mr-3' />
                            <div class="flex justify-between w-full items-center ">
                                <div>
                                    <h1 class="bg-blue-100 w-fit py-0.5 px-1 text-blue-800 rounded text-[10px] font-semibold">
                                        {{$staff->position_staff}}
                                    </h1>
                                    <h1 class="text-l font-semibold py-1">
                                        {{$staff->last_name.' '.$staff->first_name}}
                                    </h1>
                                    <h1 class="text-gray-500 text-[13px]">
                                        {{$staff->email}}
                                    </h1>
                                </div>
                                <div class="text-blue-500 text-[13px]">
                                    {{$staff->phone_num}}
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach



                {{--                Finance department --}}
                <div class="pb-3 pl-4 text-l leading-tight font-semibold text-blue-800 ">
                    Finance
                </div>
                {{--                Detail--}}
                @foreach($staffs as $staff)
                    @if($staff->department === "Finance" )
                        <div class=" flex items-center pb-4 ">
                            <img src=" {{ asset ('assets/images/user.jpg') }}" alt=" Profile"
                                 class= 'rounded-full object-cover w-12 h-12 mr-3' />
                            <div class="flex justify-between w-full items-center ">
                                <div>
                                    <h1 class="bg-blue-100 w-fit py-0.5 px-1 text-blue-800 rounded text-[10px] font-semibold">
                                        {{$staff->position_staff}}
                                    </h1>
                                    <h1 class="text-l font-semibold py-1">
                                        {{$staff->last_name.' '.$staff->first_name}}
                                    </h1>
                                    <h1 class="text-gray-500 text-[13px]">
                                        {{$staff->email}}
                                    </h1>
                                </div>
                                <div class="text-blue-500 text-[13px]">
                                    {{$staff->phone_num}}
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach



                {{--                IT department --}}
                <div class="pb-3 pl-4 text-l leading-tight font-semibold text-blue-800 ">
                    Information Technology
                </div>
                {{--                Detail--}}
                @foreach($staffs as $staff)
                    @if($staff->department === "IT" )
                        <div class=" flex items-center pb-4 ">
                            <img src=" {{ asset ('assets/images/user.jpg') }}" alt=" Profile"
                                 class= 'rounded-full object-cover w-12 h-12 mr-3' />
                            <div class="flex justify-between w-full items-center ">
                                <div>
                                    <h1 class="bg-blue-100 w-fit py-0.5 px-1 text-blue-800 rounded text-[10px] font-semibold">
                                        {{$staff->position_staff}}
                                    </h1>
                                    <h1 class="text-l font-semibold py-1">
                                        {{$staff->last_name.' '.$staff->first_name}}
                                    </h1>
                                    <h1 class="text-gray-500 text-[13px]">
                                        {{$staff->email}}
                                    </h1>
                                </div>
                                <div class="text-blue-500 text-[13px]">
                                    {{$staff->phone_num}}
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach


            </div>
        </div>
    </div>

</div>





</x-app-layout>
