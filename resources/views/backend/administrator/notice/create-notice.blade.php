@extends('layouts.master')
@section('title', 'Create notice')

@section('content')

    <!-- ========================== Page Content ==================================== -->
    <div class="page-content">
        <div class="container-fluid">
            <div class="container text-center p-3">
                <h4>Create a notice here</h4>
            </div>
    
    
            <form action="{{ route('notice.store') }}" method="POST" enctype="multipart/form-data">
                @csrf 

                    <label for="title">Title</label>
                    <textarea class="form-control" id="title" name="title" rows="1" placeholder="Title of the notice" required></textarea>
                    <br><br>
    
                <label for="description">Description :</label>
                <textarea class="form-control" id="description" name="description" rows="12" required></textarea>
                <br>
                
                <button class="btn btn-success" type="submit">Send Notice</button>
            </form>
        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->

@endsection
