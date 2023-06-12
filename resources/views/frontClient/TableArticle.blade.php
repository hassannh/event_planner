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
         <button onclick="window.location.href='{{ url('frontClient/equipement') }} '" class="btn d-flex">
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
            <th scope="col">Mes Equipement</th>
            <th scope="col">Mes choix</th>
            <th scope="col">Quantite</th>
            <th></th>
          </tr>
        </thead>
        <tbody class="text-capitalize">
            @foreach($eventArticles as $eventArticle)
          <tr>
            <th scope="row">{{ $eventArticle->equipement_nom }}</th>
            <td>{{ $eventArticle->article_nom }}</td>
            <form action="{{ route('updateArticle', ['id' => $eventArticle->id]) }}" method="POST">
                @csrf
            <td>
                <input style="border:none;background-color:white;text-align:center;width: 80px" name="quantity[{{ $eventArticle->id }}]" class="editable-quantity" data-article-id="{{ $eventArticle->id }}" value="{{ $eventArticle->quantite }}" disabled>
            </td>
           
            <td>
                <a href="{{ url('deleteArticle/'.$eventArticle->id) }}" class="icon-button pe-3"><i class="fa-solid fa-trash"></i></a>
                <span id="{{ $eventArticle->id }}" onclick="enableQuantityInput(this)" class="icon-button edit-btn"><i class="fa-solid fa-pen-to-square"></i></span>
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
    <script>
        function enableQuantityInput(element) {
            var quantityInputs = document.querySelectorAll('.editable-quantity');
            // Disable all other inputs
        for (var i = 0; i < quantityInputs.length; i++) {
            if (quantityInputs[i] !== element.parentNode.parentNode.querySelector('.editable-quantity')) {
                quantityInputs[i].disabled = true;
                quantityInputs[i].style.border = "none"; // Remove border style
            }
        }

        var quantityInput = element.parentNode.parentNode.querySelector('.editable-quantity');
        quantityInput.disabled = false;
        quantityInput.style.border = "2px solid black"; // Add border style
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <!--Icon-->
    <script src="https://kit.fontawesome.com/8967e00685.js" crossorigin="anonymous"></script>
</body>
</html>
@endsection
