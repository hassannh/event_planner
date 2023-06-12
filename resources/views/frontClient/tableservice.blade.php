@extends('layouts.app')
<!DOCTYPE html>
<html lang="en">
<head>
  
    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/article.css') }}">
  <style>
    /* Style the icon */
.icon-button i {
  font-size: 20px;
  color: #D91B5C;
}

  </style>
</head>
@section('content')
<body>
     
  <div class="container-fluid d-flex justify-content-between">
        <div class="ms-4 mt-2">
         <button onclick="window.location.href='{{ url('frontClient/service') }} '" class="btn d-flex">
            <p class=" fw-bold" style=" color:  #FFFFFF;  background-color: #D91B5C;  width: 25px; height:  25px; border-radius: 50px;"><</p>
            <p class="fs-5  fw-bold Merriweather ps-2" style=" color:  #D91B5C;">Retour</p>
         </button>
        </div>
        <div class="logout me-4 mt-2  d-flex align-items-center">
            <ul class="navbar-nav navbar-nav-right">
                <script src="https://kit.fontawesome.com/cf08db5d6d.js" crossorigin="anonymous"></script>
                <li class="nav-item nav-profile ">
                    <a class="nav-link " href="#">
                        <i class="fa-regular fa-circle-user fs-3 pe-2 mt-1" style=" color:#D91B5C;"></i>
                        <span class="nav-profile-name Merriweather fs-5">{{Auth::user()->name}}</span>
                    </a>
                   
                </li>
            </ul>
           
        </div>
    </div>
    <div class="container mt-5">
    <table class="table">
        <thead>
          <tr style="background-color:#D91B5C;color:white">
            <th scope="col">Service</th>
            <th scope="col">Sous Service</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
            @foreach($eventServices as $eventService)
        <form action="{{ route('frontClient.facture')}}" method="GET">
                @csrf
          <tr>
            <th scope="row">{{ $eventService->Service_nom }}</th>
            <td>{{ $eventService->SousService_nom }}</td>
            <td>
                <a href="{{url('deleteService/'.$eventService->id) }}" class="icon-button"><i class="fa-solid fa-trash"></i></a>
            </td>
          </tr>
          @endforeach
        </tbody>
    </table>
     
       <div class="mt-5 d-flex justify-content-end ">      
        <button type="submit" class="bouton px-5 float-end">Suivant</button>
        </div>
      </form>

    </div>
   

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <!--Icon-->
    <script src="https://kit.fontawesome.com/8967e00685.js" crossorigin="anonymous"></script>
</body>
</html>
@endsection
