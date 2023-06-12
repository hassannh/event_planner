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
        <div><h4 class="titre">Ajouter nouveau Type</h4></div>
        <div><a href="{{url('admin/typeevent')}}" class="bttn float-end">Retour</a></div>
    </div>
    
    <div class="card-body">
      <form action="{{url('admin/typeevent')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
        <div class="col-md-6 mb-3">
            <label for="" class="mb-2">
                Nom de Type :
            </label>
            <input type="text" name="TypeName" class="form-control @error('TypeName') is-invalid @enderror" value="{{old('TypeName')}}"  />
            @error('TypeName')
            <p class="invalid-feedback">{{$message}}</p>
            @enderror
           
        </div>
      
        
        </div>
        
        <button  class="bttn float-end">Valider</button>
      </form>
    </div>
   </div>
 </div>
 </div>
 
@endsection