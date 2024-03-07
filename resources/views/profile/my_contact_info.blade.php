<div class="flex justify-center">
    <img src=" {{ asset ('assets/images/user.jpg') }}" alt=" Profile"
         class= 'rounded-full object-cover w-44 h-44 sm:w-32 sm:h-32 lg:mb-7 mb-4'/>
</div>
<div class="flex text-center justify-center text-[#151B54] font-semibold text-2xl ">
    {{ Auth::user()->last_name.' '.Auth::user()->first_name }}
</div>
<div class="flex justify-center text-gray-500 text-l text-center">
    {{ Auth::user()->department}}
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
    Position:
</div>
<div class="pb-3">
    {{Auth::user()->position_staff}}
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
