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
        <div><h4 class="titre">Type d'événement</h4></div>
        <div><a href="{{url('admin/typeevent/create')}}" class="bttn float-end" >Ajouter Type d'événement</a></div>
    </div>

  
      @if(Session::has('success'))
    <div class="alert alert-success ">{{Session::get('success')}}</div> @endif
    <div class="card-body">
      <table class="table table-striped">
       
        <tr>
          <th>Id</th>
          <th>Nom d'événement</th>
          <th>Action</th>
          
        </tr>
        @if($typeevent->isNotEmpty())
        @foreach($typeevent as $typeevente)
        <tr valign ="middle">
          <td>{{$typeevente->id}}</td>
         
          <td>{{$typeevente->TypeName}}</td>

          <td>
            <form action="{{route('typeevent.destory',$typeevente->id)}}" method="post">
            @csrf
            @method('delete')
            
            <button onclick="return confirm('Are you Sure , You want to delete this data ?')" type="submit"class="btn btn-danger  btn-sm">Delete</button>
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
 

@endsection