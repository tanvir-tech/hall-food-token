@extends('layouts.master')
@section('title', 'Student Dashboard')

@section('content')

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">{{ Auth::user()->role }} Dashboard</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                {{-- notice board  --}}
                
                <div class="container text-warning p-3">
                    <marquee width="100%" direction="left" height="40px" scrollamount="5">
                        <h4>
                            করোনা ঝুঁকি যাচাই করতে ৩৩৩ বা *৩৩৩২# ডায়াল করুন। ভিজিট করুন corona.gov.bd অথবা ডাউনলোড করুন
                            CoronaBD
                            অ্যাপ। ৩৩৩ নম্বরে অপ্রয়োজনে কল করা থেকে বিরত থাকুন।
                        </h4>
                    </marquee>
                </div>

                {{-- @foreach ($notices as $notice) --}}
                    <div class="card text-center">
                        <div class="card-body">
                            <h1 class="text-center">
                                Notice board
                            </h1>
                            <div class="container p-5">
                                <h3 class="text-center text-info" id="noticeTitle" name="noticeTitle">
                                    {{ $notice['title'] }}
                                </h3>

                                <p class="text-danger">
                                    Posted at: {{ $notice['created_at'] }}
                                </p>

                                <br>
                                <p class="text-start" id="generalNotice" id="noticeDescription" name="noticeDescription">
                                    {{ $notice['description'] }}
                                </p>
                                <br>
                                {{-- <a class="text-warning" href="{{url('/download',$notice['fileName'])}}">{{$notice['fileName']}}</a> --}}
                            </div>
                        </div>
                    </div>
                {{-- @endforeach --}}
                
                {{-- <div class="container d-flex justify-content-center">
                    {!! $notices->links() !!}
                </div> --}}

            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-lg-6">

            <div class="card text-center">
                <div class="card-body">
                    <span class="badge rounded-pill badge-soft-primary font-size-11">Student Info</span>
                    <div class="avatar-sm mx-auto mb-4">
                        <br><span class="avatar-title rounded-circle bg-primary bg-soft text-primary font-size-16">
                            <a class="image-popup-vertical-fit" href="/assets/images/default/avatar.jpg">
                                <img src="/assets/images/default/avatar.jpg" alt="agency-pic" height="40" width="40"
                                    style="border-radius: 50%;">
                            </a>
                        </span>
                    </div>

                    @if (Auth::user()->is_residential == 'Yes')
                        <span class="badge rounded-pill bg-success mb-2 mt-3">Residential</span>
                    @elseif(Auth::user()->is_residential == 'No')
                        <span class="badge rounded-pill bg-primary mb-2 mt-3">Non Residential</span>
                    @endif

                    <br>
                    <h5 class="font-size-16 mb-1">{{ Auth::user()->name }}</h5>
                    <p class="text-muted"><b>{{ Auth::user()->username }}</b></p>
                    <p class="text-muted" style="margin-top: -15px;">{{ Auth::user()->phone }}</p>

                </div>
            </div>

        </div> <!-- end col -->
        <div class="col-lg-6">
            <div class="card text-center">
                <div class="card-body">
                    <span class="badge rounded-pill badge-soft-info font-size-11">Meal Charges</span>

                    <div class="text-muted mt-4" style="text-align: justify;">

                        <p><i class="mdi mdi-chevron-right text-primary me-1"></i> <span style="font-weight: 550;">30.3
                                Tk</span> (Per <span style="font-weight: 550;">1 Meal</span>) - <span class="text-primary"
                                style="text-transform: uppercase; font-weight: 550;">Lunch</span></p>

                        <p><i class="mdi mdi-chevron-right text-primary me-1"></i> <span style="font-weight: 550;">30.3
                                Tk</span> (Per <span style="font-weight: 550;">1 Meal</span>) - <span class="text-primary"
                                style="text-transform: uppercase; font-weight: 550;">Dinner</span></p>

                        <p><i class="mdi mdi-chevron-right text-primary me-1"></i> <span style="font-weight: 550;">120.6
                                Tk</span> (Per <span style="font-weight: 550;">1 Meal</span>) - <span class="text-primary"
                                style="text-transform: uppercase; font-weight: 550;">* Feast</span></p>


                        <p><i class="mdi mdi-chevron-right text-primary me-1"></i> <span style="font-weight: 550;"> <span
                                    class="text-primary"
                                    style="text-transform: uppercase; font-weight: 550;">*</span>Charges of the feast may
                                change.</span></p>

                    </div>

                </div>
            </div>
        </div>
    </div>

    <br><br>

    <div class="row">
        <div class="col-xl-12 text-center">
            <h4 class="mb-sm-0 font-size-18">Meal Options</h4>
        </div>
    </div>

    <div class="row" style="margin-top: 10px !important;">
        <div class="col-lg-6">
            <div class="card border border-primary">
                <div class="card-header bg-transparent border-primary">
                    <h5 class="my-0 text-primary text-center"><i class="mdi mdi-bullseye-arrow me-3"></i>Today's Token</h5>

                    <div class="d-flex justify-content-center" style="margin-top: 10px; margin-bottom: -15px;">
                        <i class="bx bx-receipt bx-fade-right text-primary display-4"></i>
                    </div>
                </div>

                <div class="card-body" style="text-align: center;">
                    <h5 class="card-title mt-0">Today : <span class="text-primary">{{ date('d F Y') }}</span></h5>
                    <p class="card-text" style="text-align: justify;">Click on the below to check <span
                            style="font-weight: 505;">today's</span> token & collect meal.</p>
                </div>

                <div class="card-footer">
                    <a href="{{ route('today.token') }}" style="width: 100%;"
                        class="btn btn-primary waves-effect waves-light">Check Today's Token <i
                            class="bx bx-right-arrow-circle bx-fade-right font-size-20 align-middle me-1"></i></a>
                </div>
            </div>
        </div>

        {{-- <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">

                            <div class="text-center">
                                <div class="mb-4">
                                    <i class="bx bx-receipt bx-fade-right text-primary display-4"></i>

                                    <h4 class="card-title" style="font-weight: 550; margin-top: 10px;">Today: <span class="text-success">12 June 2022</span></h4>
                                    <h4 class="card-title">Token Status (<span class="text-primary">For 13 June</span>)</h4>
                                    <i class="bx bx-downvote bx-fade-down font-size-18 align-middle me-1"></i>
                                </div>

                                <h3 style="margin-bottom: 20px;">Not Bought Today</h3>
                                <a class="btn btn-primary btn-rounded btn-sm waves-effect waves-light" href="http://supplement-shop.test/administrator/query/5"><i class="bx bx-loader bx-spin font-size-16 align-middle me-1"></i> Click here to buy <i class="bx bx-right-arrow-circle bx-fade-right font-size-20 align-middle me-1"></i></a>
                            </div>

                            <div class="table-responsive mt-4">
                                <table class="table align-middle table-nowrap">
                                    <tbody>
                                        <tr>
                                            <td style="width: 30%">
                                                <p class="mb-0">San Francisco</p>
                                            </td>
                                            <td style="width: 25%">
                                                <h5 class="mb-0">1,456</h5></td>
                                            <td>
                                                <div class="progress bg-transparent progress-sm">
                                                    <div class="progress-bar bg-primary rounded" role="progressbar" style="width: 94%" aria-valuenow="94" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p class="mb-0">Los Angeles</p>
                                            </td>
                                            <td>
                                                <h5 class="mb-0">1,123</h5>
                                            </td>
                                            <td>
                                                <div class="progress bg-transparent progress-sm">
                                                    <div class="progress-bar bg-success rounded" role="progressbar" style="width: 82%" aria-valuenow="82" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p class="mb-0">San Diego</p>
                                            </td>
                                            <td>
                                                <h5 class="mb-0">1,026</h5>
                                            </td>
                                            <td>
                                                <div class="progress bg-transparent progress-sm">
                                                    <div class="progress-bar bg-warning rounded" role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div> --}}

        <div class="col-lg-6">
            <div class="card border border-success">
                <div class="card-header bg-transparent border-success">
                    <h5 class="my-0 text-success text-center"><i class="mdi mdi-bullseye-arrow me-3"></i>Tomorrow's Token
                    </h5>

                    <div class="d-flex justify-content-center" style="margin-top: 10px; margin-bottom: -15px;">
                        <i class="bx bx-receipt bx-fade-right text-success display-4"></i>
                    </div>
                </div>
                <div class="card-body" style="text-align: center;">
                    <h5 class="card-title mt-0">Tomorrow : <span
                            class="text-success">{{ date('d F Y', strtotime('tomorrow')) }}</span></h5>
                    <p class="card-text" style="text-align: justify;">Click on the below to buy & collect tommorow's
                        token.</p>


                </div>

                <div class="card-footer">
                    <a href="{{ route('buy.token') }}" style="width: 100%;"
                        class="btn btn-success waves-effect waves-light">Buy Tomorrow's Token <i
                            class="bx bx-right-arrow-circle bx-fade-right font-size-20 align-middle me-1"></i></a>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="col-xl-4">
                    <div class="card">
                        <div class="card-body">

                            <div class="text-center">
                                <div class="mb-4">
                                    <i class="bx bx-receipt bx-fade-right text-primary display-4"></i>

                                    <h4 class="card-title" style="font-weight: 550; margin-top: 10px;">Today: <span class="text-success">12 June 2022</span></h4>
                                    <h4 class="card-title">Token Status (<span class="text-primary">For 13 June</span>)</h4>
                                    
                                </div>

                                <h3 style="margin-bottom: 20px;">Not Bought Today</h3>
                                <a class="btn btn-primary btn-rounded btn-sm waves-effect waves-light" href="http://supplement-shop.test/administrator/query/5"><i class="bx bx-loader bx-spin font-size-16 align-middle me-1"></i> Click here to buy <i class="bx bx-right-arrow-circle bx-fade-right font-size-20 align-middle me-1"></i></a>
                            </div>

                            <div class="table-responsive mt-4">
                                <table class="table align-middle table-nowrap">
                                    <tbody>
                                        <tr>
                                            <td style="width: 30%">
                                                <p class="mb-0">San Francisco</p>
                                            </td>
                                            <td style="width: 25%">
                                                <h5 class="mb-0">1,456</h5></td>
                                            <td>
                                                <div class="progress bg-transparent progress-sm">
                                                    <div class="progress-bar bg-primary rounded" role="progressbar" style="width: 94%" aria-valuenow="94" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p class="mb-0">Los Angeles</p>
                                            </td>
                                            <td>
                                                <h5 class="mb-0">1,123</h5>
                                            </td>
                                            <td>
                                                <div class="progress bg-transparent progress-sm">
                                                    <div class="progress-bar bg-success rounded" role="progressbar" style="width: 82%" aria-valuenow="82" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p class="mb-0">San Diego</p>
                                            </td>
                                            <td>
                                                <h5 class="mb-0">1,026</h5>
                                            </td>
                                            <td>
                                                <div class="progress bg-transparent progress-sm">
                                                    <div class="progress-bar bg-warning rounded" role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div> --}}
    </div>
    <!-- end row -->

    </div>
    </div>

@endsection
