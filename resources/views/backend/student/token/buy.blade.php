@extends('layouts.master')
@section('title', 'Buy Token')

@section('content')
    <!-- ========================== Page Content ==================================== -->
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Buy Token</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('student.dashboard') }}">Dashboard </a></li>
                                <li class="breadcrumb-item active" style="color: #74788d;">Buy Token</li>
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
                    @if($current > 12 && $current < 16)
                        @if(is_null($check_tomorrow))
                            <form class="needs-validation" action="{{ route('store.token') }}" method="post" novalidate="">
                                @csrf
                                <div class="card border border-success">
                                    <div class="card-body">

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3 position-relative">
                                                    <label for="validationTooltip01" class="form-label" style="font-size: 16px;">
                                                        
                                                        Which token you want to buy now?                                
                                                        <br>
                                                        <h5 class="card-title mt-2"><span style="font-weight: 400;">For</span> Tomorrow : <span class="text-success" style="font-weight: 510;">{{ date('d F, Y', strtotime(' +1 day')) }}</span></h5>
                                                    </label>
                                                </div>
                                            </div>

                                            
                                                <div class="col-md-6">
                                                    <div class="mb-3 position-relative">
                                                            <div class="form-check form-radio-success mb-3" style="font-size: 17px;">
                                                                <input class="form-check-input" type="checkbox" id="formCheckcolor2" name="token_type[]" value="Lunch">
                                                                <label class="form-check-label" for="formCheckcolor2">
                                                                    Lunch
                                                                </label>
                                                            </div>
                                                        

                                                            <div class="form-check form-radio-success mb-3" style="font-size: 17px;">
                                                                <input class="form-check-input" type="checkbox" id="formCheckcolor3" name="token_type[]" value="Dinner">
                                                                <label class="form-check-label" for="formCheckcolor3">
                                                                    Dinner
                                                                </label>
                                                            </div>
                                                        
                                                    </div>
                                                </div>
                                                                              
                                        </div>

                                    </div>
                                    <!-- end card body -->

                                    <div class="card-footer">
                                        <button type="submit" style="width: 100%;" class="btn btn-success btn-label waves-effect waves-light"><i class="bx bx-money label-icon"></i> Buy Now & Collect Your Token <i class="bx bx-right-arrow-circle bx-fade-right font-size-20 align-middle me-1"></i></button>
                                    </div>
                                </div>
                            </form>
                        @else

                            <form class="needs-validation" action="{{ route('update.token') }}" method="post" novalidate="">
                                @csrf

                                <input type="hidden" name="token_id" value="{{ $check_tomorrow->id }}">
                                <div class="card border border-success">
                                    <div class="card-body">

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3 position-relative">
                                                    <label for="validationTooltip01" class="form-label" style="font-size: 16px;">
                                                        
                                                        <span class="text-success">@if($check_tomorrow->lunch && $check_tomorrow->dinner) Lunch & Dinner @elseif($check_tomorrow->lunch) Lunch Token @elseif($check_tomorrow->dinner) Dinner Token @endif</span> @if($check_tomorrow->lunch && $check_tomorrow->dinner) both are already collected. @elseif($check_tomorrow->lunch) is already collected! Collect Dinner now. @elseif($check_tomorrow->dinner) is already collected! Collect Lunch now. @endif                            
                                                        <br>
                                                        <h5 class="card-title mt-2"><span style="font-weight: 400;">For</span> Tomorrow : <span class="text-success" style="font-weight: 510;">{{ date('d F, Y', strtotime(' +1 day')) }}</span></h5>
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="col-md-2">
                                                <div class="mb-3 position-relative">
                                                    @if($check_tomorrow->lunch == '')
                                                        <div class="form-check form-radio-success mb-3" style="font-size: 17px;">
                                                            <input class="form-check-input" type="checkbox" id="formCheckcolor2" name="token_type[]" value="Lunch">
                                                            <label class="form-check-label" for="formCheckcolor2">
                                                                Lunch
                                                            </label>
                                                        </div>
                                                    @endif
                                                    
                                                    @if($check_tomorrow->dinner == '')
                                                        <div class="form-check form-radio-success mb-3" style="font-size: 17px;">
                                                            <input class="form-check-input" type="checkbox" id="formCheckcolor3" name="token_type[]" value="Dinner">
                                                            <label class="form-check-label" for="formCheckcolor3">
                                                                Dinner
                                                            </label>
                                                        </div>
                                                    @endif
                                                    
                                                </div>
                                            </div>

                                            @if($check_tomorrow->lunch)
                                                <div class="col-6 col-md-2">
                                                    <div class="card bg-secondary bg-gradient text-white-50">
                                                        <div class="card-body">
                                                            <h5 class="mt-0 mb-2 text-white"><i class="mdi mdi-check-all me-3"></i> Lunch</h5>
                                                            <h6 class="text-white">Token: <b style="font-family: sans-serif;">{{ $check_tomorrow->id.'-'.$check_tomorrow->lunch }}</b></h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                            
                                            @if($check_tomorrow->dinner)
                                                <div class="col-6 col-md-2">
                                                    <div class="card bg-info bg-gradient text-white-50">
                                                        <div class="card-body">
                                                            <h5 class="mt-0 mb-2 text-white"><i class="mdi mdi-check-all me-3"></i> Dinner</h5>
                                                            <h6 class="text-white">Token: <b style="font-family: sans-serif;">{{ $check_tomorrow->id.'-'.$check_tomorrow->dinner }}</b></h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>

                                    </div>
                                    <!-- end card body -->
                                    @if($check_tomorrow->lunch == '' || $check_tomorrow->dinner == '')
                                        <div class="card-footer">
                                            <button type="submit" style="width: 100%;" class="btn btn-success btn-label waves-effect waves-light"><i class="bx bx-money label-icon"></i> Buy Now & Collect Your Token <i class="bx bx-right-arrow-circle bx-fade-right font-size-20 align-middle me-1"></i></button>
                                        </div>
                                    @endif
                                </div>
                            </form>
                        @endif
                    @else
                        <div class="card border border-danger">
                            <div class="card-body">
                                <div class="alert alert-dismissible alert-danger {{-- bg-info bg-gradient text-white --}}" style="text-align: center; margin-bottom: 30px;padding: 4px;" role="alert">
                        
                                    <marquee direction="left" style="font-weight: 410;margin-top: 5px;font-size: 14.5px;"><span style="color: #343a40!important"><i class="bx bx-bell bx-tada" style="position: relative; top: 1.5px;"></i> Notification:</span> <span class="badge bg-danger rounded-pill" style="position: relative; top: -1.5px;">1</span> You can collect token by 10:00 AM To 10:00 PM everyday. </marquee>
                                    <button type="button" class="btn-close text-white" data-bs-dismiss="alert" aria-label="Close"></button>
                                    
                                </div>

                                <div class="alert alert-dismissible fade show color-box bg-danger bg-gradient p-4" role="alert">
                                    <div class="mb-4 my-2 text-white">
                                        <div class="font-medium text-red-600">Whoops! Can't buy token right now.</div>

                                        <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                                            <li>You can collect token by 10:00 AM To 10:00 PM everyday.</li>
                                            <li>Wait approx. <b>{{ $current - 10 }} hours</b> more to unlock the feature.</li>
                                        </ul>
                                    </div>                                                   
                                </div>
                            </div>
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