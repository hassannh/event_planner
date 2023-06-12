@extends('layouts.app')

<html>

<head>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/article.css') }}">
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>
@section('content')

<body>
    <script src="https://kit.fontawesome.com/cf08db5d6d.js" crossorigin="anonymous"></script>

    <div class="container-fluid d-flex justify-content-between">
        <div class="ms-4 mt-2">
            <button onclick="window.location.href='{{ url()->previous() }} '" class="btn d-flex">
                <p class=" fw-bold" style=" color:  #FFFFFF;  background-color: #D91B5C;  width: 25px; height:  25px; border-radius: 50px;">
                    < /p>
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


    <div class="py-3 py-md-5">
        <div class="container">
            <form action="{{ route('frontClient.storeArticle')}}" method="POST">
                @csrf
                <div class="row">
                    @if ($articles !== null)
                    @foreach ($articles as $article)
                    <div class="col-6 col-md-3">
                        <div class="equipement">
                            <a href="#" data-toggle="modal" data-target="#myModal-{{ $article->id }}">
                                <h5>{{ $article->name }}</h5>
                            </a>
                        </div>
                        <div class="ecran">
                            <a href="#" data-toggle="modal" data-target="#myModal-{{ $article->id }}">
                                <div id="carouselExampleIndicators-{{ $article->id }}" class="carousel slide slider" data-bs-ride="carousel">
                                    <ol class="carousel-indicators">
                                        @foreach ($article->images as $index => $image)
                                        <li data-target="#carouselExampleIndicators-{{ $article->id }}" data-slide-to="{{ $index }}" class="{{ $index == 0 ? 'active' : '' }}"></li>
                                        @endforeach
                                    </ol>
                                    <div class="carousel-inner">
                                        @foreach ($article->images as $index => $image)
                                        <div class="carousel-item{{ $index == 0 ? ' active' : '' }}">
                                            <img src="{{ asset('uploads/articles/'.$image->images) }}" class="d-block w-100" alt="...">
                                        </div>
                                        @endforeach
                                    </div>
                                    <a class="carousel-control-prev" href="#carouselExampleIndicators-{{ $article->id }}" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleIndicators-{{ $article->id }}" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            </a>
                            <!-- <input type="checkbox" name="articles[{{ $article->id }}]" class="ms-2" value="{{ $article->id}}" id="article-{{ $article->id }}"> {{ $article->typeArticle }} -->
                            <!-- <input type="number" placeholder="Quantité" class="ms-2" name="quantity[{{ $article->id }}]" style="width: 80px" min="0" disabled> <br> -->
                        </div>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="myModal-{{ $article->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <h5 class="modal-title ml-3">{{ $article->name }}</h5>
                                </div>

                                <div class="modal-body">
                                    <div id="carouselExampleIndicatorsModal-{{ $article->id }}" class="carousel slide slider" data-bs-ride="carousel">
                                        <ol class="carousel-indicators">
                                            @foreach ($article->images as $index => $image)
                                            <li data-target="#carouselExampleIndicatorsModal-{{ $article->id }}" data-slide-to="{{ $index }}" class="{{ $index == 0 ? 'active' : '' }}"></li>
                                            @endforeach
                                        </ol>
                                        <div class="carousel-inner">
                                            @foreach ($article->images as $index => $image)
                                            <div class="carousel-item{{ $index == 0 ? ' active' : '' }}">
                                                <img src="{{ asset('uploads/articles/'.$image->images) }}" class="d-block w-100" alt="...">
                                            </div>
                                            @endforeach
                                        </div>
                                        <a class="carousel-control-prev" href="#carouselExampleIndicatorsModal-{{ $article->id }}" role="button" data-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="#carouselExampleIndicatorsModal-{{ $article->id }}" role="button" data-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>
                                    <input type="checkbox" name="articles[{{ $article->id }}]" class="ms-2" value="{{ $article->id}}" id="article-{{ $article->id }}"> {{ $article->typeArticle }}
                                    <input type="number" placeholder="Quantité" class="ms-2" name="quantity[{{ $article->id }}]" style="width: 80px" min="0" disabled> <br>

                                    <p class="ms-2 mt-3 pb-3 pt-2 decsp text-capitalize">{{ $article->description }}</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Done</button>
                                </div>
                            </div>
                        </div>
                    </div>


                    @endforeach
                    @endif
                    <div class="mt-5 d-flex justify-content-end">
                        <button type="submit" class="bouton px-5 float-end">Suivant</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('.modal').on('shown.bs.modal', function() {
                $('.carousel').carousel({
                    interval: 2000 // Adjust the interval as per your requirement
                });
            });
        });
    </script>



    <!--enable disable the quantity input based on the checkbox state-->
    <script>
        const checkboxes = document.querySelectorAll('input[type="checkbox"]');
        checkboxes.forEach((checkbox) => {
            const articleId = checkbox.value;
            checkbox.addEventListener('change', (event) => {
                const quantityInput = document.querySelector('input[name="quantity[' + articleId + ']"]');
                quantityInput.disabled = !event.target.checked;
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>
@endsection