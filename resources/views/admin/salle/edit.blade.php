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
        <div><h4 class="titre">Modifier Salle</h4></div>
        <div><a href="{{route('salle.index')}}" class="bttn float-end">Retour</a></div>
    </div>
    @if(Session::has('success'))
    <div class="alert alert-success ">{{Session::get('success')}}</div> @endif
    <div class="card-body">
    <form action="{{route('salle.update', $salle->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row">
        <div class="col-md-6 mb-3">
            <label for="" class="mb-2">
                Nom salle :
            </label>
            <input type="text" name="SalleName" class="form-control @error('SalleName') is-invalid @enderror" value="{{ $salle->SalleName }}"  />
            @error('SalleName')
            <p class="invalid-feedback">{{$message}}</p>
            @enderror
           
        </div>
       

        <div class="col-md-6 mb-3">
            <label for="" class="mb-2">
                Prix Salle :
            </label>
            <input type="number" name="price" class="form-control @error('price') is-invalid @enderror" value="{{ $salle->price }}"/>
            @error('price')
            <p class="invalid-feedback">{{$message}}</p>
            @enderror
        </div>
        </div>

        <div class="row">
        <div class="col-md-6 mb-3">
            <label for="" class="mb-2">
                Description :
            </label>
            <textarea class="form-control @error('description') is-invalid @enderror" name="description" placeholder="Description . . ." id="floatingTextarea2" style="height: 80px">{{ $salle->description }}</textarea>
            @error('description')
            <p class="invalid-feedback">{{$message}}</p>
            @enderror
        </div>

        <div class="col-md-6 mb-3">
            <label for="" class="mb-2">
               Capacité de la salle:
            </label>
            <input type="number" name="capacite" class="form-control @error('capacite') is-invalid @enderror" value="{{ $salle->capacite }}"/>
            @error('capacite')
            <p class="invalid-feedback">{{$message}}</p>
            @enderror
        </div>
        </div>
        
        <div class="col-md-6 mb-3">
            <label for="" class="mb-2">
              upload article image :
            </label>
            <input type="file" multiple name="images[]" class="form-control @error('images') is-invalid @enderror" value="{{old('images')}}"/>
            @error('images')
            <p class="invalid-feedback">{{$message}}</p>
            @enderror
        </div>
        <div>
            @if($salle->salleimages)
            <div class="row">
            @foreach($salle->salleimages as $image)
                <div class="col-md-2">
                <img src="{{asset('/uploads/salles/'.$image->images)}}" style="width: 80px;height: 80px;"class="me-4 "  alt="">
                <a href="{{url('admin/salles-image/'.$image->id.'/delete')}}">Remove</a>
                </div>
                @endforeach
            </div>
            
          
            @else
            <h5>No image added</h5>
            @endif
           
            
        </div>
       
        
        <button  type="submit"  class="bttn  float-end">Valider</button>
      </form>
    </div>
   </div>
 </div>
 </div>
 
@endsection   
