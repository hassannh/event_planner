@extends('layouts.frontslide')

@section('content')


<html>
    <head>
    <link rel="stylesheet" href="{{ asset('assets/css/frontend.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    </head>
<body>
       
<div id="carouselExampleIndicators" class="carousel slide slider" data-bs-ride="carousel">
<div class="d-flex justify-content-center">
 <h1 class="titre "> les Services</h1>
 </div>

 <div class="cadre">
 <div class="carousel-inner">
   @foreach ( $Services as $key => $Service)
   <div class="carousel-item {{ $key == 0 ? 'active':''}}">
     <img src="{{url('/uploads/service/'.$Service->image)}}" class="d-block w-100 " alt="...">
     <div class="carousel-caption d-none d-md-block">
    
     </div>
   </div>
   @endforeach
</div>
 </div>
 <button class="carousel-control-prev  mt-5" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
   <span class="carousel-control-prev-icon" aria-hidden="true"></span>
   <span class="visually-hidden">Previous</span>
 </button>
 <button class="carousel-control-next  mt-5 me-3" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
   <span class="carousel-control-next-icon" aria-hidden="true"></span>
   <span class="visually-hidden">Next</span>
 </button>
</div>

</body>
</html>
@endsection