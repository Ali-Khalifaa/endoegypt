<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    {{-- add meta language --}}
    <meta name="language" content="{{ str_replace('_', '-', app()->getLocale()) }}">
    <title>{{env("APP_NAME")}} | @yield('pageTitle')</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="/website/images/fav.png">

    @if (app()->getLocale() == 'ar')
            <link rel="stylesheet" href="/website/StyleRTL.css">
        @else
            <link rel="stylesheet" href="/website/allStyle.css">
    @endif


    @stack("headStyle")
</head>
