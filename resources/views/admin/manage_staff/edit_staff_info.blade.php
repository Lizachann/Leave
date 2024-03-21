<form method="post" action="{{ route('admin_edit_staff_detail',[$id]) }}" >
    @csrf
    @foreach($employees as $employee)
        <div class="container apply-form pt-2 sm:px-10 lg:px-20 -mt-8" >
            <div class="row">
                <div class="col-md-12">
                    <div class="card contact-support">
                        <div class="card-body -mt-8 -mx-5">
                            <div class="text-blue-800 pb-6 text-2xl leading-tight font-bold">
                                {{ __("Edit Staff Information") }}
                            </div>
                            <div class="row form-wrap">
                                    <div class="form-group col-md-4 mt-4">
                                        <label class="control-label mb-2">First Name</label>
                                        <input type="text" name="first_name" class="form-control rounded border-black " value="{{$employee->first_name}}">
                                    </div>
                                    <div class="form-group col-md-4 mt-4 ">
                                        <label class="control-label mb-2">Last Name</label>
                                        <input type="text" name="last_name" class="form-control rounded border-black" value="{{$employee->last_name}}" >
                                    </div>
                                    <div class="form-group col-md-4 mt-4 ">
                                        <label class="control-label mb-2 ">Phone Number</label>
                                        <input type="text" name="phone_num" class="form-control rounded border-black" value="{{$employee->phone_num}}" >
                                    </div>
                                    <div class="form-group col-md-4 mt-4">
                                        <label class="control-label mb-2">Email Address</label>
                                        <input type="text" name="email" class="form-control rounded border-black" value="{{$employee->email}}" >
                                    </div>
                                    <div class="form-group col-md-4 mt-4">
                                        <label class="control-label mb-2">Staff ID</label>
                                        <label class="form-control border-black bg-gray-200 h-10" >
                                            {{$employee->staff_ID }}
                                        </label>
                                    </div>
                                    <div class="form-group col-md-4 mt-4">
                                        <label class="control-label mb-2">Department</label>
                                        <input type="text" name="department" class="form-control rounded border-black" value="{{$employee->department}}" >
                                    </div>
                                    <div class="form-group col-md-4 mt-4 ">
                                        <label class="control-label mb-2 ">Staff Position</label>
                                        <input type="text" name="position_staff" class="form-control rounded border-black" value="{{$employee->position_staff}}" >
                                    </div>
                                    <div class="form-group col-md-4 mt-4 ">
                                        <label class="control-label mb-2 ">Date Of Birth</label>
                                        <input type="text" id="datepicker" name="dob" class="border border-black w-full rounded" value="{{ \Carbon\Carbon::createFromFormat('d/m/Y', $employee->dob)->format('d M Y') }} " data-date-format='dd M yyyy'>
                                    </div>
                                    <div class="form-group col-md-4 mt-4 ">
                                        <label class="control-label mb-2 ">Gender</label>
                                        <select name="gender" class="rounded-lg focus:ring-blue-500
                             focus:border-blue-500 block w-full p-2.5 border border-black h-10 " >
                                            <option value="{{$employee->gender}}">
                                                {{$employee->gender}}
                                            </option>
                                            <option value="Female">Female</option>
                                            <option value="Male">Male</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4 mt-4 ">
                                        <label class="control-label mb-2">Address</label>
                                        <input type="text" name="address" class="form-control rounded border-black" value="{{$employee->address}}">
                                    </div>
                                    <div class="form-group col-md-4 mt-4">
                                        <label class="control-label mb-2">Leave Days Left</label>
                                        <input type="text" name="av_leave" class="form-control rounded border-black" value="{{$employee->av_leave}}" >

                                    </div>
                                    <div class="form-group col-md-4 mt-4">
                                        <label class="control-label mb-2">User Role</label>
                                        <select name="role" class="rounded-lg focus:ring-blue-500
                                                focus:border-blue-500 block w-full p-2.5 border border-black h-10 mb-4" >
                                            <option value="{{$employee->role}}">
                                                @if($employee->role == 'admin')
                                                    Admin
                                                @elseif($employee->role == 'staff')
                                                    Staff
                                                @elseif($employee->role == 'hod')
                                                    Head Department
                                                @endif
                                            </option>
                                            <option value="admin">Admin</option>
                                            <option value="hod">Head Department</option>
                                            <option value="hod">Staff</option>
                                        </select>
{{--                                        <input type="text" name="role" class="form-control rounded border-black" value="{{$employee->role}}" >--}}
                                    </div>
                                </div>
                            <div class="col-md-3 mt-8">
                                <button type="submit" class="btn text-md text-white hover:bg-blue-950 bg-blue-800 ">Update Information</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</form>
