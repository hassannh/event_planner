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
        <div><h4 class="titre">Articles</h4></div>
        <div><a href="{{url('admin/articles/create')}}" class="bttn float-end" >Ajouter Article</a></div>
    </div>

    @if(Session::has('success'))
    <div class="alert alert-success ">{{Session::get('success')}}</div> @endif
    <div class="card-body">
      <table class="table table-striped">
       
        <tr>
          <th>Id</th>
          <th>Equipement</th>
          <th>Nom Article</th>
          <th>Prix</th>
          <th>Description</th>
          <th>Action</th>
          
        </tr>
        @forelse ($articles as $article)
          <tr>
            <td>{{$article->id}}</td>
            <td>{{$article->equipement->nameEquipement}}</td>
            <td>{{$article->name}}</td>
            <td>{{$article->price}} </td>
            <td>{{$article->description}}</td>

            <td>
            <form action="{{route('articles.destroy',$article->id)}}" method="post">
            @csrf
            @method('delete')
            <a href="{{url('admin/articles/'.$article->id.'/edit')}}" class="btn btn-success  btn-sm">Edit</a>
            <button onclick="return confirm('Are you Sure , You want to delete this data ?')" type="submit"class="btn btn-danger  btn-sm">Delete</button>
            </form>
            </td>

          </tr>
        @empty
          <tr>
            <td colspan>No Products Available</td>
          </tr>
        @endforelse
      </table>
    </div>
   </div>


 </div>
</div>
<script>
  function deleteEquipement(id){
    if(confirm("Are you sure you want to deleted ? ")){
      document.getElementById('equipement-edit-action-'+id).submit();
    }
  }
 </script>
@endsection