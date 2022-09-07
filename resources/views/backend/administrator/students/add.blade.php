@extends('layouts.master')
@section('title', 'Add Residential Student')

@section('content')
    <!-- ========================== Page Content ==================================== -->
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Add Residential Student</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('administrator.dashboard') }}">Dashboard </a></li>
                                <li class="breadcrumb-item active" style="color: #74788d;">Add Residential Student</li>
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

                            <form class="needs-validation" action="{{ route('store.student') }}" method="post" novalidate="">
                            @csrf

                                <div class="row">
                                    
                                    <div class="col-md-6">
                                        <div class="mb-3 position-relative">
                                            <label for="validationTooltip01" class="form-label">Room & Seat No. (Ex: <b>205-ka</b>)</label>
                                            <input type="text" class="form-control" id="validationTooltip01" placeholder="Enter room & seat no." name="username" value="{{ old('username') }}" required="">
                                            <div class="valid-tooltip">
                                                Looks good!
                                            </div>

                                            <div class="invalid-tooltip">
                                                Please enter room & seat no.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3 position-relative">
                                            <label for="validationTooltip05" class="form-label">Password</label>
                                            <div class="input-group auth-pass-inputgroup">
                                                <input type="password" id="validationTooltip05" class="form-control" name="password" required autocomplete="current-password" placeholder="Enter {{ __('password') }}" aria-label="Password" aria-describedby="password-addon">
                                                <button class="btn btn-light " type="button" id="password-addon"><i class="mdi mdi-eye-outline"></i></button>

                                                <div class="valid-tooltip">
                                                    Looks good!
                                                </div>

                                                <div class="invalid-tooltip">
                                                    Please enter password.
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                                                      
                                </div>

                                <br>

                                <div class="row">
                                    
                                    <div class="col-md-12">
                                        
                                        <button class="btn btn-primary" style="margin-top: 6px !important; width: 100% !important" type="submit">Save New Student</button>
                                        
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
            
        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->                
                
@endsection