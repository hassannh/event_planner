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
        <div><h4 class="titre">Modifier Equipements</h4></div>
        <div><a href="{{url('admin/equipement')}}" class="bttn float-end">Retour</a></div>
    </div>
    
    <div class="card-body">
      <form action="{{route('equipement.update',$equipement->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="row">
        <div class="col-md-6 mb-3">
            <label for="" class="mb-2">
                Nom d'Equipement :
            </label>
            <input type="text" name="nameEquipement" class="form-control @error('nameEquipement') is-invalid @enderror" value="{{old('nameEquipement',$equipement->nameEquipement)}}"  />
            @error('nameEquipement')
            <p class="invalid-feedback">{{$message}}</p>
            @enderror
           
        </div>
        <div class="col-md-6 mb-3">
            <label for="" class="mb-2">
                Sous Titre :
            </label>
            <input type="text" name="slug" class="form-control @error('slug') is-invalid @enderror" value="{{old('slug',$equipement->slug)}}"/>
            @error('slug')
            <p class="invalid-feedback">{{$message}}</p>
            @enderror
        </div>
        <div class="col-md-6 mb-3">
            <label for="" class="mb-2">
               image :
            </label>
            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror"/>
            @error('image')
            <p class="invalid-feedback">{{$message}}</p>
            @enderror
            @if($equipement->image != '' && file_exists(public_path().'/uploads/equipement/'.$equipement->image))
           
           <img src="{{url('/uploads/equipement/'.$equipement->image)}}" alt="" width="100" height="100" class="pt-3">
           @else
           @endif
        </div>
        
        </div>
        
        <button  class="bttn  float-end">Modifier</button>
      </form>
    </div>
   </div>
 </div>
 </div>
@endsection