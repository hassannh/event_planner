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
        <div><h4 class="titre">Clients</h4></div>

        <div><a  href="{{url('admin/user/create')}}" class="bttn float-end" >Ajouter Utilisateur</a></div>
        
    </div>
  
    @if(Session::has('success'))
    <div class="alert alert-success ">{{Session::get('success')}}</div> @endif
    <div class="card-body">
    <table class="table table-striped">
  <thead>
    <tr>
      <th>Id</th>
      <th>Name</th>
      <th>Last Name</th>
      <th>Email</th>
      <th>Phone</th>
      <th>Company</th>
      <th>Address</th>
      <th>role_as</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($data as $row)
    <tr  valign ="middle">
      <td>{{ $row->id }}</td>
      <td>{{ $row->name }}</td>
      <td>{{ $row->lname }}</td>
      <td>{{ $row->email }}</td>
      <td>{{ $row->phone }}</td>
      <td>{{ $row->company }}</td>
      <td>{{ $row->address }}</td>
      <td>{{ $row->role_as }}</td>

      <td>
 

<form id="user-edit-action-{{$row->id}}"  action="{{route('user.update', $row->id)}}"  method ="post">
  @csrf
  @method('delete')
  <a href="{{route('user.edit',$row->id)}}" class="btn btn-success  btn-sm">Edit</a>
  <button href="" onclick="deleteuser({{$row->id}})" type="submit"class="btn btn-danger  btn-sm">Delete</button>
</form>

      </td>

    </tr>
    @endforeach
  </tbody>
</table>

    </div>
   </div>


 </div>
</div>

<script>
  function deleteuser(id){
    if(confirm("Are you sure you want to deleted ? ")){
      document.getElementById('user-edit-action-'+id).submit();
    }
  }
 </script>
 

@endsection