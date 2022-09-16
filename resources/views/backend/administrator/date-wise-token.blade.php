@extends('layouts.master')
@section('title', "Date Wise Tokens List")

@section('content')

    <!-- ========================== Page Content ==================================== -->
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Date Wise Tokens List</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('administrator.dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Date Wise Tokens List</li>
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
                            <h5>
                                <span class="text-success"><b> Date Wise Tokens List</b></span>
                                
                            </h5> 
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
                                        <th>Date</th>
                                        <th class="text-center">View Lunch</th>
                                        <th class="text-center">View Dinner</th>                                       
                                    </tr>
                                </thead>


                                <tbody>
                                    @foreach($tokens as $key => $data)
                                
                                        <tr>
                                            <?php
                                                $date = date('d-F-Y', strtotime($data));
                                            ?>
                                            <td><span style="margin-left: 3px;">{{ $key + 1 }}</span></td>
                                
                                            <td><span style="font-weight: 500;">{{ date('d F, Y', strtotime($data)) }}</span></td>
                                            <td class="text-center">
                                                <a href="{{ route('lunch.tokens', $date) }}" class="btn btn-success btn-sm btn-label waves-effect waves-light"><i class="bx bxs-download label-icon"></i> Lunch Tokens <i class="bx bx-right-arrow-circle font-size-20 align-middle me-1"></i></a>
                                            </td>
                                            
                                            <td class="text-center">
                                                <a href="{{ route('dinner.tokens', $date) }}" class="btn btn-primary btn-sm btn-label waves-effect waves-light"><i class="bx bxs-download label-icon"></i> Dinner Tokens <i class="bx bx-right-arrow-circle font-size-20 align-middle me-1"></i></a>
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
            margin-top: -14px !important;
        }

        .CellWithComment{
            position:relative;
        }

        .CellComment{
            display: none;
            position: absolute; 
            z-index: 100;
            padding: .25em .4em;
            font-size: 75%;
            font-weight: 500;
            line-height: 1;
            color: #fff;
            text-align: center;
            white-space: nowrap;
            vertical-align: baseline;
            border-radius: .25rem;
        }

        .CellWithComment:hover span.CellComment{
            display:block;
        }

        .form-control:disabled, .form-control[readonly] {
            color: #000 !important;
            background: rgb(142 147 168 / 25%)!important;
        }
    </style>
@endsection