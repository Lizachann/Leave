<x-app-layout>
    <form method="POST" action="{{ route('staff.applyLeave.store') }}">
        @csrf

{{--    header--}}
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 -mt-5 ">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="px-6 pt-6 text-xl leading-tight font-semibold">
                        {{ __("Apply Leave") }}
                    </div>
                    <div class="px-9 pt-3 pb-6 text-l leading-tight ">
                        <a href="/home">
                            Home
                        </a>
                        >
                        <a href="/staff/applyleave">
                            Apply Leave
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="container apply-form pt-2 sm:px-18 lg:px-28 -mt-8" >
            <div class="row">
                <div class="col-md-12">
                    <div class="card contact-support">
                        <div class="card-body -mt-8 -mx-5">
                            <div class="text-blue-800 pb-6 text-2xl leading-tight font-bold">
                                {{ __("Apply Leave form") }}
                            </div>
                            <form onsubmit="">
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
                                        <input required type="text" id="start_date" name="from_date" class=" border border-black w-full  rounded" placeholder="dd/mm/yyyy" data-date-format='dd/mm/yyyy'>
                                    </div>

                                    <div class="form-group required col-md-6 my-2 ">
                                        <label class="control-label mb-2 ">To Date</label>
                                        <input required type="text" id="end_date" name="to_date" class="border border-black w-full rounded" placeholder="dd/mm/yyyy" data-date-format='dd/mm/yyyy'>
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
                                    <button type="submit"  class="btn text-md text-white hover:bg-blue-950 bg-blue-800 px-10 py-2 ">Apply</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</x-app-layout>

<script>
    // Check if there is a success message in the session
    @if(session('success'))
    showSuccessAlert('Apply Leave successfully!');
    @endif
    @if(session('error'))
    showErrorAlert('Failed to Apply Leave!');
    @endif
</script>
