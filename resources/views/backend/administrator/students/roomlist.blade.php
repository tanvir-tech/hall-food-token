@extends('layouts.master')
@section('title', 'Assigned room')

@section('content')

    <!-- ========================== Page Content ==================================== -->
    <div class="page-content">
        <div class="container-fluid">
            <div class="card-header p-4">
                <h3 class="float-left">
                    Room List
                </h3>
                <div class="float-right">
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
                </div>
            </div>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Student Name</th>
                        <th scope="col">Student ID</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Hall-Room-Seat</th>
                        <th scope="col">Department</th>
                        <th>Session</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($residential_students as $student)
                        <tr>
                            <th scope="row">{{ $student['id'] }}</th>
                            <td>{{ $student['name'] }}</td>
                            <td>{{ $student['student_id'] }}</td>
                            <td>{{ $student['email'] }}</td>
                            <td>{{ $student['phone'] }}</td>
                            <td>{{ $student['username'] }}</td> {{-- room no --}}
                            <td>{{ $student['department'] }}</td>
                            <td>{{ $student['session'] }}</td>
                            <td>{{ $student['status'] }}</td>

                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->

@endsection
