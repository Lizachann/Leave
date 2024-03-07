
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
{{--    @include('staff.leave_history.leave_history_dashboard')--}}

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
                                <a href="{{ route('hod_view_leave_detail', ['id' => $leave->id]) }}"  >
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


