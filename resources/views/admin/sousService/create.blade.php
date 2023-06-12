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
        <div><h4 class="titre">Ajouter sous Service</h4></div>
        <div><a href="{{route('sousService.index')}}" class="bttn float-end">Retour</a></div>
    </div>
    
    <div class="card-body">
    <form action="{{url('admin/sousService')}}" method="POST" enctype="multipart/form-data">
        @csrf
     
        <div class="col-md-6 mb-3">
            <label for="" class="mb-2">
            sous Service
            </label>
             <select name="service_id" id=""class="form-select @error('serviceName') is-invalid @enderror" value="{{old('serviceName')}}">
            
             @foreach($service as $ser)
                <option value="{{$ser->id}}">{{$ser->serviceName}}</option>
                @error('serviceName')
               <p class="invalid-feedback">{{$message}}</p>
                @enderror
            @endforeach
                
             </select>
           
           
        </div>

        <div class="row">
        <div class="col-md-6 mb-3">
            <label for="" class="mb-2">
                Nom sous Service :
            </label>
            <input type="text" name="typeName" class="form-control @error('typeName') is-invalid @enderror" value="{{old('typeName')}}"  />
            @error('typeName')
            <p class="invalid-feedback">{{$message}}</p>
            @enderror
           
        </div>
       

        <div class="col-md-6 mb-3">
            <label for="" class="mb-2">
                Prix sous Service :
            </label>
            <input type="number" name="price" class="form-control @error('price') is-invalid @enderror" value="{{old('price')}}"/>
            @error('price')
            <p class="invalid-feedback">{{$message}}</p>
            @enderror
        </div>
        </div>

        <div class="col-md-6 mb-3">
            <label for="" class="mb-2">
                Description :
            </label>
            <textarea class="form-control @error('description') is-invalid @enderror" name="description" placeholder="Description . . ." id="floatingTextarea2" style="height: 80px">{{old('description')}}</textarea>
            @error('description')
            <p class="invalid-feedback">{{$message}}</p>
            @enderror
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
        
       
        
        <button  type="submit"  class="bttn  float-end">Valider</button>
      </form>
    </div>
   </div>
 </div>
 </div>
 
@endsection