@extends('layouts.master')
@section('title', 'Complains')

@section('content')

    <!-- ========================== Page Content ==================================== -->
    <div class="page-content">
        <div class="container-fluid">
            <div class="card-header p-4">
                <h3 class="float-left">
                    Complain List
                </h3>
                {{-- <div class="float-right">
                    <form class="form-inline my-2 my-lg-0" action="{{ route('room.search') }}" method="GET">
                        <div class="row">
                            <div class="col">
                                <input class="form-control mr-sm-2" type="search" placeholder="Search Residential students by Hall, Room & Seat NO"
                                    aria-label="Search" name="query">
                            </div>
                            <div class="col">
                                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                            </div>
                        </div>
                    </form>
                </div> --}}
            </div>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col" colspan="2">Complain Title</th>
                        <th scope="col">Student ID</th>
                        <th scope="col">Date</th>
                        <th scope="col">Action</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach ($complains as $complain)
                        <tr>
                            <th scope="row">{{ $complain['id'] }}</th>
                            <td colspan="2">{{ $complain['title'] }}</td>
                            <td>{{ $complain['complainer_id'] }}</td>
                            <td>{{ $complain['created_at'] }}</td>
                            <td>
                                <form action="{{ route('complain.detail') }}">
                                    <input type="hidden" name="id" value="{{ $complain['id'] }}">
                                    <button class="btn btn-danger">Detail</button>
                                </form>
                                
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->

@endsection
