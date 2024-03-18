<form method="post" action="{{ route('hod_pw_update', [$id]) }}">
    @csrf

    <div class="container apply-form pt-2 sm:px-10 lg:px-20" >
        <div class="row">
            <div class="col-md-12">
                <div class="card contact-support">
                    <div class="card-body -mt-8 -mx-5">
                        <div class="text-blue-800 pb-6 text-2xl leading-tight font-bold">
                            {{ __("Edit Staff Password") }}
                        </div>
                        <div class="row form-wrap">
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
                        </div>
                        <div class="col-md-3 mt-8">
                            <button type="submit" class="btn text-md text-white hover:bg-blue-950 bg-blue-800 ">Update Password</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
