@extends('layouts.app')

@section('content')
<html>
<head>
<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/equipement.css') }}">
</head>
<body>
    <div class="container-fluid d-flex justify-content-between">
        <div class="retour ms-4 mt-2">
            <button onclick="window.location.href='{{ url('frontClient/personnels') }}'" class="btn d-flex">
                <p class="retour   bg-white fw-bold"><</p>
                <p class="fs-5 text-white fw-bold Merriweather ps-2">Retour</p>
            </button>
        </div>
        <div class="logout me-4 mt-2  d-flex align-items-center">
            <ul class="navbar-nav navbar-nav-right">
                <script src="https://kit.fontawesome.com/cf08db5d6d.js" crossorigin="anonymous"></script>
                <li class="nav-item nav-profile">
                    <a class="nav-link" href="#">
                        <i class="fa-regular fa-circle-user fs-3 pe-2 mt-1" style="color:#FFFFFF;"></i>
                        <span class="nav-profile-name Merriweather fs-5">{{ Auth::user()->name }}</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
   
    <div class="py-3 py-md-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="mb-5 mt-2 text-white text-uppercase fs-3 Merriweather fw-bold">les Services</h4>
                </div>
                <form class="" method="POST" action="{{ route('frontClient.storeService') }}">
                @csrf
                <div class="row">
                    @foreach($services as $service)
                        <div class="col-6 col-md-3">
                            <div class="equipement">
                                <a href="{{ url('frontClient/SousService', ['id' => $service->id]) }}">
                                    <h5>{{ $service->serviceName }}</h5>
                                </a>
                            </div>
                            <div class="category-card">
                                <a href="{{ url('frontClient/SousService', ['id' => $service->id]) }}">
                                    <div class="category-card-img">
                                        <img src="{{ asset('/uploads/service/'.$service->image) }}" class="w-100 h-100">
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="d-flex justify-content-end mb-5 me-5">
                    <button type="submit" class="bouton px-5">Valider</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

@endsection
