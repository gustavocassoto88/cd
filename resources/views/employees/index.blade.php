@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Employees List
                    <div class="new-input right">
                        <a href="{{ url('employees/create') }}" class="btn btn-info white">New Employee</a>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Company</th>
                                <th scope="col">Name</th>
                                <th scope="col">Last Name</th>
                                <th scope="col">Phone</th>
                                <th scope="col">E-mail</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($employees as $employee)
                                <tr>
                                    <th scope="row">{!! $employee->id !!}</th>
                                    <td>{!! $employee->company->name !!}</td>
                                    <td>{!! $employee->name !!}</td>
                                    <td>{!! $employee->last_name !!}</td>
                                    <td>{!! $employee->phone !!}</td>
                                    <td>{!! $employee->email !!}</td>
                                    <td>
                                        <a href="{{ url('employees/'.$employee->id) }}" class="btn btn-primary white">
                                            <i class="fa fa-pen"></i>
                                        </a>                                        
                                        <a href="{{ url('employees/destroy/'.$employee->id) }}" class="btn btn-danger white">
                                            <i class="far fa-trash-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach                            
                        </tbody>
                    </table>                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection