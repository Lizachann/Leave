{{--    contact--}}
<div class="lg:flex col-lg-12 lg:-mt-10 ">
    <div class="container apply-form max-w-7xl mx-auto lg:pb-20 pb-10" >
        <div class="card contact-support">
            <div class="card-body -mt-14 lg:-mx-16">
                <div class=" py-4 text-xl leading-tight font-semibold">
                    {{ __("All Head Department") }}
                </div>
                {{--                Detail--}}
                @foreach($hods as $hod)
                    <div class=" flex items-center pb-4 ">
                        <!-- If profile picture exists, display it with the same size -->
                        @if ($hod->profile)
                            <img src="{{ asset('storage/' . $hod->profile) }}" alt="Profile" class="rounded-full object-cover w-12 h-12 mr-3 ">
                        @else
                            <!-- Default profile picture -->
                            <img src="{{ asset('assets/images/user.jpg') }}" alt="Profile" class=" rounded-full object-cover w-12 h-12 mr-3">
                        @endif
                        <div class="flex justify-between w-full items-center ">
                            <div class="w-3/4"> {{-- Set width to 75% --}}
                                <h1 class="bg-blue-100 w-fit py-0.5 px-1 text-blue-800 rounded text-[10px] font-semibold">
                                    {{$hod->position_staff}}
                                </h1>
                                <h1 class="text-l font-semibold py-1">
                                    {{$hod->last_name.' '.$hod->first_name}}
                                </h1>
                                <h1 class="text-gray-500 text-[13px]">
                                    {{$hod->email}}
                                </h1>
                            </div>
                            <div class="w-1/4 text-blue-500 text-[13px]"> {{-- Set width to 25% --}}
                                {{$hod->phone_num}}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="container apply-form max-w-7xl mx-auto lg:pb-20 pb-10" >
        <div class="card contact-support">
            <div class="card-body -mt-14 lg:-mx-16">
                <div class=" py-4 text-xl leading-tight font-semibold ">
                    {{ __("All Staff Contact") }}
                </div>
                {{--                Admin--}}
                <div class="pb-3 pl-4 text-l leading-tight font-semibold text-blue-800 ">
                    Admin
                </div>
                @foreach($allAdmins as $allAdmin)
                    <div class=" flex items-center pb-4 ">
                        <!-- If profile picture exists, display it with the same size -->
                        @if ($allAdmin->profile)
                            <img src="{{ asset('storage/' . $allAdmin->profile) }}" alt="Profile" class="rounded-full object-cover w-12 h-12 mr-3 ">
                        @else
                            <!-- Default profile picture -->
                            <img src="{{ asset('assets/images/user.jpg') }}" alt="Profile" class=" rounded-full object-cover w-12 h-12 mr-3">
                        @endif
                        <div class="flex justify-between w-full items-center ">
                            <div>
                                <h1 class="bg-blue-100 w-fit py-0.5 px-1 text-blue-800 rounded text-[10px] font-semibold">
                                    {{$allAdmin->position_staff}}
                                </h1>
                                <h1 class="text-l font-semibold py-1">
                                    {{$allAdmin->last_name.' '.$allAdmin->first_name}}
                                </h1>
                                <h1 class="text-gray-500 text-[13px]">
                                    {{$allAdmin->email}}
                                </h1>
                            </div>
                            <div class="text-blue-500 text-[13px]">
                                {{$allAdmin->phone_num}}
                            </div>
                        </div>
                    </div>
                @endforeach

                {{--                Finance department --}}
                <div class="pb-3 pl-4 text-l leading-tight font-semibold text-blue-800 ">
                    Finance Department
                </div>
                {{--                Detail--}}
                @foreach($staffs as $staff)
                    @if($staff->department === "Finance" )
                        <div class=" flex items-center pb-4 ">
                            <!-- If profile picture exists, display it with the same size -->
                            @if ($staff->profile)
                                <img src="{{ asset('storage/' . $staff->profile) }}" alt="Profile" class="rounded-full object-cover w-12 h-12 mr-3 ">
                            @else
                                <!-- Default profile picture -->
                                <img src="{{ asset('assets/images/user.jpg') }}" alt="Profile" class=" rounded-full object-cover w-12 h-12 mr-3">
                            @endif
                            <div class="flex justify-between w-full items-center ">
                                <div>
                                    <h1 class="bg-blue-100 w-fit py-0.5 px-1 text-blue-800 rounded text-[10px] font-semibold">
                                        {{$staff->position_staff}}
                                    </h1>
                                    <h1 class="text-l font-semibold py-1">
                                        {{$staff->last_name.' '.$staff->first_name}}
                                    </h1>
                                    <h1 class="text-gray-500 text-[13px]">
                                        {{$staff->email}}
                                    </h1>
                                </div>
                                <div class="text-blue-500 text-[13px]">
                                    {{$staff->phone_num}}
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach

                <span id="dots1"></span><span id="more1" style="display: none">
 {{--                Admin department --}}
                <div class="pb-3 pl-4 text-l leading-tight font-semibold text-blue-800 ">
                    Admin department
                </div>
                {{--                Detail--}}
                    @foreach($staffs as $staff)
                        @if($staff->department === "Admin" )
                            <div class=" flex items-center pb-4 ">
                             <!-- If profile picture exists, display it with the same size -->
                            @if ($staff->profile)
                                    <img src="{{ asset('storage/' . $staff->profile) }}" alt="Profile" class="rounded-full object-cover w-12 h-12 mr-3 ">
                                @else
                                    <!-- Default profile picture -->
                                    <img src="{{ asset('assets/images/user.jpg') }}" alt="Profile" class=" rounded-full object-cover w-12 h-12 mr-3">
                                @endif
                            <div class="flex justify-between w-full items-center ">
                                <div>
                                    <h1 class="bg-blue-100 w-fit py-0.5 px-1 text-blue-800 rounded text-[10px] font-semibold">
                                        {{$staff->position_staff}}
                                    </h1>
                                    <h1 class="text-l font-semibold py-1">
                                        {{$staff->last_name.' '.$staff->first_name}}
                                    </h1>
                                    <h1 class="text-gray-500 text-[13px]">
                                        {{$staff->email}}
                                    </h1>
                                </div>
                                <div class="text-blue-500 text-[13px]">
                                    {{$staff->phone_num}}
                                </div>
                            </div>
                        </div>
                        @endif
                    @endforeach

                    {{--                Labour department --}}
                <div class="pb-3 pl-4 text-l leading-tight font-semibold text-blue-800 ">
                    Labour Department
                </div>
                {{--                Detail--}}
                    @foreach($staffs as $staff)
                        @if($staff->department === "Labour" )
                            <div class=" flex items-center pb-4 ">
                             <!-- If profile picture exists, display it with the same size -->
                            @if ($staff->profile)
                                    <img src="{{ asset('storage/' . $staff->profile) }}" alt="Profile" class="rounded-full object-cover w-12 h-12 mr-3 ">
                                @else
                                    <!-- Default profile picture -->
                                    <img src="{{ asset('assets/images/user.jpg') }}" alt="Profile" class=" rounded-full object-cover w-12 h-12 mr-3">
                                @endif
                            <div class="flex justify-between w-full items-center ">
                                <div>
                                    <h1 class="bg-blue-100 w-fit py-0.5 px-1 text-blue-800 rounded text-[10px] font-semibold">
                                        {{$staff->position_staff}}
                                    </h1>
                                    <h1 class="text-l font-semibold py-1">
                                        {{$staff->last_name.' '.$staff->first_name}}
                                    </h1>
                                    <h1 class="text-gray-500 text-[13px]">
                                        {{$staff->email}}
                                    </h1>
                                </div>
                                <div class="text-blue-500 text-[13px]">
                                    {{$staff->phone_num}}
                                </div>
                            </div>
                        </div>
                        @endif
                    @endforeach

                    {{--                Membership department --}}
                <div class="pb-3 pl-4 text-l leading-tight font-semibold text-blue-800 ">
                    Membership Department
                </div>
                {{--                Detail--}}
                    @foreach($staffs as $staff)
                        @if($staff->department === "Membership" )
                            <div class=" flex items-center pb-4 ">
                                <!-- If profile picture exists, display it with the same size -->
                                @if ($staff->profile)
                                    <img src="{{ asset('storage/' . $staff->profile) }}" alt="Profile" class="rounded-full object-cover w-12 h-12 mr-3 ">
                                @else
                                    <!-- Default profile picture -->
                                    <img src="{{ asset('assets/images/user.jpg') }}" alt="Profile" class=" rounded-full object-cover w-12 h-12 mr-3">
                                @endif
                            <div class="flex justify-between w-full items-center ">
                                <div>
                                    <h1 class="bg-blue-100 w-fit py-0.5 px-1 text-blue-800 rounded text-[10px] font-semibold">
                                        {{$staff->position_staff}}
                                    </h1>
                                    <h1 class="text-l font-semibold py-1">
                                        {{$staff->last_name.' '.$staff->first_name}}
                                    </h1>
                                    <h1 class="text-gray-500 text-[13px]">
                                        {{$staff->email}}
                                    </h1>
                                </div>
                                <div class="text-blue-500 text-[13px]">
                                    {{$staff->phone_num}}
                                </div>
                            </div>
                        </div>
                        @endif
                    @endforeach

                    {{--                PR department --}}
                <div class="pb-3 pl-4 text-l leading-tight font-semibold text-blue-800 ">
                    Public Relation Department
                </div>
                {{--                Detail--}}
                    @foreach($staffs as $staff)
                        @if($staff->department === "PR" )
                            <div class=" flex items-center pb-4 ">
                                 <!-- If profile picture exists, display it with the same size -->
                                @if ($staff->profile)
                                    <img src="{{ asset('storage/' . $staff->profile) }}" alt="Profile" class="rounded-full object-cover w-12 h-12 mr-3 ">
                                @else
                                    <!-- Default profile picture -->
                                    <img src="{{ asset('assets/images/user.jpg') }}" alt="Profile" class=" rounded-full object-cover w-12 h-12 mr-3">
                                @endif
                            <div class="flex justify-between w-full items-center ">
                                <div>
                                    <h1 class="bg-blue-100 w-fit py-0.5 px-1 text-blue-800 rounded text-[10px] font-semibold">
                                        {{$staff->position_staff}}
                                    </h1>
                                    <h1 class="text-l font-semibold py-1">
                                        {{$staff->last_name.' '.$staff->first_name}}
                                    </h1>
                                    <h1 class="text-gray-500 text-[13px]">
                                        {{$staff->email}}
                                    </h1>
                                </div>
                                <div class="text-blue-500 text-[13px]">
                                    {{$staff->phone_num}}
                                </div>
                            </div>
                        </div>
                        @endif
                    @endforeach

                    {{--                IT department --}}
                <div class="pb-3 pl-4 text-l leading-tight font-semibold text-blue-800 ">
                    Information Technology Department
                </div>
                {{--                Detail--}}
                    @foreach($staffs as $staff)
                        @if($staff->department === "IT" )
                            <div class=" flex items-center pb-4 ">
                            <!-- If profile picture exists, display it with the same size -->
                            @if ($staff->profile)
                                    <img src="{{ asset('storage/' . $staff->profile) }}" alt="Profile" class="rounded-full object-cover w-12 h-12 mr-3 ">
                                @else
                                    <!-- Default profile picture -->
                                    <img src="{{ asset('assets/images/user.jpg') }}" alt="Profile" class=" rounded-full object-cover w-12 h-12 mr-3">
                                @endif
                            <div class="flex justify-between w-full items-center ">
                                <div>
                                    <h1 class="bg-blue-100 w-fit py-0.5 px-1 text-blue-800 rounded text-[10px] font-semibold">
                                        {{$staff->position_staff}}
                                    </h1>
                                    <h1 class="text-l font-semibold py-1">
                                        {{$staff->last_name.' '.$staff->first_name}}
                                    </h1>
                                    <h1 class="text-gray-500 text-[13px]">
                                        {{$staff->email}}
                                    </h1>
                                </div>
                                <div class="text-blue-500 text-[13px]">
                                    {{$staff->phone_num}}
                                </div>
                            </div>
                        </div>
                        @endif
                    @endforeach
                </span>
            </div>
            <button onclick="readMore1()" id="myBtn1">Read more</button>
        </div>
    </div>
</div>

