<x-app-layout>

    {{--        header--}}
    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg -mt-5">
                <div class="px-6 pt-3 text-xl leading-tight font-semibold">
                    Staff Information
                </div>
                <div class="px-9 pt-3 pb-3 text-l leading-tight ">
                    <a href="/home">
                        Home
                    </a>
                    >
                    <a href="/admin/manage/staff">
                        All Staff
                    </a>
                </div>
            </div>
        </div>
    </div>

    @include('admin.manage_staff.edit_staff_info')

    @include('admin.manage_staff.edit_password')

</x-app-layout>

<script>
    // Check if there is a success message in the session
    @if(session('success'))
    showSuccessAlert('Edit Staff Information successfully!');
    @endif
    @if(session('error'))
    showErrorAlert('Failed to Change Staff Information!');
    @endif

</script>
