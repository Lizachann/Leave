<x-app-layout class="bg-gray-100">
    {{--        header--}}
    <div class="py-10">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg py-5 flex items-center ">

                <img src=" {{ asset ('assets/images/welcome.png') }}" alt=" Profile"
                     class=' object-cover lg:w-[25%] w-[50%] h-full  '/>
                <div class="items-center w-full">
                    <div class="pl-[10%] pb-[2%] lg:text-2xl text-xl leading-tight font-semibold">
                        Welcome Back
                    </div>
                    <div class="pl-[10%] lg:text-4xl text-2xl text-blue-800 leading-tight font-semibold">
                        <a href="{{route('profile')}}">
                            {{ Auth::user()->last_name.' '.Auth::user()->first_name }},
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>

{{--    @include('hod.homepage.dashboard')--}}

    <div class="flex justify-center lg:px-40 ">
            <div class="container apply-form max-w-7xl mx-auto  ">
                <div class="card contact-support  ">
                    <div class="card-body -mt-14 -mx-5">
                        <div class=" py-4 text-xl leading-tight font-semibold">
                            {{ __("My Leave History") }}
                        </div>
                        <div id="chart_div3" class=""></div>
                    </div>
                </div>
            </div>
        </div>

    @include('staff.homepage.contact')


</x-app-layout>
<script>
    var leaveCount = {{ $leaveCount }};
    var countPending = {{ $countPending }};
    var countApproved = {{ $countApproved }};
    var countRejected = {{ $countRejected }};
</script>
