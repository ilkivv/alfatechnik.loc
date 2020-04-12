<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>Альфа.ру - @yield('title')</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="description" content="@yield('description')">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @yield('styles')

</head>

<body>

<div class="super_container">

    <!-- Header -->
@include('components.header')

<!-- Content -->

@yield('content')

<!-- Footer -->

@include('components.footer')

<!-- Copyright -->
@include('components.copyright')

</div>

@yield('scripts')

@include('components.scripts')
</body>

</html>