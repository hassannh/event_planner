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
        <div><h4 class="titre">Ajouter Services</h4></div>
        <div><a href="{{url('admin/service')}}" class="bttn float-end">Retour</a></div>
    </div>
    
    <div class="card-body">
      <form action="{{url('admin/service')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
        <div class="col-md-6 mb-3">
            <label for="" class="mb-2">
                Nom Service :
            </label>
            <input type="text" name="serviceName" class="form-control @error('serviceName') is-invalid @enderror" value="{{old('serviceName')}}"  />
            @error('serviceName')
            <p class="invalid-feedback">{{$message}}</p>
            @enderror
           
        </div>
       
        <div class="col-md-6 mb-3">
            <label for="" class="mb-2">
               image :
            </label>
            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" value="{{old('image')}}"/>
            @error('image')
            <p class="invalid-feedback">{{$message}}</p>
            @enderror
        </div>
        
        </div>
        
        <button  class="bttn  float-end">Valider</button>
      </form>
    </div>
   </div>
 </div>
 </div>
 
@endsection