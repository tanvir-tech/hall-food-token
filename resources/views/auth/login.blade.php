@extends('layouts.frontend-master')

@section('title', 'Sign In')

@section('content')

    <div class="account-pages my-5 pt-sm-5" style="margin-top: 90px !important;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card overflow-hidden">
                        <div class="bg-primary bg-soft">
                            <div class="row">
                                <div class="col-7">
                                    <div class="text-primary p-4">
                                        <h4 class="text-primary">Sign In here!</h4>
                                        <p>Sign in now to continue to {{ config('app.name') }}.</b></p>
                                    </div>
                                </div>
                                <div class="col-5 align-self-end">
                                    <img src="assets/images/profile-img.png" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div>
                                <div class="avatar-md profile-user-wid mb-4">
                                    <span class="avatar-title rounded-circle bg-light" style="color: #222;">
                                        HMS
                                    </span>
                                </div>

                            </div>
                            <div class="p-2">

                                @if (count($errors) > 0)
                                    <div class="alert alert-dismissible fade show color-box bg-danger bg-gradient p-4"
                                        role="alert">
                                        <x-jet-validation-errors class="mb-4 my-2 text-white" />
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                @endif

                                @if (session('status'))
                                    <div class="alert alert-dismissible fade show color-box bg-success bg-gradient p-4"
                                        role="alert">
                                        <div class="mb-4 my-2 text-white">
                                            {{ session('status') }}
                                        </div>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                @endif

                                @if (Cookie::has('passwordcng'))
                                    <div class="alert alert-dismissible fade show color-box bg-info bg-gradient p-4"
                                        role="alert">
                                        <div class="mb-2 my-2 text-white" style="font-weight: 500;">
                                            {{ Cookie::get('passwordcng') }}
                                        </div>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                @endif

                                @if (session('message'))
                                    <div class="alert alert-danger">{{ session('message') }}</div>
                                @endif


                                <!-- Nav tabs -->
                                <ul class="nav nav-pills nav-justified" role="tablist"
                                    style="border: 1px solid #ced4da; border-radius: 0.3rem; margin-top: 1px !important;">
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#home-1" role="tab"
                                            aria-selected="true">
                                            <span class="d-block d-sm-none"><i class="fas fa-home"></i> Residential</span>
                                            <span class="d-none d-sm-block"><i class="fas fa-home"></i> Residential</span>
                                        </a>
                                    </li>
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link" data-bs-toggle="tab" href="#profile-1" role="tab"
                                            aria-selected="false">
                                            <span class="d-block d-sm-none"><i class="far fa-user"></i>
                                                Non-Residential</span>
                                            <span class="d-none d-sm-block"><i class="far fa-user"></i>
                                                Non-Residential</span>
                                        </a>
                                    </li>
                                </ul>

                                <br>

                                <!-- Tab panes -->
                                <div class="tab-content p-3 text-muted" style="padding-bottom: 0 !important;">
                                    <div class="tab-pane active" id="home-1" role="tabpanel">

                                        <form class="needs-validation" action="{{ route('login') }}" method="POST"
                                            novalidate>

                                            @csrf

                                            <div class="mb-3 position-relative">

                                                {{-- <label for="hall" class="form-label">Hall </label>
                                                <div class=" ">
                                                    <select class="form-select">
                                                        <option>JAMH</option>
                                                        <option>BSMRH</option>
                                                        <option>SRH</option>
                                                        <option>Girls hall</option>
                                                    </select>
                                                </div> --}}
                                                <br>

                                                <label for="validationTooltip02" class="form-label">Room & Seat No.</label>
                                                <input type="text" class="form-control" id="validationTooltip02"
                                                    name="username" value="{{ old('username') }}"
                                                    placeholder="Enter Hall, Room & Seat No." required="">

                                                <div class="valid-tooltip">
                                                    Looks good!
                                                </div>

                                                <div class="invalid-tooltip">
                                                    Please enter valid Hall, Room & Seat No.
                                                </div>
                                            </div>

                                            <br>

                                            <div class="mb-3 position-relative">
                                                <label for="validationTooltip07" class="form-label">Password</label>

                                                <div class="input-group auth-pass-inputgroup">
                                                    <input type="password" class="form-control" id="validationTooltip07"
                                                        name="password" value="{{ old('password') }}" aria-label="Password"
                                                        aria-describedby="password-addon" placeholder="Enter Password"
                                                        required="">

                                                    <div class="valid-tooltip">
                                                        Looks good!
                                                    </div>

                                                    <div class="invalid-tooltip">
                                                        Please enter valid password.
                                                    </div>

                                                    <button class="btn btn-light" type="button" id="password-addon"><i
                                                            class="mdi mdi-eye-outline"></i></button>
                                                </div>
                                            </div>

                                            <br>

                                            <div class="d-grid">
                                                <button class="btn btn-primary waves-effect waves-light"
                                                    type="submit">Sign In as Residential Student</button>
                                            </div>


                                        </form>

                                    </div>

                                    <div class="tab-pane" id="profile-1" role="tabpanel">

                                        <form class="needs-validation" action="{{ route('login') }}" method="POST"
                                            novalidate>

                                            @csrf

                                            {{-- <label for="hall" class="form-label">Hall </label>
                                            <div class=" ">
                                                <select class="form-select">
                                                    <option>JAMH</option>
                                                    <option>BSMRH</option>
                                                    <option>SRH</option>
                                                    <option>Girls hall</option>
                                                </select>
                                            </div> --}}
                                            <br>

                                            <div class="mb-3 position-relative">
                                                <label for="validationTooltip09" class="form-label">Student ID</label>
                                                <input type="text" class="form-control" id="validationTooltip09"
                                                    name="username" value="{{ old('username') }}"
                                                    placeholder="Enter Student ID" required="">

                                                <div class="valid-tooltip">
                                                    Looks good!
                                                </div>

                                                <div class="invalid-tooltip">
                                                    Please enter valid Student ID.
                                                </div>
                                            </div>

                                            <br>

                                            <div class="mb-3 position-relative">
                                                <label for="validationTooltip08" class="form-label">Password</label>

                                                <div class="input-group auth-pass-inputgroup">
                                                    <input type="password" class="form-control" id="validationTooltip08"
                                                        name="password" value="{{ old('password') }}"
                                                        aria-label="Password" aria-describedby="password-addon"
                                                        placeholder="Enter Password" required="">

                                                    <div class="valid-tooltip">
                                                        Looks good!
                                                    </div>

                                                    <div class="invalid-tooltip">
                                                        Please enter valid password.
                                                    </div>

                                                    <button class="btn btn-light" type="button"
                                                        onclick="TogglePassTwo()" id="password-addon"><i
                                                            class="mdi mdi-eye-outline"></i></button>
                                                </div>
                                            </div>

                                            <br>

                                            <div class="d-grid">
                                                <button class="btn btn-primary waves-effect waves-light"
                                                    type="submit">Sign In as Non-Residential Student</button>
                                            </div>


                                        </form>

                                    </div>

                                    <div class="text-center" style="margin-top:30px !important;">
                                        <p>Don't have an account ? <a href="{{ route('register') }}"
                                                class="fw-medium text-primary"> Sign up here </a> </p>
                                    </div>

                                </div>

                            </div>

                        </div>
                    </div>
                    <div class="mt-5 text-center">

                        <div>
                            <p>©
                                <script>
                                    document.write(new Date().getFullYear())
                                </script> {{ config('app.name') }}.
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection

@section('styles')
    <style type="text/css">
        .select2-container .select2-selection--single {
            width: 363px !important;
        }

        .navigation .navbar-nav .nav-item .nav-link {
            color: #556ee6 !important;
        }

        .navigation .navbar-nav .nav-item .nav-link.active,
        .navigation .navbar-nav .nav-item .nav-link:hover {
            color: #556ee6 !important;
        }

        .navigation.nav-sticky .navbar-nav .nav-item .nav-link {
            color: #556ee6 !important;
        }
    </style>
@endsection

@section('scripts')
    <script>
        function TogglePass() {
            var temp = document.getElementById("validationTooltip07");
            if (temp.type === "password") {
                temp.type = "input";
            } else {
                temp.type = "password";
            }
        }

        function TogglePassTwo() {
            var temp = document.getElementById("validationTooltip08");
            if (temp.type === "password") {
                temp.type = "input";
            } else {
                temp.type = "password";
            }
        }
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $(".select2").select2();
        });
    </script>
@endsection
