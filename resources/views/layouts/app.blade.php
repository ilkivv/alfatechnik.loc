<!DOCTYPE html>
<html lang="ru">
<head>
    <title>Альфа.ру - @yield('title')</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
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

</body>

</html>