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
        <div><h4 class="titre">Modifier sousService</h4></div>
        <div><a href="{{route('sousService.index')}}" class="bttn float-end">Retour</a></div>
    </div>
    @if(Session::has('success'))
    <div class="alert alert-success ">{{Session::get('success')}}</div> @endif
    <div class="card-body">
    <form action="{{ route('sousService.update', $sousService->id)}}" method="post" enctype="multipart/form-data">
        @csrf
       @method('put')
       
        <div class="col-md-6 mb-3">
        
            <label for="" class="mb-2">
                Service
            </label>
             <select name="service_id" id=""class="form-select @error('serviceName') is-invalid @enderror" value="{{old('serviceName')}}">
            
             @foreach($service as $ser)
                <option value="{{$ser->id}}"{{$ser->id == $sousService->service_id ? 'selected':''}} >
                    {{$ser->serviceName}}
                </option>
                @error('serviceName')
               <p class="invalid-feedback">{{$message}}</p>
                @enderror
            @endforeach 
                
             </select>
           
           
        </div>

        <div class="row">
        <div class="col-md-6 mb-3">
            <label for="" class="mb-2">
                Nom sousService :
            </label>
            <input  type="text" name="typeName" class="form-control @error('typeName') is-invalid @enderror" value="{{$sousService->typeName}}"  />
            @error('typeName')
            <p class="invalid-feedback">{{$message}}</p>
            @enderror
           
        </div>
       

        <div class="col-md-6 mb-3">
            <label for="" class="mb-2">
                Prix sousService :
            </label>
            <input type="number" name="price" class="form-control @error('price') is-invalid @enderror" value="{{$sousService->price}}"/>
            @error('price')
            <p class="invalid-feedback">{{$message}}</p>
            @enderror
        </div>
        </div>

        <div class="col-md-6 mb-3">
            <label for="" class="mb-2">
                Description :
            </label>
            <textarea class="form-control @error('description') is-invalid @enderror" name="description" placeholder="Description . . ." id="floatingTextarea2" style="height: 80px">{{$sousService->description}}</textarea>
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
        <div>
            @if($sousService->sousServiceimages)
            <div class="row">
               @foreach ($sousService->sousServiceimages as $image)
                <div class="col-md-2">
                <img src="{{asset('/uploads/sousService/'.$image->images)}}" style="width: 80px;height: 80px;"class="me-4 "  alt="">
                <a href="{{url('admin/sousService-image/'.$image->id.'/delete')}}">Supprimer</a>
                </div>
                @endforeach
            </div>
            
          
            @else
            <h5>No image added</h5>
            @endif
           
            
        </div>
        
        {{ method_field('PUT') }}
        
        <button  type="submit"  class="bttn  float-end">Modifier</button>
      </form>
    </div>
   </div>
 </div>
 </div>
 
@endsection