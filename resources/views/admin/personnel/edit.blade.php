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
                <div>
                    <h4 class="titre">Modifier Personnel</h4>
                </div>
                <div>
                    <a href="{{ url('admin/personnel') }}" class="bttn float-end">Retour</a>
                </div>
            </div>

            <div class="card-body">
                <form action="{{ route('personnel.update', $personnel->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="" class="mb-2">
                                Name:
                            </label>
                            <input type="text" name="NomPers" class="form-control @error('NomPers') is-invalid @enderror" value="{{ old('NomPers', $personnel->NomPers) }}" />
                            @error('NomPers')
                            <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="" class="mb-2">
                                Price:
                            </label>
                            <input type="text" name="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price', $personnel->price) }}" />
                            @error('price')
                            <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="" class="mb-2">
                                Description:
                            </label>
                            <textarea name="description" class="form-control @error('description') is-invalid @enderror">{{ old('description', $personnel->description) }}</textarea>
                            @error('description')
                            <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="" class="mb-2">
                                Image:
                            </label>
                            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" />
                            @error('image')
                            <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                            @if($personnel->image != '' && file_exists(public_path().'/uploads/personnel/'.$personnel->image))
           
           <img src="{{url('/uploads/personnel/'.$personnel->image)}}" alt="" width="100" height="100" class="pt-3">
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
