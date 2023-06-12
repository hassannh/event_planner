@extends('layouts.frontslide')

@section('content')

<!DOCTYPE html>
<html>
<head>
   
    <link rel="stylesheet" href="{{ asset('assets/css/frontend.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
</head>
<body>
    <div class="d-flex justify-content-center">
        <div>
            <h1 class="titre">Les salles</h1>
        </div>
       
    </div>

	<div id="carouselExampleIndicators" class="carousel slide slider" data-bs-ride="carousel">
    <div class="cadre">
    <div class="carousel-inner">
        @foreach ($salles as $key => $salle)
            @foreach ($salle->salleimages as $image)
                <div class="carousel-item {{ $loop->parent->first && $loop->first ? 'active' : '' }}">
                    <img src="{{ url('/uploads/salles/' . $image->images) }}" class="d-block w-100" alt="{{ $salle->SalleName }}">
                </div>
            @endforeach
        @endforeach
    </div>
</div>
    <a class="carousel-control-prev  mt-5" href="#carouselExampleIndicators" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only"></span>
    </a>
    <a class="carousel-control-next  mt-5 me-3" href="#carouselExampleIndicators" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only"></span>
    </a>
</div>


    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#salle_select').on('change', function() {
                var selected_salle_id = $(this).val();
                $('.carousel-item').removeClass('active');
                $('.carousel-item[data-salle-id="' + selected_salle_id + '"]').first().addClass('active');
            });
        });
    </script>
</body>
</html>

@endsection
