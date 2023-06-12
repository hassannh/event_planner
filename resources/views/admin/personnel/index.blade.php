<head>
<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/formAdmin.css') }}">
</head>
@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between py-3">
                <div><h4 class="titre">Personnel</h4></div>
                <div><a href="{{ url('admin/personnel/create') }}" class="bttn float-end" >Ajouter Personnel</a></div>
            </div>
            @if(Session::has('success'))
                <div class="alert alert-success ">{{Session::get('success')}}</div>
            @endif
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>NomPers</th>
                            <th>Price</th>
                            <th>Description</th>
                            <th>Image</th>
                           
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($personnels as $personnel)
                            <tr>
                                <td>{{ $personnel->id }}</td>
                                <td>{{ $personnel->NomPers }}</td>
                                <td>{{ $personnel->price }}</td>
                                <td>{{ $personnel->description }}</td>
                                <td><img src="{{ asset('/uploads/personnel/'.$personnel->image)}}"  width="50" height="50" class="rounded-circle"></td>
                                
                                <td>
                                    <form id="personnel-delete-form-{{ $personnel->id }}" action="{{ route('personnel.destroy', $personnel->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('personnel.edit', $personnel->id) }}" class="btn btn-success btn-sm">Edit</a>
                                        <button type="button" onclick="deletePersonnel({{ $personnel->id }})" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8">No records found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    function deletePersonnel(id) {
        if(confirm("Are you sure you want to delete this personnel?")) {
            document.getElementById('personnel-delete-form-'+id).submit();
        }
    }
</script>
@endsection
