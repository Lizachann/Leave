<ol class="relative border-l border-gray-900 ">
    <li class="mb-10 ms-6">
        @foreach($leaves as $leave)
            <a class="absolute flex items-center justify-center w-10 h-10 bg-blue-300 rounded-full -start-5 ring-8 ring-white" href="{{ route($goto, ['id' => $leave->id]) }}">
                <svg class="w-4 h-4 text-blue-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                </svg>
            </a>
            <h3 class="flex items-center text-lg pt-1 font-semibold ml-5 ">
                {{ \Carbon\Carbon::parse($leave->created_at)->format('d M Y') }}
            </h3>
            <h3 class="flex items-center text-md pt-1 font-semibold text-blue-900 ml-5 mb-2">
                {{$leave->request_days}} Days
            </h3>
            <h3 class="block  text-sm font-normal leading-none text-gray-400 ml-5 mb-2">
                {{$leave->leave_type}}
            </h3>
            <p class=" text-md font-normal text-gray-700 ml-5 mb-2">
                From
                <label class="font-semibold">
                    {{ \Carbon\Carbon::parse($leave->from_date)->format('d M Y') }}
                </label>
                To
                <label class="font-semibold">
                    {{ \Carbon\Carbon::parse($leave->to_date)->format('d M Y') }}
                </label>
            </p>
            @if($leave->admin_remark === 0 )
                <h3 class="block text-blue-800 text-sm font-semibold leading-none ml-5 mb-10">
                    Pending
                </h3>
            @elseif($leave->admin_remark === 1 )
                <h3 class="block text-green-600 text-sm font-semibold leading-none ml-5 mb-10">
                    Approved
                </h3>
            @elseif($leave->admin_remark === 2 )
                <h3 class="block text-red-600 text-sm font-semibold leading-none ml-5 mb-10">
                    Rejected
                </h3>
            @endif
        @endforeach
    </li>
</ol>
