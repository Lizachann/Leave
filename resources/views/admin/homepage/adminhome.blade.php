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

    @include('admin.homepage.dashboard')

    <div class="lg:flex col-lg-12  ">
        <div class="container apply-form max-w-7xl mx-auto ">
            <div class="card contact-support  ">
                <div class="card-body -mt-14 -mx-5">
                    <div class=" py-4 text-xl leading-tight font-semibold">
                        {{ __("Staff Leave History") }}
                    </div>
                    <div id="chart_div4"></div>
                </div>
            </div>
        </div>
        <div class="container apply-form max-w-7xl mx-auto lg:pb-20 pb-10 lg:mt-0 mt-10">
            <div class="card contact-support">
                <div class="card-body -mt-14 -mx-5 ">
                    <div class=" py-4 text-xl leading-tight font-semibold">
                        {{ __("All Staff By Department") }}
                    </div>
                    <div id="chart_div5"></div>
                </div>
            </div>
        </div>
    </div>

    @include('admin.homepage.contact')


</x-app-layout>
<script>
    var leaveCount = {{ $leaveCount }};
    var countPending = {{ $countPending }};
    var countApproved = {{ $countApproved }};
    var countRejected = {{ $countRejected }};
    var admin = {{$admin}};
    var pr = {{$pr}};
    var it = {{$it}};
    var labour = {{$labour}};
    var membership = {{$membership}};
    var finance = {{$finance}};
</script>
