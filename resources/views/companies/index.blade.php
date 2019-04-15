@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Companies List
                    <div class="new-input right">
                        <a href="{{ url('companies/create') }}" class="btn btn-info white">New Company</a>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Logo</th>
                                <th scope="col">Name</th>
                                <th scope="col">E-mail</th>
                                <th scope="col">Website</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($companies as $company)
                                <tr>
                                    <th scope="row">{!! $company->id !!}</th>
                                    <td>
                                        
                                        <img src="{{ url('storage/companies/'.$company->logo) }}" alt="$company->name" title="$company->name" width="50px"/>
                                    </td>                                    
                                    <td>{!! $company->name !!}</td>
                                    <td>{!! $company->email !!}</td>
                                    <td>{!! $company->website !!}</td>
                                    <td>
                                        <a href="{{ url('companies/'.$company->id) }}" class="btn btn-primary white">
                                            <i class="fa fa-pen"></i>
                                        </a>
                                        
                                        <a href="{{ url('companies/destroy/'.$company->id) }}" class="btn btn-danger white">
                                            <i class="far fa-trash-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach                            
                        </tbody>
                    </table> 
                    {{ $companies->links() }}                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection