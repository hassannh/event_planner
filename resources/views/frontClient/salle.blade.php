@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.css">
    <link rel="stylesheet" href="{{ asset('assets/css/salle.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">

    <style>
        .card2 {
            display: inline-block;
            width: 25%;
        }
    </style>
</head>

<body>
    <script src="https://kit.fontawesome.com/cf08db5d6d.js" crossorigin="anonymous"></script>
    <div class="container-fluid d-flex justify-content-between">
        <div class="retour ms-4 mt-2">
            <!-- <button onclick="window.location.href='{{ url('/home') }}'" class="btn d-flex">
                <p class="retour bg-white fw-bold"><</p>
                <p class="fs-5 text-white fw-bold Merriweather ps-2">Retour</p>
            </button>-->
        </div>
        <div class="text-white me-4 mt-2 navbar-menu-wrapper d-flex align-items-center">
            <ul class="navbar-nav navbar-nav-right">
                <script src="https://kit.fontawesome.com/cf08db5d6d.js" crossorigin="anonymous"></script>
                <li class="nav-item nav-profile dropdown logout">
                    <a class="nav-link dropdown-toggle text-white" href="#" data-bs-toggle="dropdown" id="profileDropdown">
                        <i class="fa-regular fa-circle-user fs-3 pe-2 mt-1"></i>
                        <span class="nav-profile-name Merriweather fs-5">{{Auth::user()->name}}</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="mdi mdi-logout"></i> {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                <span class="mdi mdi-menu"></span>
            </button>
        </div>
    </div>
    <div class="container">
        <form action="{{ route('frontClient.storesalle')}}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <h4 class="mb-4 text-white text-uppercase fs-3 Merriweather fw-bold">les salles</h4>
                </div>
                <div id="salles" class="col-12">
                    <div class="slide-container swiper">
                        <div class="slide-content">
                            <div class="card-wrapper swiper-wrapper">
                                @if ($salles !== null)
                                @foreach($salles as $key => $salle)
                                <div class="card2 swiper-slide ms-5 {{ $key == 0 ? 'active' : '' }}">
                                    <div class="mt-4 mb-5">
                                        <div class="desc">{{ $salle->SalleName }}</div>
                                        <div class="images">
                                            <div id="carouselExampleIndicators" class="carousel slide slider" data-bs-ride="carousel">
                                                <div class="carousel-inner carousel">
                                                    <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                                        @if ($salle->ImageSalle)
                                                        <img src="{{ asset('uploads/salles/' . $salle->ImageSalle->images) }}" class="d-block w-100" alt="picture">
                                                        @endif
                                                    </div>

                                                </div>
                                            </div>
                                            <p class="text-capitalize">{{$salle->description}}</p>
                                        </div>
                                        <div class="pt-4">
                                            <input type="radio" name="salle_id" value="{{ $salle->id }}" {{ old('salle_id') == $salle->id ? 'checked' : '' }}>
                                            <label for="salle" style="color: #D91B5C;"> Choix</label><br>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="bouton px-5 float-end">Valider</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

</body>

</html>
@endsection