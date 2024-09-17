@extends('layouts.master')
@section('title', 'Update Profile')

@section('content')
    <!-- ========================== Page Content ==================================== -->
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Update Profile</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{-- @if(Auth::user()->hasRole('Manager')) {{ route('manager.dashboard') }} @elseif(Auth::user()->hasRole('Chairman')) {{ route('chairman.dashboard') }} @elseif(Auth::user()->hasRole('Teacher')) {{ route('teacher.dashboard') }} @endif --}}">Dashboard </a></li>
                                <li class="breadcrumb-item active" style="color: #74788d;">Update Profile</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

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

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title text-center mb-4">Update Profile Information</h4>
                            <br>

                            <form class="needs-validation" action="{{ route('save.basic.info') }}" enctype="multipart/form-data" method="post" novalidate="">
                            @csrf

                                <div class="row">
                                    <div class="col-lg-5"></div>

                                    <div class="col-lg-2">
                                        <p>@if(Auth::user()->profile_photo_path) Current @else Default @endif Profile Photo </p>
                                        <div class="zoom-gallery d-flex flex-wrap">
                                            @if(Auth::user()->profile_photo_path)
                                                <a href="{{ asset('assets/uploads/users/'.Auth::user()->profile_photo_path) }}" title="{{ Auth::user()->profile_photo_path }}">
                                                    <img src="{{ asset('assets/uploads/users/'.Auth::user()->profile_photo_path) }}" alt="" style="height: 125px !important; width: 125px !important;" class="img-thumbnail rounded-circle">
                                                </a>
                                            @else
                                                <a href="{{ config('core.image.default.avatar') }}" title="No Profile Photo">
                                                    <img src="{{ config('core.image.default.avatar') }}" alt="" style="height: 125px !important; width: 125px !important;" class="img-thumbnail rounded-circle">
                                                </a>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-lg-5"></div>
                                </div>

                                <br><br><br>

                                <div class="row mb-4">
                                    <label for="validationTooltip100" class="col-lg-2 col-form-label">Change Photo </label>
                                    
                                    <div class="col-lg-10" style="margin-bottom: 0.7rem!important;">
                                        <input type="file" class="form-control" id="validationTooltip100" name="profile_photo_path">                                        
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label for="validationTooltip01" class="col-lg-2 col-form-label">Name</label>
                                    
                                    <div class="col-lg-10" style="margin-bottom: 0.7rem!important;">
                                        <input type="text" class="form-control" id="validationTooltip01" placeholder="Enter your name" name="name" value="{{ old('name', Auth::user()->name) }}" required="">
                                        <div class="valid-tooltip">
                                            Looks good!
                                        </div>

                                        <div class="invalid-tooltip">
                                            Please enter your full name.
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label for="validationTooltip02" class="col-lg-2 col-form-label">E-mail Address</label>
                                    
                                    <div class="col-lg-10" style="margin-bottom: 0.7rem!important;">
                                        <input type="email" class="form-control" id="validationTooltip02" placeholder="Enter your email address" name="email" value="{{ old('email', Auth::user()->email) }}" required="">
                                        <div class="valid-tooltip">
                                            Looks good!
                                        </div>

                                        <div class="invalid-tooltip">
                                            Please enter your valid email address.
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label for="validationTooltip12" class="col-lg-2 col-form-label">Department</label>
                                    
                                    <div class="col-lg-10" style="margin-bottom: 0.7rem!important;">
                                        <select class="form-control select2" id="validationTooltip12" name="dept" required="">
                                        
                                            <option value="">Select Your Dept.</option>

                                            <optgroup label="Faculty of Engineering">
                                                <option value="ICT" @if(auth()->user()->department == 'ICT') selected @endif>ICT</option>
                                                <option value="CSE" @if(auth()->user()->department == 'CSE') selected @endif>CSE</option>
                                                <option value="TE" @if(auth()->user()->department == 'TE') selected @endif>TE</option>
                                                <option value="ME" @if(auth()->user()->department == 'ME') selected @endif>ME</option>
                                            </optgroup>

                                            <optgroup label="Faculty of Life Science">
                                                <option value="ESRM" @if(auth()->user()->department == 'ESRM') selected @endif>ESRM</option>
                                                <option value="CPS" @if(auth()->user()->department == 'CPS') selected @endif>CPS</option>
                                                <option value="FTNS" @if(auth()->user()->department == 'FTNS') selected @endif>FTNS</option>
                                                <option value="BGE" @if(auth()->user()->department == 'BGE') selected @endif>BGE</option>
                                                <option value="Pharmacy" @if(auth()->user()->department == 'Pharmacy') selected @endif>Pharmacy</option>
                                                <option value="BMB" @if(auth()->user()->department == 'BMB') selected @endif>BMB</option>
                                            </optgroup>

                                            <optgroup label="Faculty of Business Studies">
                                                <option value="Business Administration" @if(auth()->user()->department == 'Business Administration') selected @endif>Business Administration</option>
                                                <option value="Management" @if(auth()->user()->department == 'Management') selected @endif>Management</option>
                                                <option value="Accounting" @if(auth()->user()->department == 'Accounting') selected @endif>Accounting</option>
                                            </optgroup>

                                            <optgroup label="Faculty of Science">
                                                <option value="Chemistry" @if(auth()->user()->department == 'Chemistry') selected @endif>Chemistry</option>
                                                <option value="MATH" @if(auth()->user()->department == 'MATH') selected @endif>MATH</option>
                                                <option value="Physics" @if(auth()->user()->department == 'Physics') selected @endif>Physics</option>
                                                <option value="STAT" @if(auth()->user()->department == 'STAT') selected @endif>STAT</option>
                                            </optgroup>

                                            <optgroup label="Faculty of Social Science">
                                                <option value="ECO" @if(auth()->user()->department == 'ECO') selected @endif>ECO</option>
                                            </optgroup>

                                            <optgroup label="Faculty of Arts">
                                                <option value="English" @if(auth()->user()->department == 'English') selected @endif>English</option>
                                            </optgroup>

                                        </select>

                                        <div class="valid-tooltip">
                                            Looks good!
                                        </div>

                                        <div class="invalid-tooltip">
                                            Please select your dept.
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label for="validationTooltip13" class="col-lg-2 col-form-label">Session</label>
                                    
                                    <div class="col-lg-10" style="margin-bottom: 0.7rem!important;">
                                        <input type="text" class="form-control" id="validationTooltip13" placeholder="Enter your session" name="session" value="{{ old('session', auth()->user()->session) }}" required="">
                                        <div class="valid-tooltip">
                                            Looks good!
                                        </div>

                                        <div class="invalid-tooltip">
                                            Please enter your session.
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label for="validationTooltip200" class="col-lg-2 col-form-label">Phone No.(11 digit)</label>
                                    
                                    <div class="col-lg-10" style="margin-bottom: 0.7rem!important;">
                                        <input type="tel" class="form-control" id="validationTooltip200" name="phone" pattern="[0-9]{11}" value="{{ old('phone', auth()->user()->phone) }}" placeholder="Enter Phone No." required="">

                                        <div class="valid-tooltip">
                                            Looks good!
                                        </div>

                                        <div class="invalid-tooltip">
                                            Please enter valid phone number.
                                        </div>

                                    </div>
                                </div>

                                            
                                <div class="row justify-content-end">
                                    
                                    <div class="col-lg-10">
                                        
                                        <button class="btn btn-primary" style="margin-top: 8px!important; width: 100% !important" type="submit">Save Information</button>
                                        
                                    </div>
                            
                                </div>

                            </form>

                        </div>
                        <!-- end card body -->
                    </div>
                    <!-- end card -->
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->

            @if(!auth()->user()->name || !auth()->user()->email || !auth()->user()->department || !auth()->user()->session || !auth()->user()->phone)
                <div class="row">
                </div>
            @else
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">

                                <h4 class="card-title text-center mb-4">Update Password</h4>

                                <form class="needs-validation" action="{{ route('change.auth.password') }}" method="post" novalidate="">
                                @csrf

                                    <div class="row mb-4">
                                        <label for="validationTooltip05" class="col-lg-2 col-form-label">Old Password</label>
                                        
                                        <div class="col-lg-10" style="margin-bottom: 0.7rem!important;">
                                            <div class="input-group auth-pass-inputgroup">
                                                <input type="password" class="form-control" id="validationTooltip05" aria-label="Password" aria-describedby="password-addon" placeholder="Enter old password" name="oldpassword" required="">

                                                <div class="valid-tooltip">
                                                    Looks good!
                                                </div>

                                                <div class="invalid-tooltip">
                                                    Please enter your current password.
                                                </div>

                                                <button class="btn btn-light" type="button" id="password-addon"><i class="mdi mdi-eye-outline"></i></button>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="row mb-4">
                                        <label for="validationTooltip07" class="col-lg-2 col-form-label">New Password</label>
                                        
                                        <div class="col-lg-10" style="margin-bottom: 0.7rem!important;">
                                            <div class="input-group auth-pass-inputgroup">
                                                <input type="password" class="form-control" id="validationTooltip07" aria-label="Password" aria-describedby="password-addon-one" placeholder="Enter new password" name="newpassword" required="">

                                                <div class="valid-tooltip">
                                                    Looks good!
                                                </div>

                                                <div class="invalid-tooltip">
                                                    Please enter your new password.
                                                </div>

                                                <button class="btn btn-light" type="button" id="password-addon-one" onclick="TogglePass()"><i class="mdi mdi-eye-outline"></i></button>
                                            </div>

                                        </div>
                                    </div>   

                                    <div class="row mb-4">
                                        <label for="validationTooltip08" class="col-lg-2 col-form-label">Confirm Password</label>
                                        
                                        <div class="col-lg-10" style="margin-bottom: 0.7rem!important;">
                                            <div class="input-group auth-pass-inputgroup">
                                                <input type="password" class="form-control" id="validationTooltip08" placeholder="Re-type/Confirm Password" aria-label="Password" name="password_confirmation" aria-describedby="password-addon-two" onkeyup="matchPassword()" required="">

                                                <div class="valid-tooltip">
                                                    Looks good!
                                                </div>

                                                <div class="invalid-tooltip">
                                                    Please enter your new password again.
                                                </div>

                                                <button class="btn btn-light" type="button" id="password-addon-two" onclick="ToggleConfirmPass()"><i class="mdi mdi-eye-outline"></i></button>

                                                <div class="valid-tooltip" id="matched" style="display: none;">
                                                    Password Matched!
                                                </div>

                                                <div class="invalid-tooltip" id="notmatched" style="display: none;">
                                                    Password not matched yet.
                                                </div>
                                            </div>

                                        </div>
                                    </div>                                

                                    <div class="row justify-content-end">
                                        
                                        <div class="col-lg-10">
                                            
                                            <button class="btn btn-primary" style="margin-top: 8px!important; width: 100% !important" type="submit">Update Password</button>
                                            
                                        </div>
                                
                                    </div>

                                </form>

                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->
                    </div>
                    <!-- end col -->
                </div>
            @endif
            <!-- end row -->

        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->                
                
@endsection


@section('scripts')
    <script type="text/javascript">
        function TogglePass() {
            var temp = document.getElementById("validationTooltip07");
            if (temp.type === "password") {
                temp.type = "input";
            }
            else {
                temp.type = "password";
            }
        }

        function ToggleConfirmPass() {
            var tempconf = document.getElementById("validationTooltip08");
            if (tempconf.type === "password") {
                tempconf.type = "input";
            }
            else {
                tempconf.type = "password";
            }
        }
    </script>

    <script type="text/javascript">
        function matchPassword() {  
            var pw1 = document.getElementById("validationTooltip07").value;  
            var pw2 = document.getElementById("validationTooltip08").value;
            if($.trim(pw1) != ''){
                if($.trim(pw2) != ''){
                    if(pw1 != pw2)  
                    { 
                        $('#matched').css('display', 'none');  
                        $('#notmatched').css('display', 'block');
                    } else { 
                        $('#notmatched').css('display', 'none');
                        $('#matched').css('display', 'block');
                    }
                } else {
                    $('#notmatched').css('display', 'none');
                    $('#matched').css('display', 'none');
                }
            }
        }
    </script>
@endsection