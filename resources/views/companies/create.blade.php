@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">New Company
                    <div class="new-input right">
                        <a href="{{ url('companies') }}" class="btn btn-info white">Companies List</a>
                    </div>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ url('companies') }}" enctype="multipart/form-data">
                        @csrf   
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" required>                            
                        </div>
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>
                        <div class="form-group">
                            <label for="website">Website</label>
                            <input type="text" class="form-control" id="website" name="website" placeholder="Enter website">                            
                        </div>
                        <div class="form-group">
                            <label for="logo">Logo</label>
                            <input type="file" name="logo" class="form-control-file" id="logo" aria-describedby="fileHelp">
                            <small id="fileHelp" class="form-text text-muted">The file must have the minimum size of 100x100 px.</small>
                        </div>                        
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection