<form action="{{ route('upload.profile') }}" method="POST" enctype="multipart/form-data" >
@csrf
    <div class="flex justify-center ml-32 -mb-3 lg:-mb-5 md:-mb-5 ">
        <!-- Button to trigger modal -->
        <button type="button" class="btn border rounded-full w-8 h-8 bg-white overflow-hidden shadow-md shadow-zinc-600" data-bs-toggle="modal" data-bs-target="#exampleModal">
            <i class="fa fa-pencil flex justify-center"></i>
        </button>
    </div>
    <div class="flex justify-center">
        <!-- Image container with default size -->
        <div class="image-container rounded-full object-cover w-44 h-44 sm:w-32 sm:h-32 lg:mb-5 mb-4">
            <!-- If profile picture exists, display it with the same size -->
            @if (Auth::user()->profile)
                <img src="{{ asset('storage/' . Auth::user()->profile) }}" alt="Profile" class="rounded-full object-cover w-full h-full">
            @else
                <!-- Default profile picture -->
                <img src="{{ asset('assets/images/user.jpg') }}" alt="Profile" class="rounded-full object-cover w-full h-full">
            @endif
        </div>
    </div>
    <!-- Hidden input file field -->
{{--    <input type="file" id="file" name="profile" class="hidden"/>--}}
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered"> <!-- Changed class to modal-dialog-centered -->
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Choose Your Profile Picture</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Modal content goes here -->
                    <input type="file" id="file" name="profile" class="w-full border border-black"/>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-gray-200 hover:bg-blue-200" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn bg-gray-200 hover:bg-blue-200">Save changes</button>
                </div>
            </div>
        </div>
    </div>


        {{--</div>--}}
        <div class="flex text-center justify-center text-[#151B54] font-semibold text-2xl ">
            {{ Auth::user()->last_name.' '.Auth::user()->first_name }}
        </div>
        <div class="flex justify-center text-gray-500 text-l text-center">
            {{ Auth::user()->position_staff}}
        </div>
        <hr class="border-[1px] my-3 ">
        <div class="text-xl font-semibold text-[#4863A0] pb-4 underline" >
            Contact Information
        </div>
        <div class="text-[#2B547E] ">
            Email Address:
        </div>
        <div class="pb-3">
            {{Auth::user()->email}}
        </div>
        <div class="text-[#2B547E] ">
            Phone Number:
        </div>
        <div class="pb-3">
            {{Auth::user()->phone_num}}
        </div>
        <div class="text-[#2B547E] ">
            Department:
        </div>
        <div class="pb-3">
            {{Auth::user()->department}}
        </div>
        <div class="text-[#2B547E] ">
            Address:
        </div>
        <div class="pb-3">
            {{Auth::user()->address}}
        </div>
        <div class="text-[#2B547E] ">
            Leave Days Left:
        </div>
        <div class="pb-3">
            {{Auth::user()->av_leave}}
        </div>
</form>
