@extends('layouts.master')
@section('title', "Today's Token")

@section('content')
    <!-- ========================== Page Content ==================================== -->
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Today's Token</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('student.dashboard') }}">Dashboard </a></li>
                                <li class="breadcrumb-item active" style="color: #74788d;">Today's Token</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-xl-12">
                    
                    <div class="row" id="deviceStandard" style="margin-top:-40px;">
                        <div class="col-md-4"></div>
                        <div class="col-md-4" style="text-align: center !important;">
                            <div class="alert alert-warning fade show mb-0" style="font-weight:600;" role="alert">
                                <i class="bx bx-timer bx-tada me-2 font-size-15" style="position: relative; top: 2px !important;"></i>
                                <span class="timer"></span>
                            </div>
                        </div>
                        <div class="col-md-4"></div>
                    </div>

                    <br><br>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    
                    @if(count($errors) > 0)
                        <div class="alert alert-dismissible fade show color-box bg-danger bg-gradient p-4" role="alert">
                            <x-jet-validation-errors class="mb-4 my-2 text-white" />
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                        
                </div>
            </div>

            <?php
                date_default_timezone_set("Asia/Dhaka");
                $time = date('H:i:s');
                $timestamp = strtotime($time);

                $current = idate('H', $timestamp);

                $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $pin = $characters[rand(0, 2)];
                $confirmation_code = str_shuffle($pin);
            ?>

            <div class="row">
                <div class="col-lg-12">
                    @if(is_null($check_today))
                        <div class="card border border-danger">
                            <div class="card-body">
                                <div class="alert alert-dismissible alert-danger {{-- bg-info bg-gradient text-white --}}" style="text-align: center; margin-bottom: 30px;padding: 4px;" role="alert">
                        
                                    <marquee direction="left" style="font-weight: 410;margin-top: 5px;font-size: 14.5px;"><span style="color: #343a40!important"><i class="bx bx-bell bx-tada" style="position: relative; top: 1.5px;"></i> Notification:</span> <span class="badge bg-danger rounded-pill" style="position: relative; top: -1.5px;">1</span> You didn't buy any token of today. </marquee>
                                    <button type="button" class="btn-close text-white" data-bs-dismiss="alert" aria-label="Close"></button>
                                    
                                </div>

                                <div class="alert alert-dismissible fade show color-box bg-danger bg-gradient p-4" role="alert">
                                    <div class="mb-4 my-2 text-white">
                                        <div class="font-medium text-red-600">Whoops! You don't have any token available today.</div>

                                        <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                                            <li>You didn't buy any token of today.</li>
                                            <li><b><a href="{{ route('buy.token') }}">Click here to buy</a></b> tomorrow's token.</li>
                                        </ul>
                                    </div>                                                   
                                </div>
                            </div>
                        </div>
                    @else

                        <div class="card border border-warning">
                                <div class="card-body">

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3 position-relative">
                                                <label for="validationTooltip01" class="form-label" style="font-size: 16px;">
                                                    
                                                    <span class="text-warning">
                                                        @if($check_today->lunch && $check_today->dinner) Lunch & Dinner @elseif($check_today->lunch) Lunch Token @elseif($check_today->dinner) Dinner Token @endif
                                                    </span> @if($check_today->lunch && $check_today->dinner) both are collected. @elseif($check_today->lunch) is collected. @elseif($check_today->dinner) is collected. @endif

                                                    <br>
                                                    <h5 class="card-title mt-2"><span style="font-weight: 400;">For</span> Today : <span class="text-warning" style="font-weight: 510;">{{ date('d F, Y') }}</span></h5>
                                                </label>
                                            </div>
                                        </div>

                                        @if($check_today->lunch)
                                            <div class="col-6 col-md-2">
                                                <div class="card bg-secondary bg-gradient text-white-50">
                                                    <div class="card-body">
                                                        <h5 class="mt-0 mb-2 text-white"><i class="mdi mdi-check-all me-3"></i> Lunch</h5>
                                                        <h6 class="text-white">Token: <b style="font-family: sans-serif;">@foreach($lunch_ids as $key => $lunch_id) {{ $key+1 .'-'. $check_today->lunch }} @endforeach</b></h6>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        
                                        @if($check_today->dinner)
                                            <div class="col-6 col-md-2">
                                                <div class="card bg-info bg-gradient text-white-50">
                                                    <div class="card-body">
                                                        <h5 class="mt-0 mb-2 text-white"><i class="mdi mdi-check-all me-3"></i> Dinner</h5>
                                                        <h6 class="text-white">Token: <b style="font-family: sans-serif;">@foreach($dinner_ids as $key => $dinner_id) {{ $key+1 .'-'.$check_today->dinner }} @endforeach</b></h6>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </div>

                                </div>
                                <!-- end card body -->

                                @if($check_today->lunch || $check_today->dinner)
                                    <div class="card-footer">
                                        <a href="{{ route('today.token', ['download'=>'pdf']) }}" target="_blank" style="width: 100%;" class="btn btn-warning btn-label waves-effect waves-light"><i class="bx bxs-download label-icon"></i> Download as PDF <i class="bx bx-right-arrow-circle bx-fade-right font-size-20 align-middle me-1"></i></a>
                                    </div>
                                @endif
                        </div>

                    @endif
                    <!-- end card -->
                </div>
                <!-- end col -->
            </div>
            
        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->                
                
@endsection


@section('styles')
    <style type="text/css">
        .spinner-grow {
            animation: 0.9s linear infinite spinner-grow !important;
        }

        @media screen and (max-width: 1199px) and (min-width: 300px) {
            #deviceStandard{
                margin-top: 5px !important;
            }

            #marBot{
                margin-top: 12px !important;
            }
        }
    </style>
@endsection

@section('scripts')
    <script type="text/javascript">
        window.onload = displayClock();
        
        function displayClock(){
            var display = new Date().toLocaleTimeString();
            $('.timer').text(display);
            setTimeout(displayClock, 1000); 
        }
    </script>
@endsection