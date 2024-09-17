@extends('layouts.master')
@section('title', 'Approved Users List')

@section('content')

    <!-- ========================== Page Content ==================================== -->
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Approved Users List (<?php echo $students->count(); ?>)</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('administrator.dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Approved Users List</li>
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
                            <h5><span class="text-success"><b>Approved Users List (<?php echo $students->count(); ?>)</b></span></h5> 
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
                                        <th>Status</th>
                                        <th>E-mail</th>
                                        <th>Phone</th>
                                        <th>Student ID</th>
                                        <th>Dept.</th>
                                        <th>Session</th>
                                    </tr>
                                </thead>


                                <tbody style="vertical-align: middle !important;">
                                    @foreach($students as $key => $data)
                                        
                                        <tr>
                                            <td><span style="margin-left: 3px;">{{ $key + 1 }}</span></td>
                                            <td><span style="font-weight: 500;">{{ $data->name }}</span></td>

                                            <td>
                                                @if($data->is_residential == 'Yes')
                                                    <span class="badge rounded-pill bg-success">Residential</span>
                                                @elseif($data->is_residential == 'No')
                                                    <span class="badge rounded-pill bg-danger">Not Residential</span>
                                                @endif
                                            </td>

                                            <td>{{ $data->email }}</td>
                                            <td>{{ $data->phone }}</td>
                                            <td><span style="font-weight: 500;">{{ $data->student_id }}</span></td>

                                            <td>{{ $data->department }}</td>
                                            <td>{{ $data->session }}</td>

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