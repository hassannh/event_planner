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
        <div><h4 class="titre">Services</h4></div>
        <div><a href="{{url('admin/service/create')}}" class="bttn float-end" >Ajouter Equipement</a></div>
    </div>
  
      @if(Session::has('success'))
    <div class="alert alert-success ">{{Session::get('success')}}</div> @endif
    <div class="card-body">
      <table class="table table-striped">
       
        <tr>
          <th>Id</th>
          <th>Image</th>
          <th>Nom Service</th>
          
          <th>Action</th>
          
        </tr>
        @if($service->isNotEmpty())
        @foreach($service as $ser)
        <tr valign ="middle">
          <td>{{$ser->id}}</td>
          <td>
          @if($ser->image != '' && file_exists(public_path().'/uploads/service/'.$ser->image))
           
           <img src="{{url('/uploads/service/'.$ser->image)}}" alt="" width="50" height="50" class="rounded-circle">
           @else
           <p>no</p>
           @endif
          </td>
          <td>{{$ser->serviceName}}</td>
          
          <td>
           
            <form id="service-edit-action-{{$ser->id}}" action="{{route('service.destory',$ser->id)}}" method ="post">
              @csrf
              @method('delete')
              <a href="{{route('service.edit',$ser->id)}}" class="btn btn-success  btn-sm">Edit</a>
              <button href="" onclick="deleteEquipement({{$ser->id}})"  type="submit"class="btn btn-danger btn-sm">Delete</button>
            </form>
          </td>
        </tr>
        @endforeach
        @else
        <tr>
          <td class="" colspan="6">
          Record Not Found
          </td>
        </tr>
        @endif
      </table>
    </div>
   </div>


 </div>
</div>
 
<script>
  function deleteEquipement(id){
    if(confirm("Are you sure you want to deleted ? ")){
      document.getElementById('service-edit-action-'+id).submit();
    }
  }
 </script>
@endsection