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
            <a href="{{route('staff_leave_history')}}">
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
