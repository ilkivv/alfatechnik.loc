@extends('layouts.app')

@section('title')
    Запчасти для смартфонов, планшетов и ноутбуков
@stop

@section('description')

@stop

@section('styles')

    <link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
    <link href="plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
    <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
    <link rel="stylesheet" type="text/css" href="plugins/slick-1.8.0/slick.css">
    <link rel="stylesheet" type="text/css" href="styles/main_styles.css">
    <link rel="stylesheet" type="text/css" href="styles/responsive.css">

@stop

@section('content')

    <!-- Banner -->

    @include('components.banner')

    <!-- Characteristics -->

    @include('components.characteristics')

    <!-- Deals of the week -->

    @include('components.deals_featured')

    <!-- Popular Categories -->

    @include('components.popular_categories')

    <!-- Banner -->

    @include('components.banner_2')

    <!-- Hot New Arrivals -->

    @include('components.new_arrivals')

    <!-- Best Sellers -->

    @include('components.best_sellers')

    <!-- Adverts -->

    @include('components.adverts')

    <!-- Trends -->

    @include('components.trends')

    <!-- Reviews -->

    @include('components.reviews')

    <!-- Recently Viewed -->

    @include('components.viewed')

    <!-- Brands -->

    @include('components.brands')

    <!-- Newsletter -->

    @include('components.newsletter')

@stop



@section('scripts')

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="styles/bootstrap4/popper.js"></script>
    <script src="styles/bootstrap4/bootstrap.min.js"></script>
    <script src="plugins/greensock/TweenMax.min.js"></script>
    <script src="plugins/greensock/TimelineMax.min.js"></script>
    <script src="plugins/scrollmagic/ScrollMagic.min.js"></script>
    <script src="plugins/greensock/animation.gsap.min.js"></script>
    <script src="plugins/greensock/ScrollToPlugin.min.js"></script>
    <script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
    <script src="plugins/slick-1.8.0/slick.js"></script>
    <script src="plugins/easing/easing.js"></script>
    <script src="js/custom.js"></script>

@stop