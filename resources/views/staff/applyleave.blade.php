<x-app-layout>

{{--    header--}}
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-xl text-gray-800 leading-tight font-semibold">
                    {{ __("Apply Leave") }}
                </div>
            </div>
        </div>
    </div>


{{--    applyleave--}}
    <div class="container apply-form pt-2 sm:px-18 lg:px-28 " >
        <div class="row">
            <div class="col-md-12">
                <div class="card contact-support">
                    <div class="card-body">
                        <form action="">
                            <div class="row form-wrap">

                                <div class="form-group required col-md-6 mb-2 ">
                                    <label class="control-label mb-2">Last Name</label>
                                    <label class="form-control border-black bg-gray-200" >
                                        {{ Auth::user()->LastName }}
                                    </label>
                                </div>

                                <div class="form-group required col-md-6 mb-2 ">
                                    <label class="control-label mb-2">First Name</label>
                                    <label class="form-control border-black bg-gray-200" >
                                        {{ Auth::user()->FirstName }}
                                    </label>
                                </div>

                                <div class="form-group required col-md-6 my-2 ">
                                    <label class="control-label mb-2">Position</label>
                                    <label class="form-control border-black bg-gray-200" >
                                        {{ Auth::user()->Position_Staff }}
                                    </label>
                                </div>

                                <div class="form-group required col-md-6 my-2 ">
                                    <label class="control-label mb-2">Staff ID</label>
                                    <label class="form-control border-black bg-gray-200" >
                                        {{ Auth::user()->Staff_ID }}
                                    </label>
                                </div>

                                <div class="form-group required col-md-6 my-2 ">
                                    <label class="control-label mb-2">Leave Type</label>

                                    <form class="form-control">
                                        <select id="countries" class="rounded-lg focus:ring-blue-500
                                        focus:border-blue-500 block w-full p-2.5">
                                            <option selected>Select Leave Type </option>
                                            <option value="Annual Leave">Annual Leave</option>
                                            <option value="Medical Leave">Medical Leave</option>
                                            <option value="Compensatory Leave.">Compensatory Leave</option>
                                            <option value="Maternity Leave">Maternity Leave</option>
                                        </select>
                                    </form>
                                </div>


{{--                                <div class="form-group required col-md-6 my-2 ">--}}
{{--                                    <label class="control-label mb-2 ">Leave type</label>--}}
{{--                                    <div class="ui form">--}}
{{--                                            <div class="field">--}}
{{--                                                <div class="ui calendar" id="rangestart">--}}
{{--                                                    <div class="ui input left icon">--}}
{{--                                                        <i class="calendar icon"></i>--}}
{{--                                                        <input type="text" placeholder="Start">--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}


{{--                                <div class="form-group required col-md-6 my-2 ">--}}
{{--                                    <label class="control-label mb-2 ">Leave type</label>--}}
{{--                                    <div class="ui form">--}}
{{--                                        <div class="field">--}}
{{--                                            <div class="ui calendar" id="rangestart">--}}
{{--                                                <div class="ui input left icon">--}}
{{--                                                    <i class="calendar icon"></i>--}}
{{--                                                    <input type="text" placeholder="Start">--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}



                                <div class="form-group required col-md-6 my-2 ">
                                    <label class="control-label mb-2 ">From Date</label>
                                    <div class="flex">
                                        <input type="text" class="form-control rounded border-black" placeholder="">
                                        <form class="pl-[3%]">
                                            <select id="countries" class="rounded-lg focus:ring-blue-500
                                        focus:border-blue-500 block w-full p-2.5">
                                                <option selected>Select Time </option>
                                                <option value="am">AM</option>
                                                <option value="pm">PM</option>
                                            </select>
                                        </form>
                                    </div>

                                </div>

                                <div class="form-group required col-md-6 my-2 ">
                                    <label class="control-label mb-2 ">To Date</label>
                                    <div class="flex">
                                        <input type="text" class="form-control rounded border-black" placeholder="">
                                        <form class="pl-[3%]">
                                            <select id="countries" class="rounded-lg focus:ring-blue-500
                                        focus:border-blue-500 block w-full p-2.5">
                                                <option selected>Select Time </option>
                                                <option value="am">AM</option>
                                                <option value="pm">PM</option>
                                            </select>
                                        </form>
                                    </div>

                                </div>




                                {{--                                <div class="form-group required col-md-6 my-4 ">--}}
{{--                                    <div class="custom-file">--}}
{{--                                        <input type="file" class="custom-file-input" id="customFile">--}}
{{--                                        <label class="custom-file-label selected" for="customFile">gift-box.png</label>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                                <div class="form-group col-md-6 my-4 ">
                                    <textarea type="textarea" class="form-control " rows="6" placeholder="Comments"></textarea>
                                </div>
{{--                                <div class="captcha-wrap col-md-6 my-4 ">--}}
{{--                                    <img src=" {{ asset ('assets/images/test.png') }}" alt="captcha" class="img-fluid">--}}
{{--                                </div>--}}
                            </div>
                            <div class="col-md-3 mt-8">
                                <button type="submit" class="btn text-md text-white hover:bg-blue-950 bg-blue-800 te ">Add Staff</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>




</x-app-layout>
