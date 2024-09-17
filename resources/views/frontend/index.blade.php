@extends('layouts.frontend-master')

@section('title', 'Home Page')

@section('content')
        
    <section class="section hero-section bg-ico-hero" id="home" style="padding-top: 150px; padding-bottom: 100px;">
        <div class="nav-back-custom"></div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5">
                    <div class="text-white-50">
                        <h1 class="text-white font-weight-semibold mb-3 hero-title">{{ config('app.name') }} - Online Application</h1>
                        <p class="font-size-14" style="color: #ddd !important;">The purpose of the application is to decrease the hassales of the students of MBSTU while purchasing their lunch or dinner food tokens. It's a complete solution to buy hall's food token in online. The platform is built to digitilize the purchasing system of food tokens of the halls. </p>
                        
                        <div class="button-items mt-4">
                            @if(Auth::user())
                                <a href="@if(Auth::user()->hasRole('Administrator')) {{ route('administrator.dashboard') }} @elseif(Auth::user()->hasRole('Student')) {{ route('student.dashboard') }} @endif" class="btn btn-success w-xs">Your Dashboard</a>
                                <a href="{{-- {{ route('frontend.about') }} --}}" class="btn btn-light">About Us</a>
                            @else
                                <a href="{{ route('login') }}" class="btn btn-success w-xs">Sign In</a>
                                <a href="{{ route('register') }}" class="btn btn-primary w-xs">Sign Up</a>
                            @endif

                        </div>
                    </div>
                </div>

                {{-- <div class="col-lg-6 col-md-10 col-sm-12 ms-lg-auto">
                    <div class="card overflow-hidden mb-0 mt-5 mt-lg-0">
                        
                            <iframe width="546" height="375" src="https://www.youtube.com/embed/bxoYtCfIBXQ" frameborder="0" title="YouTube video describing the WineText service" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>
                        
                    </div>
                </div> --}}
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </section>

    <section class="section bg-white" id="news" style="padding-top:30px !important;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center">
                        <h4>How it works?</h4>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <div class="row">
                <div class="col-12 col-lg-12">
                    <p class="card-title-desc font-size-14">
                        At first, residential or non-residential students will have to login to the application. They will have either Room & Seat No. or Student ID as credentials. Then after login they can be able to purchase food token for tomorrow. Besides, they can be able to check their already bought today's token and download the token stats as a pdf. Hall management will be able to check all the purchased tokens particularly for lunch and dinner of a day. And they can download the list also.
                    </p>

                </div>
            </div>

            <div class="row">
                <div class="col-lg-3"></div>

                <div class="col-lg-6 col-md-10 col-sm-12 ms-lg-auto">
                    <div class="card overflow-hidden mb-0 mt-5 mt-lg-0">
                        
                            <iframe width="546" height="375" src="https://www.youtube.com/embed/GIt7AL1_nvc" frameborder="0" title="YouTube video describing the WineText service" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>
                        
                    </div>
                </div>

                <div class="col-lg-3"></div>
            </div>

            {{-- <div class="row">
                <div class="col-md-12" style="text-align: center; margin-top: 25px;">
                    <a href="" class="btn btn-success"> Show All <i class="bx bx-right-arrow-circle font-size-20 align-middle me-1"></i></a>
                </div>
            </div> --}}
            <!-- end row -->
        </div>
        <!-- end container -->
    </section>


    <section class="section" id="news" style="padding-top:30px !important;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center">
                        <h4>Advertisement Section</h4>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <div class="row">
                <div class="col-md-12" style="text-align: center; margin-top: 25px;">
                    <a href="" class="btn btn-success" style="width: 50%;"><i class="bx bx-hourglass bx-tada font-size-18 align-middle me-2"></i> Button Here <i class="bx bx-right-arrow-circle bx-fade-right font-size-20 align-middle me-1"></i></a>
                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </section>


@endsection

@section('scripts')
    
    <script>
        $(document).ready(function() {
            $(".select2").select2({
                allowClear: true,
            });
        });
    </script>

    <script type="text/javascript">
        $('.owl-carousel').owlCarousel({
            margin:10,
            loop:true,
            autoWidth:true,
            items:4,
            rtl:false,
        });
    </script>
    
@endsection