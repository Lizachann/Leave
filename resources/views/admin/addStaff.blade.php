<x-app-layout>
    <form method="POST" action="{{ route('admin.addStaff.store') }}">
        @csrf
        {{--    header--}}
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 -mt-5 ">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="px-6 pt-3 text-xl leading-tight font-semibold">
                        {{ __("Add Staff") }}
                    </div>
                    <div class="px-9 pt-3 pb-3 text-l leading-tight ">
                        <a href="/home">
                            Home
                        </a>
                        >
                        <a href="/admin/addStaff">
                            Add Staff
                        </a>


                    </div>
                </div>
            </div>
        </div>

            {{--    applyleave--}}
            <div class="container apply-form  pt-2 sm:px-18 lg:px-28 -mt-8 "  >
                <div class="row">
                    <div class="col-md-12">
                        <div class="card contact-support">
                            <div class="card-body -mt-8 -mx-5">
                                <div class="text-blue-800 pb-6 text-2xl leading-tight font-bold  ">
                                    {{ __("Add Staff Form") }}
                                </div>
                                <form action="">
                                    <div class="row form-wrap">

                                        <div class="form-group required col-md-6 ">
                                            <label class="control-label mb-3">First Name</label>
                                            <input type="text" name="first_name" class="form-control rounded border-black " required placeholder="">
                                        </div>

                                        <div class="form-group required col-md-6 ">
                                            <label class="control-label mb-3">Last Name</label>
                                            <input type="text" name="last_name" class="form-control rounded border-black" required placeholder="">
                                        </div>

                                        <div class="form-group required col-md-6 mt-4 ">
                                            <label class="control-label mb-3">Email Address</label>
                                            <input type="text" name="email" class="form-control rounded border-black" required placeholder="">
                                        </div>

                                        <div class="form-group required col-md-6 mt-4 ">
                                            <label class="control-label mb-3 ">Password</label>
                                            <input type="text" name="password" class="form-control rounded border-black"  required placeholder="">
                                        </div>

                                        <div class="form-group required col-md-6 mt-4 ">
                                            <label class="control-label mb-3">Staff Position</label>
                                            <input type="text" name="position_staff" class="form-control rounded border-black" required placeholder="">
                                        </div>

                                        <div class="form-group required col-md-6 mt-4 ">
                                            <label class="control-label mb-3 ">Staff ID</label>
                                            <input type="text" name="staff_ID" class="form-control rounded border-black" required placeholder="">

{{--                                            auto generate ID--}}
{{--                                            <label class="form-control border-black bg-gray-200 h-10" >--}}
{{--                                                {{ $nextID }}--}}
{{--                                            </label>--}}
{{--                                            <input type="hidden" name="staff_ID" value="{{$nextID}}">--}}
                                        </div>

                                        <div class="form-group required col-md-6 mt-4 ">
                                            <label class="control-label mb-3 ">Gender</label>
{{--                                            <input type="text" name="gender" class="form-control rounded border-black" required placeholder="">--}}
                                                <select name="gender" class="rounded-lg focus:ring-blue-500
                                        focus:border-blue-500 block w-full p-2.5 border border-black " required>
                                                    <option value="">Select Gender </option>
                                                    <option value="Female">Female</option>
                                                    <option value="Male">Male</option>
                                                </select>
                                        </div>
                                        <div class="form-group required col-md-6 mt-4 ">
                                            <label class="control-label mb-3 ">Phone Number</label>
                                            <input type="text" name="phone_num" class="form-control rounded border-black" required placeholder="">
                                        </div>
                                        <div class="form-group required col-md-6 mt-4 ">
                                            <label class="control-label mb-3 ">Date Of Birth</label>
                                            <input type="text" id="datepicker" name="dob" class="border border-black w-full rounded" required placeholder="Select Date" data-date-format='dd/mm/yyyy'>
                                        </div>
                                        <div class="form-group required col-md-6 mt-4 ">
                                            <label class="control-label mb-3 ">Address</label>
                                            <input type="text" name="address" class="form-control rounded border-black" required placeholder="">
                                        </div>
                                        <div class="form-group required col-md-6 mt-4 ">
                                            <label class="control-label mb-3 ">Department</label>
{{--                                            <input type="text" name="department" class="form-control rounded border-black" required placeholder="">--}}
                                                <select id="department" name="department" class="rounded-lg focus:ring-blue-500
                                        focus:border-blue-500 block w-full p-2.5 border border-black" required>
                                                    <option value="">Select Department </option>
                                                    <option value="IT">Information Technology</option>
                                                    <option value="Admin">Admin</option>
                                                    <option value="Labour">Labour</option>
                                                    <option value="PR">Public Relation</option>
                                                    <option value="Membership">Membership</option>
                                                    <option value="Finance">Finance</option>
                                                </select>
                                        </div>
                                        <div class="form-group required col-md-6 mt-4 ">
                                            <label class="control-label mb-3 ">Staff Leave days</label>
                                            <input type="text" name="av_leave" class="form-control rounded border-black" required placeholder="">
                                        </div>

                                        <div class="form-group required col-md-6 mt-4 ">
                                            <label class="control-label mb-3 ">User role</label>
{{--                                            <input type="text" name="role" class="form-control rounded border-black" required placeholder="">--}}
                                             <select name="role" class="rounded-lg focus:ring-blue-500
                                        focus:border-blue-500 block w-full p-2.5 border border-black mb-3" required >
                                                    <option value="">Select Role </option>
                                                    <option value="admin">Admin</option>
                                                    <option value="hod">Head Department</option>
                                                    <option value="staff">Staff</option>
                                                </select>
                                        </div>
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
    </form>
</x-app-layout>

<script>

    {{--     Check if there is a success message in the session--}}
    @if(session('success'))
        showSuccessAlert('Staff added successfully!');
    @endif
    @if(session('error'))
        showErrorAlert('Failed to add staff!');
    @endif
    @if(session('errorValidation'))
        showErrorAlert('Something Wrong With Validation!');
    @endif

    </script>
