@extends('layouts.app')

@section('title')

@stop

@section('description')

@stop

@section('styles')

    <link rel="stylesheet" type="text/css" href="/styles/bootstrap4/bootstrap.min.css">
    <link href="/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="/styles/cart_styles.css">
    <link rel="stylesheet" type="text/css" href="/styles/cart_responsive.css">
@stop

@section('content')

    <div class="cart_section">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="cart_container j-cart_container">
                        @include('components.cart_block')
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('components.newsletter')

@stop

@section('scripts')

    <script src="/js/jquery-3.3.1.min.js"></script>
    <script src="/styles/bootstrap4/popper.js"></script>
    <script src="/styles/bootstrap4/bootstrap.min.js"></script>
    <script src="/plugins/greensock/TweenMax.min.js"></script>
    <script src="/plugins/greensock/TimelineMax.min.js"></script>
    <script src="/plugins/scrollmagic/ScrollMagic.min.js"></script>
    <script src="/plugins/greensock/animation.gsap.min.js"></script>
    <script src="/plugins/greensock/ScrollToPlugin.min.js"></script>
    <script src="/plugins/easing/easing.js"></script>
    <script src="/js/cart_custom.js"></script>
    <script src="/js/product_custom.js"></script>

@stop