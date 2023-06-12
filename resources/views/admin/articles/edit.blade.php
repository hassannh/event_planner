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
        <div><h4 class="titre">Modifier Articles</h4></div>
        <div><a href="{{route('articles.index')}}" class="bttn float-end">Retour</a></div>
    </div>
    @if(Session::has('success'))
    <div class="alert alert-success ">{{Session::get('success')}}</div> @endif
    <div class="card-body">
    <form action="{{url('admin/articles/'.$article->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="col-md-6 mb-3">
            <label for="" class="mb-2">
                Equipement
            </label>
             <select name="equipement_id" id=""class="form-select @error('nameEquipement') is-invalid @enderror" value="{{old('nameEquipement')}}">
            
             @foreach($equipements as $equipement)
                <option value="{{$equipement->id}}"{{$equipement->id == $article->equipement_id ? 'selected':''}} >
                    {{$equipement->nameEquipement}}
                </option>
                @error('nameEquipement')
               <p class="invalid-feedback">{{$message}}</p>
                @enderror
            @endforeach 
                
             </select>
           
           
        </div>

        <div class="row">
        <div class="col-md-6 mb-3">
            <label for="" class="mb-2">
                Nom Article :
            </label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{$article->name}}"  />
            @error('name')
            <p class="invalid-feedback">{{$message}}</p>
            @enderror
           
        </div>
       

        <div class="col-md-6 mb-3">
            <label for="" class="mb-2">
                Prix Article :
            </label>
            <input type="number" name="price" class="form-control @error('price') is-invalid @enderror" value="{{$article->price}}"/>
            @error('price')
            <p class="invalid-feedback">{{$message}}</p>
            @enderror
        </div>
        </div>

        <div class="col-md-6 mb-3">
            <label for="" class="mb-2">
                Description :
            </label>
            <textarea class="form-control @error('description') is-invalid @enderror" name="description" placeholder="Description . . ." id="floatingTextarea2" style="height: 80px">{{$article->description}}</textarea>
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
            @if($article->Articleimages)
            <div class="row">
               @foreach ($article->Articleimages as $image)
                <div class="col-md-2">
                <img src="{{asset('/uploads/articles/'.$image->images)}}" style="width: 80px;height: 80px;"class="me-4 "  alt="">
                <a href="{{url('admin/articles-image/'.$image->id.'/delete')}}">Remove</a>
                </div>
                @endforeach
            </div>
            
          
            @else
            <h5>No image added</h5>
            @endif
           
            
        </div>
        
       
        
        <button  type="submit"  class="bttn  float-end">Modifier</button>
      </form>
    </div>
   </div>
 </div>
 </div>
 
@endsection