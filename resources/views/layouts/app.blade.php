<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('layouts.head')
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')
            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
{{--        datepicker--}}
        <script src="{{ asset('js/datePicker.js') }}"></script>
        <script src="{{ asset('js/table.js') }}"></script>


        {{--    table--}}
        {{--    js--}}
{{--        <script src="https://code.jquery.com/jquery-3.7.1.js"></script>--}}
{{--        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>--}}
{{--        <script src="https://cdn.datatables.net/2.0.0/js/dataTables.js"></script>--}}
{{--        <script src="https://cdn.datatables.net/2.0.0/js/dataTables.bootstrap5.js"></script>--}}
    </body>
    <script src="{{ asset('js/table.js') }}"></script>
    <!-- DataTables JS -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>

</html>
