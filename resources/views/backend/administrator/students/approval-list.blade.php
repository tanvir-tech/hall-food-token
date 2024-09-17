@extends('layouts.master')
@section('title', 'Waiting For Approval')

@section('content')

    <!-- ========================== Page Content ==================================== -->
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Waiting For Approval (<?php echo $need_approval->count(); ?>)</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('administrator.dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Waiting For Approval</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            @if(count($errors) > 0)
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="alert alert-dismissible fade show color-box bg-danger bg-gradient p-4" role="alert">
                                    <x-jet-validation-errors class="mb-4 my-2 text-white" />
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body" style="text-align: center;">
                            <h5><span class="text-success"><b>Waiting For Approval (<?php echo $need_approval->count(); ?>)</b></span></h5> 
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            
                            <table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Name</th>
                                        <th>E-mail</th>
                                        <th>Phone</th>
                                        <th>Student ID</th>
                                        <th>Dept.</th>
                                        <th>Session</th>
                                        <th style="text-align: center;">Action</th>
                                        <th>Joined On</th>
                                    </tr>
                                </thead>


                                <tbody style="vertical-align: middle !important;">
                                    @foreach($need_approval as $key => $data)
                                        
                                        <tr>
                                            <td><span style="margin-left: 3px;">{{ $key + 1 }}</span></td>
                                            <td><span style="font-weight: 500;">{{ $data->name }}</span></td>
                                            <td>{{ $data->email }}</td>
                                            <td>{{ $data->phone }}</td>
                                            <td><span style="font-weight: 500;">{{ $data->student_id }}</span></td>

                                            <td>{{ $data->department }}</td>
                                            <td>{{ $data->session }}</td>

                                            <td style="text-align: center;">
                                                <span style="display: inline-flex; flex-direction: row; gap: 15px;">
                                                    
                                                    <form action="{{ route('approve.student') }}" method="POST">
                                                        @csrf

                                                        <input type="hidden" name="id" value="{{ $data->id }}">
                                                        <button class="btn btn-success btn-sm waves-effect btn-label waves-light" onclick="return confirm('Are you sure to approve ?');"> 
                                                            <i class="bx bx-check-double label-icon"></i> Approve
                                                        </button>
                                                    </form>

                                                    <form action="{{ route('decline.student') }}" method="POST">
                                                        @csrf

                                                        <input type="hidden" name="id" value="{{ $data->id }}">
                                                        <button class="btn btn-danger btn-sm waves-effect btn-label waves-light" onclick="return confirm('Are you sure to decline ?');"> 
                                                            <i class="bx bx-x-circle label-icon"></i> Decline
                                                        </button>
                                                    </form>

                                                </span>                                                        
                                            </td>

                                            <td>
                                                {{ $data->created_at->diffForHumans() }}
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->

            <p style="text-align: center; margin-top: 10px;"><a class="btn btn-primary waves-effect waves-light" href="{{ route('administrator.dashboard') }}"><i class="far fa-arrow-alt-circle-left"></i> Go To Dashboard </a></p>
            <br>

        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->                
                
@endsection


@section('styles')
    <style type="text/css">
        .table.dataTable.dtr-inline.collapsed>tbody>tr>td.dtr-control:before, table.dataTable.dtr-inline.collapsed>tbody>tr>td.dtr-control:before {
            margin-top: -10px !important;
        }
    </style>
@endsection