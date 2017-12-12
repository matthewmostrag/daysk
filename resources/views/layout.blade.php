<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Daysk</title>

    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
</head>
<body>
    <div class="container">
        @if (Route::has('login'))
            {{-- Do something --}}
        @endif

        @include('partials.navigation')

        <div class="content">
            @yield('content')
        </div>
    </div>

    @section('javascripts')
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="/js/datepicker/datepicker.min.js"></script>
        <script type="text/javascript" src="/js/datepicker/i18n/datepicker.en.js"></script>
        <script type="text/javascript" src="/js/datepicker/i18n/datepicker.fr.js"></script>
    @show
</body>
</html>
