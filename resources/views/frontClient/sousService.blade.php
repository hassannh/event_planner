@extends('layouts.app')

@section('content')
<html>
<head>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/article.css') }}">
</head>
<body>
    <script src="https://kit.fontawesome.com/cf08db5d6d.js" crossorigin="anonymous"></script>

    <div class="container-fluid d-flex justify-content-between">
        <div class="ms-4 mt-2">
            <button onclick="window.location.href='{{ url('frontClient/service') }}'" class="btn d-flex">
                <p class="fw-bold" style="color: #FFFFFF; background-color: #D91B5C; width: 25px; height: 25px; border-radius: 50px;"><</p>
                <p class="fs-5 fw-bold Merriweather ps-2" style="color: #D91B5C;">Retour</p>
            </button>
        </div>
        <div class="logout me-4 mt-2 d-flex align-items-center">
            <ul class="navbar-nav navbar-nav-right">
                <script src="https://kit.fontawesome.com/cf08db5d6d.js" crossorigin="anonymous"></script>
                <li class="nav-item nav-profile ">
                    <a class="nav-link " href="#">
                        <i class="fa-regular fa-circle-user fs-3 pe-2 mt-1" style="color: #D91B5C;"></i>
                        <span class="nav-profile-name Merriweather fs-5">{{ Auth::user()->name }}</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <div class="py-3 py-md-5">
        <div class="container">
            <form action="{{ route('frontClient.SousService') }}" method="POST">
                @csrf
                <div class="row">
                    @foreach ($sousServices as $sousService)
                        <div class="col-6 col-md-3">
                            <div class="equipement">
                                <a><h5>{{ $sousService->typeName }}</h5></a>
                            </div>
                            <div class="ecran">
                                <div id="carouselExampleIndicators" class="carousel slide slider" data-bs-ride="carousel">
                                    <div class="carousel-inner carousel">
                                        @foreach ($sousService->sousServiceImages as $key => $image)
                                            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                                <img src="{{ asset('/uploads/sousService/'.$image->images) }}" class="d-block w-100" alt="...">
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                                <input type="checkbox" class="ms-3" name="sousServices[{{ $sousService->id }}]" value="{{ $sousService->id }}" id="sousService-{{ $sousService->id }}"> {{ $sousService->typeService }}
                                <label for="decor" style="color: #D91B5C; font-size:20px; font-family: 'Courier New', Courier, monospace;"> Choix</label>
                                 
                                <p style="color: #000000;" class="ms-2 pb-3 pt-2 decsp text-capitalize">{{ $sousService->description }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="mt-5 d-flex justify-content-end ">      
                    <button type="submit" class="bouton px-5 float-end">Suivant</button>
                </div>
            </form>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>

@endsection
