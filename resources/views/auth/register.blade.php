@extends('layouts.frontend-master')

@section('title', 'Register with us')

@section('content')

    <div class="account-pages my-5 pt-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card overflow-hidden">
                        <div class="bg-primary bg-soft">
                            <div class="row">
                                <div class="col-7">
                                    <div class="text-primary p-4">
                                        <h5 class="text-primary">Free Register</h5>
                                        <p>Grab your free {{ config('app.name') }} account now.</b></p>
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


                                <form class="needs-validation" action="{{ route('register') }}" method="POST"
                                    enctype="multipart/form-data" novalidate>

                                    @csrf

                                    <input type="hidden" name="is_official" value="No">

                                    <div class="mb-3 position-relative">
                                        <label for="validationTooltip01" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="validationTooltip01"
                                            placeholder="Enter your name" name="name" value="{{ old('name') }}"
                                            required="">
                                        <div class="valid-tooltip">
                                            Looks good!
                                        </div>

                                        <div class="invalid-tooltip">
                                            Please enter your name.
                                        </div>
                                    </div>

                                    <br>

                                    <div class="mb-3 position-relative">
                                        <label for="validationTooltip02" class="form-label">E-mail</label>
                                        <input type="email" class="form-control" id="validationTooltip02" name="email"
                                            value="{{ old('email') }}" placeholder="Enter E-mail Address" required="">

                                        <div class="valid-tooltip">
                                            Looks good!
                                        </div>

                                        <div class="invalid-tooltip">
                                            Please enter valid E-mail address.
                                        </div>
                                    </div>

                                    <br>

                                    <div class="mb-3 position-relative">
                                        <label for="validationTooltip200" class="form-label">Phone No.(11 digit)</label>
                                        <input type="tel" class="form-control" id="validationTooltip200" name="phone"
                                            pattern="[0-9]{11}" value="{{ old('phone') }}" placeholder="Enter Phone No."
                                            required="">

                                        <div class="valid-tooltip">
                                            Looks good!
                                        </div>

                                        <div class="invalid-tooltip">
                                            Please enter valid phone number.
                                        </div>
                                    </div>

                                    <br>

                                    <div class="mb-3 position-relative">
                                        <label for="validationTooltip12" class="form-label">Department</label>
                                        <select class="form-control select2" id="validationTooltip12" name="dept"
                                            required="">

                                            <option value="">Select Your Dept.</option>

                                            <optgroup label="Faculty of Engineering">
                                                <option value="ICT">ICT</option>
                                                <option value="CSE">CSE</option>
                                                <option value="TE">TE</option>
                                                <option value="ME">ME</option>
                                            </optgroup>

                                            <optgroup label="Faculty of Life Science">
                                                <option value="ESRM">ESRM</option>
                                                <option value="CPS">CPS</option>
                                                <option value="FTNS">FTNS</option>
                                                <option value="BGE">BGE</option>
                                                <option value="Pharmacy">Pharmacy</option>
                                                <option value="BMB">BMB</option>
                                            </optgroup>

                                            <optgroup label="Faculty of Business Studies">
                                                <option value="Business Administration">Business Administration</option>
                                                <option value="Management">Management</option>
                                                <option value="Accounting">Accounting</option>
                                            </optgroup>

                                            <optgroup label="Faculty of Science">
                                                <option value="Chemistry">Chemistry</option>
                                                <option value="MATH">MATH</option>
                                                <option value="Physics">Physics</option>
                                                <option value="STAT">STAT</option>
                                            </optgroup>

                                            <optgroup label="Faculty of Social Science">
                                                <option value="ECO">ECO</option>
                                            </optgroup>

                                            <optgroup label="Faculty of Arts">
                                                <option value="English">English</option>
                                            </optgroup>

                                        </select>

                                        <div class="valid-tooltip">
                                            Looks good!
                                        </div>

                                        <div class="invalid-tooltip">
                                            Please select your dept.
                                        </div>
                                    </div>
                                    {{-- hall name  --}}
                                    {{-- <div class="mb-3 position-relative">
                                        <label for="validationTooltip13" class="form-label">Hall</label>
                                        <select class="form-control select2" id="validationTooltip13" name="hall"
                                            required="">

                                            <optgroup label="Male">
                                                <option value="JAMH">JAMH</option>
                                                <option value="BSMRH">BSMRH</option>
                                                <option value="SRH">SRH</option>
                                                <option value="JH">JH</option>
                                            </optgroup>
                                            <optgroup label="Female">
                                                <option value="Jahanara Imam">Jahanara Imam</option>
                                                <option value="Sheikh Fazilatunnesa">Sheikh Fazilatunnesa</option>
                                                <option value="Alema Khatun">Alema Khatun</option>
                                            </optgroup>


                                        </select>

                                        <div class="valid-tooltip">
                                            Looks good!
                                        </div>

                                        <div class="invalid-tooltip">
                                            Please select your Hall.
                                        </div>
                                    </div> --}}






                                    <br>

                                    <div class="mb-3 position-relative">
                                        <label for="validationTooltip13" class="form-label">Session</label>
                                        <input type="text" class="form-control" id="validationTooltip13"
                                            placeholder="Enter your session" name="session" value="{{ old('session') }}"
                                            required="">
                                        <div class="valid-tooltip">
                                            Looks good!
                                        </div>

                                        <div class="invalid-tooltip">
                                            Please enter your session.
                                        </div>
                                    </div>

                                    <br>

                                    <div class="mb-3 position-relative">
                                        <label for="validationTooltip15" class="form-label">Student ID (Ex:
                                            IT-17009)</label>
                                        <input type="text" class="form-control" id="validationTooltip15"
                                            placeholder="Enter your student id" name="student_id"
                                            value="{{ old('student_id') }}" required="">
                                        <div class="valid-tooltip">
                                            Looks good!
                                        </div>

                                        <div class="invalid-tooltip">
                                            Please enter your student id.
                                        </div>
                                    </div>

                                    <br>


                                    <style>
                                        /* Hide the input box initially */
                                        #hall-name {
                                            display: none;
                                            margin-top: 10px;
                                        }
                                    </style>

                                    
                                    <label>
                                        <input type="checkbox" id="residential-checkbox" onclick="toggleHallInput()">
                                        Residential
                                    </label>

                                    <!-- Input field for Hall Name, hidden initially -->
                                    <div id="hall-name">
                                        <label for="hall">Enter hall id : Hall-name_Room_Seat</label>
                                        <input type="text" id="hall_id" name="hall_id"
                                            placeholder="JAMH_400_Ka">
                                    </div>

                                    <script>
                                        // Function to toggle the display of the hall input field
                                        function toggleHallInput() {
                                            var checkbox = document.getElementById("residential-checkbox");
                                            var hallInput = document.getElementById("hall-name");
                                            if (checkbox.checked) {
                                                hallInput.style.display = "block"; // Show input field when checkbox is checked
                                            } else {
                                                hallInput.style.display = "none"; // Hide input field when checkbox is unchecked
                                            }
                                        }
                                    </script>
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

                                    <div class="mb-3 position-relative">
                                        <label for="validationTooltip08" class="form-label">Re-type Password</label>

                                        <div class="input-group auth-pass-inputgroup">
                                            <input type="password" class="form-control" id="validationTooltip08"
                                                placeholder="Re-type Password" aria-label="Password"
                                                name="password_confirmation" aria-describedby="password-addon-two"
                                                onkeyup="matchPassword()" required="">

                                            <div class="valid-tooltip">
                                                Looks good!
                                            </div>

                                            <div class="invalid-tooltip">
                                                Please Re-type Password again.
                                            </div>

                                            <button class="btn btn-light" type="button" id="password-addon-two"
                                                onclick="TogglePass()"><i class="mdi mdi-eye-outline"></i></button>

                                            <div class="valid-tooltip" id="matched" style="display: none;">
                                                Password Matched!
                                            </div>

                                            <div class="invalid-tooltip" id="notmatched" style="display: none;">
                                                Password not matched yet.
                                            </div>

                                        </div>
                                    </div>

                                    <br>

                                    <div class="d-grid">
                                        <button class="btn btn-primary waves-effect waves-light" type="submit">Create New
                                            Account</button>
                                    </div>

                                </form>


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
            width: 394px !important;
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
        function matchPassword() {
            var pw1 = document.getElementById("validationTooltip07").value;
            var pw2 = document.getElementById("validationTooltip08").value;
            if ($.trim(pw1) != '') {
                if ($.trim(pw2) != '') {
                    if (pw1 != pw2) {
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


        function matchPasswordTwo() {
            var pw1 = document.getElementById("validationTooltip107").value;
            var pw2 = document.getElementById("validationTooltip108").value;
            if ($.trim(pw1) != '') {
                if ($.trim(pw2) != '') {
                    if (pw1 != pw2) {
                        $('#matchedtwo').css('display', 'none');
                        $('#notmatchedtwo').css('display', 'block');
                    } else {
                        $('#notmatchedtwo').css('display', 'none');
                        $('#matchedtwo').css('display', 'block');
                    }
                } else {
                    $('#notmatchedtwo').css('display', 'none');
                    $('#matchedtwo').css('display', 'none');
                }
            }
        }


        function TogglePass() {
            var temp = document.getElementById("validationTooltip08");
            if (temp.type === "password") {
                temp.type = "input";
            } else {
                temp.type = "password";
            }
        }

        function TogglePassTwo() {
            var temp = document.getElementById("validationTooltip107");
            if (temp.type === "password") {
                temp.type = "input";
            } else {
                temp.type = "password";
            }
        }

        function TogglePassThree() {
            var temp = document.getElementById("validationTooltip108");
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
