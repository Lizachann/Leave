<form method="post" action="{{ route('password.update') }}" >
    @csrf
    <div class="row form-wrap">
        <h1 class="text-xl font-semibold text-[#4863A0] pb-4 pt-10 ">Change Password</h1>
        <div class="form-group   ">
            <label for="current_password" class="control-label mb-3 ">Current Password</label>
            <input id="current_password" name="current_password" type="password" class="mb-3 border border-black w-full rounded" autocomplete="current-password">
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2 mb-3" />
        </div>
        <div class="form-group ">
            <label for="password" class="control-label mb-3 ">New Password</label>
            <input id="password" name="password" type="text" class="border border-black w-full rounded mb-3" autocomplete="new-password">
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2 mb-3" />
        </div>
        {{--        <div class="form-group">--}}
        {{--            <label for="password_confirmation" class="control-label mb-3 ">Confirm Password</label>--}}
        {{--            <input id="password_confirmation" name="password_confirmation" type="password" class="mb-3 border border-black w-full rounded" autocomplete="new-password">--}}
        {{--            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2 mb-3" />--}}
        {{--        </div>--}}
    </div>
    <div class="col-md-3 mt-8">
        <button type="submit" class="btn text-md text-white hover:bg-blue-950 bg-blue-800 ">Update Password</button>
    </div>
</form>
