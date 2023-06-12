<head>
<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/formAdmin.css') }}">
</head>
@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div>
                    <h4 class="titre">Ajouter Personnel</h4>
                </div>
                <div>
                    <a href="{{ url('admin/personnel') }}" class="bttn float-end">Retour</a>
                </div>
            </div>

            <div class="card-body">
                <form action="{{ url('admin/personnel') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="" class="mb-2">
                                Nom Personnel:
                            </label>
                            <input type="text" name="NomPers" class="form-control @error('NomPers') is-invalid @enderror" value="{{ old('NomPers') }}" />
                            @error('NomPers')
                                <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="" class="mb-2">
                                Prix Personnel:
                            </label>
                            <input type="number" name="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price') }}"/>
                            @error('price')
                                <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="" class="mb-2">
                            Description :
                        </label>
                        <textarea class="form-control @error('description') is-invalid @enderror" name="description" placeholder="Description . . ." id="floatingTextarea2" style="height: 80px">{{ old('description') }}</textarea>
                        @error('description')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="" class="mb-2">
                            Upload personnel image:
                        </label>
                        <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" value="{{ old('image') }}"/>
                        @error('image')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit" class="bttn float-end">Valider</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
