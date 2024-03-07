<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
{{--    <link rel="preconnect" href="https://fonts.bunny.net">--}}
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- bootstrap -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
    <!-- jQuery 3 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- JS of treeview -->
    <script src="{{ asset('js/sidebar.js') }}"></script>
    <script src="{{ asset('js/table.js') }}"></script>
    <script src="{{ asset('js/tab_content.js') }}"></script>





    <!-- css  -->
    <link href="{{ asset('css/sidebar.css') }}" rel="stylesheet">
    <link href="{{ asset('css/applyleave.css') }}" rel="stylesheet">
    <link href="{{ asset('css/table.css') }}" rel="stylesheet">
    <link href="{{ asset('css/datePicker.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
    <link href="{{ asset('css/tab_content.css') }}" rel="stylesheet">






    {{--    flowbite--}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />



{{--    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet" type="text/css" />--}}
{{--    <link href="https://cdn.rawgit.com/mdehoog/Semantic-UI/6e6d051d47b598ebab05857545f242caf2b4b48c/dist/semantic.min.css" rel="stylesheet" type="text/css" />--}}
{{--    <script src="https://code.jquery.com/jquery-2.1.4.js"></script>--}}
{{--    <script src="https://cdn.rawgit.com/mdehoog/Semantic-UI/6e6d051d47b598ebab05857545f242caf2b4b48c/dist/semantic.min.js"></script>--}}

{{--    datepicker--}}
{{--    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">--}}
{{--    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>--}}
{{--    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>



    <!-- jQuery -->
{{--    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>--}}

    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">


{{-- table   css--}}
{{--    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.0/css/dataTables.bootstrap5.css">--}}
{{--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">--}}



    {{--    <!-- Scripts -->--}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script>
        function showAlert() {
            alert('Form submitted!');
            console.log('showAlert function called');


        }
    </script>



</head>
