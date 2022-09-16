@extends('layouts.master')
@section('title', "Dinner Tokens List")

@section('content')

    <!-- ========================== Page Content ==================================== -->
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">{{ date('d F, Y', strtotime($date)) }} - Dinner Tokens List (<?php echo $dinner_tokens->count(); ?>)</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('administrator.dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active">{{ date('d F, Y', strtotime($date)) }} - Dinner Tokens List</li>
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
                                <span class="text-info"><b> {{ date('d F, Y', strtotime($date)) }} </b></span> <b>-</b> <span class="text-primary"><b style="font-weight: 550;">Dinner Tokens</b></span>
                                
                            </h5> 

                            <!-- <h5>
                                <b style="font-weight: 550;"> Total Tokens </b> <b>:</b> <span class="text-primary"><b style="font-weight: 550;"><?php echo $dinner_tokens->count(); ?></b></span>
                                
                            </h5> 

                            <h5>
                                <b style="font-weight: 550;"> Per Token Cost </b> <b>:</b> <span class="text-primary"><b style="font-weight: 550;">33.30 Tk</b></span>
                                
                            </h5> 

                            <h5>
                                <b style="font-weight: 550;"> Total Collection </b> <b>:</b> <span class="text-primary"><b style="font-weight: 1000;">{{ number_format(33.30 * $dinner_tokens->count(), 2) }} Tk </b></span>
                                
                            </h5>  -->
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th style="width:20%;" class="text-center">No.</th>
                                        <th style="width:30%;" class="text-center">Name</th>
                                        <th style="width:25%;" class="text-center">Room & Seat</th>
                                        <th style="width:25%;" class="text-center">Token Number</th>                                       
                                    </tr>
                                </thead>


                                <tbody>
                                        
                                    @foreach($dinner_tokens as $key => $data)
                                        <?php
                                            $student = \App\Models\User::find($data->user_id);
                                        ?>
                                        <tr>

                                            <td><span style="margin-left: 3px;">{{ $key + 1 }}</span></td>
                                
                                            <td class="text-center"><span style="font-weight: 500;">{{ $student->name }}</span></td>
                                            <td class="text-center"><span style="font-weight: 500;">{{ $student->username }}</span></td>
                                            <td class="text-center"><span style="font-weight: 500;">{{ $key+1 .'-'. $data->dinner }}</span></td>

                                        </tr>
                                    @endforeach

                                        <tr class="text-center" style="margin-top: 20px;"> 
                                            <td>
                                                <b style="font-weight: 400;">Date :</b> <span class="text-primary"><b style="font-weight: 550;"> {{ date('d F, Y', strtotime($date)) }} </b></span>
                                            </td>

                                            <td>
                                                <b style="font-weight: 400;">Per Token :</b> <span class="text-primary"><b style="font-weight: 550;"> 33.30 Tk </b></span>
                                            </td>

                                            <td>
                                                <b style="font-weight: 400;"> Total Tokens :</b> <span class="text-primary"><b style="font-weight: 550;"><?php echo $dinner_tokens->count(); ?></b></span>
                                            </td>

                                            <td>
                                                <b style="font-weight: 400;"> Total Collection :</b> <span class="text-primary"><b style="font-weight: 550;">{{ number_format(33.30 * $dinner_tokens->count(), 2) }} Tk </b></span>
                                            </td>
                                        </tr>



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