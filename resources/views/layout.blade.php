<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

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
</body>
</html>
