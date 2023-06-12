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
        <div><h4 class="titre">List des Salles</h4></div>
        <div><a href="{{route('salle.create')}}" class="bttn float-end">Ajouter Salle</a></div>
    </div>
    
    <div class="card-body">
    @if(Session::has('success'))
        <div class="alert alert-success">{{ Session::get('success') }}</div>
    @endif
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Capacity</th>
                    <th>Description</th>
                    <th>Images</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($salles as $salle)
                <tr>
                    <td>{{ $salle->id }}</td>
                    <td>{{ $salle->SalleName }}</td>
                    <td>{{ $salle->price }}</td>
                    <td>{{ $salle->capacite }}</td>
                    <td>{{ $salle->description }}</td>
                    <td>
                        @foreach($salle->salleimages as $image)
                            <img src="{{ asset('uploads/salles/'.$image->images) }}" alt="" width="50" height="50">
                        @endforeach
                    </td>
                    <td>
                        <a href="{{ route('salle.edit', $salle->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('salle.destroy', $salle->id) }}" method="POST" class="d-inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    </div>
   </div>
 </div>
 </div>
 
@endsection   
