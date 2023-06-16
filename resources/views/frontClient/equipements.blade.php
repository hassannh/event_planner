@extends('layouts.app')
<html>
<head>
<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/equipement.css') }}">
</head>
@section('content')
<body>
    <div class="container-fluid d-flex justify-content-between">
        <div class="retour ms-4 mt-2">
         <button onclick="window.location.href='{{ url('frontClient/salle') }}'" class="btn d-flex">
            <p class="retour   bg-white fw-bold"><</p>
            <p class="fs-5 text-white fw-bold Merriweather ps-2">Retour</p>
         </button>
        </div>
        <div class="logout me-4 mt-2  d-flex align-items-center">
            <ul class="navbar-nav navbar-nav-right">
                <script src="https://kit.fontawesome.com/cf08db5d6d.js" crossorigin="anonymous"></script>
                <li class="nav-item nav-profile ">
                    <a class="nav-link " href="#" 
                      >
                        <i class="fa-regular fa-circle-user fs-3 pe-2 mt-1" style=" color:#FFFFFF;"></i>
                        <span class="nav-profile-name Merriweather fs-5">{{Auth::user()->name}}</span>
                    </a>
                   
                </li>
            </ul>
           
        </div>
    </div>
   
</body>
@endsection
