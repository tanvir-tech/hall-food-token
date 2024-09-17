@extends('layouts.master')
@section('title', 'Make complain')

@section('content')
    <!-- ========================== Page Content ==================================== -->
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Complain</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('student.dashboard') }}">Dashboard </a></li>
                                <li class="breadcrumb-item active" style="color: #74788d;">Complain</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-lg-12">

                    @if (count($errors) > 0)
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

                            <form class="needs-validation" action="{{ route('complain.store') }}" method="post"
                                novalidate="">
                                @csrf
                                <label for="title">Complain Title</label>
                                <textarea class="form-control" id="title" name="title" rows="1" placeholder="Title of the complain" required></textarea>
                                <br><br>

                                <div class="row">

                                    <div class="col-md-12">
                                        <div class="mb-3 position-relative">
                                            <label for="validationTooltip01" class="form-label">Complain description</label>
                                            <textarea class="form-control" id="validationTooltip01" placeholder="Description" name="description" rows="7"
                                                required="">{{ old('review') }}</textarea>
                                            <div class="valid-tooltip">
                                                Looks good!
                                            </div>

                                            <div class="invalid-tooltip">
                                                Please enter your complain
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <br>

                                <div class="row">

                                    <div class="col-md-12">

                                        <button class="btn btn-danger"
                                            style="margin-top: 6px !important; width: 100% !important" type="submit">Complain</button>

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
