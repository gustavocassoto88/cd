@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Employee - {!! $employee->name !!}
                    <div class="new-input right">
                        <a href="{{ url('employees') }}" class="btn btn-info white">Employees List</a>
                    </div>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ url('employees/update/'.$employee->id) }}">
                        @csrf   
                        <div class="form-group">
                            <label for="company">Company</label>
                            <select name="company_id" class="form-control" required>                                
                                @foreach($companies as $company)
                                    @if($employee->company->id == $company->id)
                                        <option value="{!! $company->id !!}" selected>{!! $company->name !!}</option>
                                    @else
                                        <option value="{!! $company->id !!}">{!! $company->name !!}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" value="{!! $employee->name !!}" required>                            
                        </div>
                        <div class="form-group">
                            <label for="last_name">Last Name</label>
                            <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter last name"  value="{!! $employee->last_name !!}" required>                            
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone Number</label>
                            <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter phone number"  value="{!! $employee->phone !!}">                            
                        </div>
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email"  value="{!! $employee->email !!}">
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>                                               
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection