<x-app-layout>
    <form method="POST" action="{{ route('staff.applyLeave.store') }}">
        @csrf

        {{--    header--}}
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="px-6 pt-6 text-xl leading-tight font-semibold">
                        {{ __("All Leave") }}
                    </div>
                    <div class="px-9 pt-3 pb-6 text-l leading-tight ">
                        Dashboard > Leave > All Leave
                    </div>
                </div>
            </div>
        </div>

        {{--        @foreach($leaves as $leave)--}}
        {{--            {{$leave->leaveDays_left == Auth::user()->av_leave }}--}}

        {{--        @endforeach--}}

        {{--    applyleave--}}
        <div class="container apply-form pt-2 sm:px-18 lg:px-28 " >
            <div class="row">
                <div class="col-md-12">
                    <div class="card contact-support">
                        <div class="card-body">
                            <div class="px-6 pb-6 text-xl leading-tight font-semibold">
                                {{ __("Staff Leave form") }}
                            </div>
                            <form action="">
                                <div class="row form-wrap">


                                    <div class="form-group required col-md-6 mb-2 ">
                                        <label class="control-label mb-2">Last Name</label>
                                        <label class="form-control border-black bg-gray-200" >
                                            {{ Auth::user()->last_name }}
                                        </label>
                                    </div>

                                    <div class="form-group required col-md-6 mb-2 ">
                                        <label class="control-label mb-2">First Name</label>
                                        <label class="form-control border-black bg-gray-200" >
                                            {{ Auth::user()->first_name }}
                                        </label>
                                    </div>

                                    <div class="form-group required col-md-6 my-2 ">
                                        <label class="control-label mb-2">Position</label>
                                        <label class="form-control border-black bg-gray-200" >
                                            {{ Auth::user()->position_staff }}
                                        </label>
                                    </div>

                                    <div class="form-group required col-md-6 my-2 ">
                                        <label class="control-label mb-2">Staff ID</label>
                                        <label class="form-control border-black bg-gray-200" >
                                            {{ Auth::user()->staff_ID }}
                                        </label>
                                    </div>


                                    <div class="form-group required my-2 ">
                                        <label class="control-label mb-2">Leave Type</label>
                                        <select name="leave_type" class="rounded-lg focus:ring-blue-500
                                            focus:border-blue-500 block w-full p-2.5 border border-black" required autocomplete="off" >
                                            <option value="" >Select Leave Type </option>
                                            <option value="Annual Leave">Annual Leave</option>
                                            <option value="Medical Leave">Medical Leave</option>
                                            <option value="Compensatory Leave">Compensatory Leave</option>
                                            <option value="Maternity Leave">Maternity Leave</option>
                                        </select>
                                        {{--                                        </form>--}}
                                    </div>

                                    <div class="form-group required col-md-6 my-2 ">
                                        <label class="control-label mb-2 ">From Date</label>
                                        <div class="flex">
                                            <input required type="text" id="start_date" name="from_date" class="border border-black w-full rounded" placeholder="mm/dd/yyyy ">
                                            <div class="pl-[3%]">
                                                <select name="from_time" class="rounded-lg focus:ring-blue-500
                                            focus:border-blue-500 block w-full p-2.5 border border-black" required >
                                                    <option value="">Select Time </option>
                                                    <option value="am">AM</option>
                                                    <option value="pm">PM</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group required col-md-6 my-2 ">
                                        <label class="control-label mb-2 ">To Date</label>
                                        <div class="flex">
                                            <input required type="text" id="end_date" name="to_date" class="border border-black w-full rounded" placeholder="mm/dd/yyyy">
                                            <div class="pl-[3%]">
                                                <select name="to_time" class="rounded-lg focus:ring-blue-500
                                            focus:border-blue-500 block w-full p-2.5 border border-black" required>
                                                    <option value="" >Select Time </option>
                                                    <option value="am">AM</option>
                                                    <option value="pm">PM</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group required col-md-6 my-2 ">
                                        <label class="control-label mb-2">Request Days (0.5 for half-days)</label>
                                        <input type="text" name="request_days" class="form-control rounded border-black" required placeholder="">
                                    </div>

                                    <div class="form-group required col-md-6 my-2 ">
                                        <label class="control-label mb-2">Leave Days Left</label>
                                        <label class="form-control border-black bg-gray-200" >
                                            {{ Auth::user()->av_leave }}
                                        </label>
                                    </div>

                                    <div class="form-group col-md-6 my-4 ">
                                        <textarea type="textarea" name="work_covered" class="form-control " rows="6" placeholder="Description"></textarea>
                                    </div>

                                </div>
                                <div class="flex mt-8 justify-between items-center x">
                                    <button type="submit" class="btn text-md text-white hover:bg-blue-950 bg-blue-800 px-10 py-2 ">Apply</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</x-app-layout>

