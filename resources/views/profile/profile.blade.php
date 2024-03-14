
<x-app-layout>

    {{--        header--}}
    <div class="py-7">
        <div class="max-w-7xl mx-auto sm:px-8 lg:px-10">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg ">
                <div class="px-6 pt-3 text-xl leading-tight font-semibold">
                    {{ __("Profile") }}
                </div>
                <div class="px-9 pt-3 pb-3 text-l leading-tight ">
                    <a href="/home">
                        Home
                    </a>
                    > Profile
                </div>
            </div>
        </div>
    </div>

    <div class="lg:flex col-lg-12 sm:px-6 lg:px-8">
        <div class="col-lg-4 ">
            <div class="container apply-form max-w-7xl mx-auto lg:pb-20 pb-10 " >
                <div class="card contact-support">
                    <div class="card-body lg:-mx-10 md:-mx-10 justify-center pb-10 ">
                        @include('profile.my_contact_info')
                    </div>
                </div>
            </div>
        </div>


        <div class="col-lg-8 ">
            <div class="container apply-form max-w-7xl mx-auto lg:pb-20 pb-10 " >
                <div class="card contact-support">
                    <div class="card-body -mt-14 lg:-mx-16 ">
                        <div class="tab flex border-b border-blue-500 ">
                            <div class="dropdown lg:w-[23%] md:w-[23%] sm:w-[23%] w-[46%] hover:bg-[#DBE9FA] "  >
                                <button type="button" class="dropbtn flex justify-center " >
                                    <h1 class="font-semibold">Leave Record</h1>
                                    <span class=" pt-1 ml-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                             class="bi bi-chevron-down w-3 h-3" viewBox="0 0 16 16 ">
                                            <path d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                                        </svg>
                                    </span>
                                </button>
                                <div class="dropdown-content">
                                    <button type="button" class="tablinks " onclick="openTab(event, 'tab1_1')">All Record</button>
                                    <button type="button" class="tablinks" onclick="openTab(event, 'tab1_2')">Pending Record</button>
                                    <button type="button" class="tablinks" onclick="openTab(event, 'tab1_3')">Approved Record</button>
                                    <button type="button" class="tablinks" onclick="openTab(event, 'tab1_4')">Rejected Record</button>
                                </div>
                            </div>
                            <div class="lg:w-[15%] md:w-[15%] sm:w-[15%] w-[30%] flex justify-center">
                                <button type="button" class="tablinks w-full second-button font-semibold" onclick="openTab(event, 'tab2')">Setting</button>
                            </div>
                        </div>

                        <div id="tab1_1" class="tabcontent ">
                            <h1 class="text-xl font-semibold text-[#4863A0] pb-4 ">
                                All Record
                            </h1>
                            @include('profile.leave_record')
                        </div>

                        <div id="tab1_2" class="tabcontent">
                            <h1 class="text-xl font-semibold text-[#4863A0] pb-4 ">
                                Pending Record
                            </h1>
                            @include('.profile.leave_record',['leaves' => $pending_leaves])
                        </div>
                        <div id="tab1_3" class="tabcontent">
                            <h1 class="text-xl font-semibold text-[#4863A0] pb-4 ">
                                Approved Record
                            </h1>
                            @include('.profile.leave_record',['leaves' => $approved_leaves])
                        </div>
                        <div id="tab1_4" class="tabcontent">
                            <h1 class="text-xl font-semibold text-[#4863A0] pb-4 ">
                                Rejected Record
                            </h1>
                            @include('.profile.leave_record',['leaves' => $rejected_leaves])
                        </div>

                        <div id="tab2" class="tabcontent">
                         @include('profile.setting.update_password')
                         @include('profile.setting.update_info')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<script>
    // Check if there is a success message in the session
    @if(session('success'))
    showSuccessAlert('Edit Staff Information successfully!');
    @endif
    @if(session('error'))
    showErrorAlert('Failed to Change Staff Information!');
    @endif
    @if(session('file_error'))
    showErrorAlert('File size exceeds the maximum allowed limit of 2MB!');
    @endif

</script>
