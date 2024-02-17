<x-app-layout>
    <form method="POST" action="{{ route('admin.addStaff.store') }}">
        @csrf
            {{--    header--}}
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-xl text-gray-800 leading-tight font-semibold">
                            {{ __("Add Staff") }}
                        </div>
                    </div>
                </div>
            </div>


            {{--    applyleave--}}
            <div class="container apply-form px-28 " >
                <div class="row">
                    <div class="col-md-12">
                        <div class="card contact-support">
                            <div class="card-body">
                                <form action="">
                                    <div class="row form-wrap">

                                        <div class="form-group required col-md-6 ">
                                            <label class="control-label mb-3">First Name</label>
                                            <input type="text" name="FirstName" class="form-control rounded border-black " required placeholder="">
                                        </div>

                                        <div class="form-group required col-md-6 ">
                                            <label class="control-label mb-3">Last Name</label>
                                            <input type="text" name="LastName" class="form-control rounded border-black" required placeholder="">
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
                                            <input type="text" name="Position_Staff" class="form-control rounded border-black" required placeholder="">
                                        </div>

                                        <div class="form-group required col-md-6 mt-4 ">
                                            <label class="control-label mb-3 ">Staff ID</label>
                                            <input type="text" name="Staff_ID" class="form-control rounded border-black" required placeholder="">
                                        </div>

                                        <div class="form-group required col-md-6 mt-4 ">
                                            <label class="control-label mb-3 ">Gender</label>
                                            <input type="text" name="Gender" class="form-control rounded border-black" required placeholder="">
                                        </div>
                                        <div class="form-group required col-md-6 mt-4 ">
                                            <label class="control-label mb-3 ">Phone Number</label>
                                            <input type="text" name="Phonenumber" class="form-control rounded border-black" required placeholder="">
                                        </div>
                                        <div class="form-group required col-md-6 mt-4 ">
                                            <label class="control-label mb-3 ">Date Of Birth</label>
                                            <input type="text" name="Dob" class="form-control rounded border-black" required placeholder="">
                                        </div>
                                        <div class="form-group required col-md-6 mt-4 ">
                                            <label class="control-label mb-3 ">Address</label>
                                            <input type="text" name="Address" class="form-control rounded border-black" required placeholder="">
                                        </div>
                                        <div class="form-group required col-md-6 mt-4 ">
                                            <label class="control-label mb-3 ">Department</label>
                                            <input type="text" name="Department" class="form-control rounded border-black" required placeholder="">
                                        </div>
                                        <div class="form-group required col-md-6 mt-4 ">
                                            <label class="control-label mb-3 ">Staff Leave days</label>
                                            <input type="text" name="Av_leave" class="form-control rounded border-black" required placeholder="">
                                        </div>

                                        <div class="form-group required col-md-6 mt-4 ">
                                            <label class="control-label mb-3 ">User role</label>
                                            <input type="text" name="role" class="form-control rounded border-black" required  placeholder="">
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
