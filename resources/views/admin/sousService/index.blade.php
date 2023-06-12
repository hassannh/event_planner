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
        <div><h4 class="titre">sousService</h4></div>
        <div><a href="{{url('admin/sousService/create')}}" class="bttn float-end" >Ajouter sousService</a></div>
    </div>

    @if(Session::has('success'))
    <div class="alert alert-success ">{{Session::get('success')}}</div> @endif
    <div class="card-body">
      <table class="table table-striped">
       
        <tr>
          <th>Id</th>
          <th>Service</th>
          <th>SousService</th>
          <th>Prix</th>
          <th>Description</th>
          <th>Action</th>
          
        </tr>
        @forelse ($sousServices as $sousService)
          <tr>
            <td>{{$sousService->id}}</td>
            <td>{{$sousService->service->serviceName}}</td>
            <td>{{$sousService->typeName}}</td>
            <td>{{$sousService->price}} </td>
            <td>{{$sousService->description}}</td>

            <td>
            <form action="{{route('sousService.destroy',$sousService->id)}}" method="post">
            @csrf
            @method('delete')
            <a href="{{url('admin/sousService/'.$sousService->id.'/edit')}}" class="btn btn-success  btn-sm">Edit</a>
            <button onclick="return confirm('Are you Sure , You want to delete this data ?')" type="submit"class="btn btn-danger  btn-sm">Delete</button>
            </form>
            </td>

          </tr>
        @empty
          <tr>
            <td colspan>No Products Available</td>
          </tr>
        @endforelse
      </table>
    </div>
   </div>


 </div>
</div>

@endsection