<form method="post" action="{{ route('info.update') }}" >
    @csrf
    <div class="row form-wrap">
        <h1 class="text-xl font-semibold text-[#4863A0] pb-4 pt-10 ">Edit your information</h1>
        <div class="form-group col-md-6 mt-4 ">
            <label class="control-label mb-3">First Name</label>
            <input type="text" name="first_name" class="form-control rounded border-black " value="{{Auth::User()->first_name}}">
        </div>
        <div class="form-group col-md-6 mt-4 ">
            <label class="control-label mb-3">Last Name</label>
            <input type="text" name="last_name" class="form-control rounded border-black" value="{{Auth::User()->last_name}}" >
        </div>
        <div class="form-group  col-md-6 mt-4">
            <label class="control-label mb-3">Email Address</label>
            <label class="form-control border-black bg-gray-200 h-10" >
                {{ Auth::user()->email }}
            </label>
        </div>
        <div class="form-group col-md-6 mt-4 ">
            <label class="control-label mb-3 ">Phone Number</label>
            <input type="text" name="phone_num" class="form-control rounded border-black" value="{{Auth::User()->phone_num}}" >
        </div>
        <div class="form-group col-md-6 mt-4 ">
            <label class="control-label mb-3 ">Date Of Birth</label>
            <input type="text" id="datepicker" name="dob" class="border border-black w-full rounded" value="{{Auth::User()->dob}}">
        </div>
        <div class="form-group col-md-6 mt-4 ">
            <label class="control-label mb-3 ">Gender</label>
            <select name="gender" class="rounded-lg focus:ring-blue-500
                             focus:border-blue-500 block w-full p-2.5 border border-black " >
                <option value="{{Auth::User()->gender}}">
                    {{Auth::User()->gender}}
                </option>
                <option value="Female">Female</option>
                <option value="Male">Male</option>
            </select>
        </div>
        <div class="form-group col-md-6 mt-4 ">
            <label class="control-label mb-3 ">Address</label>
            <input type="text" name="address" class="form-control rounded border-black" value="{{Auth::User()->address}}">
        </div>
        <div class="form-group  col-md-6 mt-4">
            <label class="control-label mb-3">Department</label>
            <label class="form-control border-black bg-gray-200 h-10 mb-3" >
                {{ Auth::user()->department }}
            </label>
        </div>
    </div>
    <div class="col-md-3 mt-8">
        <button type="submit" class="btn text-md text-white hover:bg-blue-950 bg-blue-800 te ">Update Information</button>
    </div>
</form>

