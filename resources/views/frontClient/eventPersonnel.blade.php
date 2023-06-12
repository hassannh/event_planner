<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/css/article.css') }}">
    <style>
.inputs{
  border:none;
  background-color: rgba(212, 211, 211, 0.623);
}
.inputs:focus {
  border: 1px solid rgb(201, 201, 201);

}
.line{
  text-decoration:none;
}

h2{
  color:  #D91B5C;
  font-family: 'Merriweather';
  
  
}
img{
  border-radius: 20px;
  width: 350px;
  border: 3px solid #D91B5C;
}
.error{
    color:red;
}
.button-image{
    background-image: url('');
    background-size: cover;
    background-repeat: no-repeat;
    color: #fff; /* Set the text color of the button to be visible on the background image */
  padding: 10px 20px; /* Set the padding of the button to make it more visually appealing */
  border: none;
}
    </style>
</head>
<body>
<div class="container-fluid d-flex justify-content-between">
        <div class="ms-4 mt-2">
         <button onclick="window.location.href='{{ url()->previous() }} '" class="btn d-flex">
            <p class=" fw-bold" style=" color:  #FFFFFF;  background-color: #D91B5C;  width: 25px; height:  25px; border-radius: 50px;"><</p>
            <p class="fs-5  fw-bold Merriweather ps-2" style=" color:  #D91B5C;">Retour</p>
         </button>
        </div>
        <div class="logout me-4 mt-2  d-flex align-items-center">
            <ul class="navbar-nav navbar-nav-right">
                <script src="https://kit.fontawesome.com/cf08db5d6d.js" crossorigin="anonymous"></script>
                <li class="nav-item nav-profile ">
                    <a class="nav-link " href="#" 
                      >
                        <i class="fa-regular fa-circle-user fs-3 pe-2 mt-1" style=" color:#D91B5C;"></i>
                        <span class="nav-profile-name Merriweather fs-5">{{Auth::user()->name}}</span>
                    </a>
                   
                </li>
            </ul>
           
        </div>
    </div>
    <div class="container pt-4">
      
        <div class="row">
          <div class="col-lg mx-5">
            <div class="card text-center mx-5">
              <div class="card-body">
              <h2>{{ $personnelEvents->NomPers }}</h2>
                <form class="mt-4" method="POST" action="{{ route('frontClient.storePersonnelEvent')}}">
                    @csrf
                  <div class="row">
                    <div class="col" >
                        <img src="{{ asset('/uploads/personnel/'.$personnelEvents->image) }}" width= "200" height="200"><br><br>
                       <label class="sexe" for=""> Homme :</label> <input type="number" name="nbrHomme" style="width: 80px" min="0"> 
                       <label class="sexe ps-3" for=""> Femme :</label><input type="number" name="nbrFemme" style="width: 80px" min="0"> <br>
                       <label class="description pt-3">Description </label><br>
                        <p class="decsp pt-3">{{ $personnelEvents->description}}</p>
                        <input type="hidden" name="personnel_id" value="{{ $id }}">
                  </div>
                  </div>
                @if ($errors->has('message'))
                    <div class="alert alert-danger">{{ $errors->first('message') }}</div>
                @endif
                <div class="mt-3">
                  <a href="{{ url('frontClient/personnels') }}" class="bouton line px-5" style="margin-right: 5px;">Annuler</a>
                  <button type="submit" class="bouton px-5">Valider</button>
                </div>
              </form>
              </div>
            </div>
          </div>
        </div>
      </div>
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
