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
        <div><h4 class="titre">Equipements</h4></div>
        <div><a href="{{url('admin/equipement/create')}}" class="bttn float-end" >Ajouter Equipement</a></div>
    </div>

  
      @if(Session::has('success'))
    <div class="alert alert-success ">{{Session::get('success')}}</div> @endif
    <div class="card-body">
      <table class="table table-striped">
       
        <tr>
          <th>Id</th>
          <th>Image</th>
          <th>Nom d'Equipement</th>
          <th>Sous Titre</th>
          <th>Action</th>
          
        </tr>
        @if($equipements->isNotEmpty())
        @foreach($equipements as $equipement)
        <tr valign ="middle">
          <td>{{$equipement->id}}</td>
          <td>
            @if($equipement->image != '' && file_exists(public_path().'/uploads/equipement/'.$equipement->image))
           
           <img src="{{url('/uploads/equipement/'.$equipement->image)}}" alt="" width="50" height="50" class="rounded-circle">
           @else
            @endif
            
          </td>
          <td>{{$equipement->nameEquipement}}</td>
          <td>{{$equipement->slug}}</td>
          <td>
           
            <form id="equipement-edit-action-{{$equipement->id}}" action="{{route('equipement.destory',$equipement->id)}}" method ="post">
              @csrf
              @method('delete')
              <a href="{{route('equipement.edit',$equipement->id)}}" class="btn btn-success  btn-sm">Edit</a>
              <button href="" onclick="deleteEquipement({{$equipement->id}})" type="submit"class="btn btn-danger  btn-sm">Delete</button>
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
      document.getElementById('equipement-edit-action-'+id).submit();
    }
  }
 </script>
@endsection