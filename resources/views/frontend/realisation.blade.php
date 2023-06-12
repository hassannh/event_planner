<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="{{ asset('assets/css/realisation.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
</head>

<body>

  <!--Navbar-->
  <nav class="navbar navbar-expand-lg pt-3 navbar-dark position-fixed w-100">
    <div class="container-fluid">
      <a class="navbar-brand"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto  mb-2 mb-lg-0">
          <li class="nav-item pe-3">
            <a class="nav-link active" aria-current="page" href="{{url('/')}}">Acceuil</a>
          </li>
          <li class="nav-item pe-3">
            <a class="nav-link active" href="{{url('/frontend/realisation')}}">Réalisations</a>
          </li>


          <li class="nav-item pe-3">
            <a class="nav-link active " href="{{url('/frontend/contact')}}">Contact</a>
          </li>
          <li class="nav-item pe-3">
            <a class="nav-link active" href="#" onclick="window.location.href='{{ route('login') }}'">Connexion</a>
          </li>
        </ul>

        <button class="bouton fw-bold me-2" onclick="window.location.href='{{ route('login') }}'" type="submit">Budgétiser votre événement</button>

      </div>
    </div>
  </nav>


  <!--Realisation-->
  <div class="container-fluid banner pt-5">
    <div class="row">
      <div class="col-11">
        <div class="hero  text-white  Merriweather text-uppercase">
          <div class="d-flex justify-content-center">
            <div>
              <h1 class="fw-bold mt-5" style="text-align: center">REALISATION</h1>
              <p class="  text-center text-light mt-4">Le bonheur tient aux événements, la félicité tient aux affections</p>
              <div class="pt-4 text-capitalize d-flex justify-content-center ">

              </div>
            </div>
          </div>

        </div>
      </div>





    </div>
  </div>
  <!--Slide images-->
  <div class="container">
    <div class="mt-4 mt-sm-5 ">
      <div class="font-monospace fs-5 d-inline titre">
        Nos Réalisations
      </div>
      <p class="line mb-0"></p>
    </div>

  </div>
  <!--Event 1 -->
  <div class="container back mt-5">
    <div class="item">
      <div class="text">
        <h5 class=" text-event-1 text-uppercase Merriweather fs-3">E-market expo </h5>
        <p class=" text-event-1 pt-5 font-monospace">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
      </div>
      <div class="pic">
        <img class="image1">
      </div>
    </div>
  </div>



  <style>
    .item {
      display: flex;
      flex-direction: row;
      margin-top: 7px;
      width: 100%;
      justify-content: center;
    }

    .text {
      /* background-color: black; */
      padding: 10px;
    }

    .back {
      background-color: black;
    }

    .pic {
      width: 30rem;
      height: 20rem;
      padding-top: 12px;
    }
  </style>



  <!--Event 2 -->
  <div class="container mt-5 mb-5">
      <div class="item">
        <div class="pic">
          <img class="image2">
        </div>
          <div class="text">
            <h5 class="card-title text-event-2 text-uppercase Merriweather fs-3">Title</h5>
            <p class="card-text text-event-2 pt-5 font-monospace">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
          </div>
      </div>
  </div>


  <!--Event 3 -->
  
  <div class="container back">
  <div class="item">
    <div class="text">
      <h5 class="card-title text-event-1 text-uppercase Merriweather fs-3">Title</h5>
      <p class="card-text text-event-1 pt-5 font-monospace">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
    </div>
    <div class="pic">
      <img class="image3">
    </div>
  </div>
</div>


  <!--Event 4 -->
  <div class="container mt-5 mb-5">
    
      <div class="item">
        <div class="pic">
          <img class="image4">
        </div>

          <div class="text">
            <h5 class="card-title text-event-2 text-uppercase Merriweather fs-3">Title</h5>
            <p class="card-text text-event-2 pt-5 font-monospace">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
          </div>

      </div>
    
  </div>


  <!-- Footer -->
  <footer class="text-center text-lg-start bg-black text-muted">
<!-- Section: Social media -->
<section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
  <!-- Left -->
  <div class="me-5 d-none d-lg-block">
    <span style="color:white">Get connected with us on social networks:</span>
  </div>
  <!-- Left -->

  <!-- Right -->
  <div>
    <a href="" class="me-4 link-dark" >
      <i class="fab fa-facebook-f" style="color: white"></i>
    </a>
    <a href="" class="me-4 link-dark">
      <i class="fab fa-twitter icon-footer" style="color: white"></i>
    </a>
    <a href="" class="me-4 link-dark">
      <i class="fab fa-google" style="color: white"></i>
    </a>
    <a href="" class="me-4 link-dark">
      <i class="fab fa-instagram" style="color: white"></i>
    </a>
    <a href="" class="me-4 link-dark">
      <i class="fab fa-linkedin" style="color: white"></i>
    </a>
    <a href="" class="me-4 link-dark">
      <i class="fab fa-github" style="color: white"></i>
    </a>
  </div>
  <!-- Right -->
</section>
<!-- Section: Social media -->

<!-- Section: Links  -->
<section class="">
  <div class="container text-center text-md-start ">
    <!-- Grid row -->
    <div class="row pt-5">
      <!-- Grid column -->
      <div class="col-md-3 col-lg-4 col-xl-3 mx-auto ">
        <!-- Content -->
        <h6  class="text-uppercase fw-bold mb-4">
         SSAM Partners
        </h6>
        <p class="text">
          Here you can use rows and columns to organize your footer content. Lorem ipsum
          dolor sit amet, consectetur adipisicing elit.
        </p>
      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
        <!-- Links -->
        <h6 class="text-uppercase fw-bold mb-4">
          Nos services
        </h6>
        <p>
          <a class="text" href="#!" class="text-reset">Evenementiel</a>
        </p>
        <p>
          <a class="text" href="#!" class="text-reset">Marketing Degital</a>
        </p>
        <p>
          <a class="text" href="#!" class="text-reset">Communication</a>
        </p>
        <p>
          <a class="text" class="text" href="#!" class="text-reset">Design Graphic</a>
        </p> 
      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
        <!-- Links -->
        <h6 class="text-uppercase fw-bold mb-4">
          SSAM PARTNERS
        </h6>
        <p>
          <a class="text" href="#!" class="text-reset">Qui-sommes-nous ?</a>
        </p>
        <p>
          <a class="text" href="#!" class="text-reset">Nos realisation</a>
        </p>
        <p>
          <a class="text" href="#!" class="text-reset">Nos equipe</a>
        </p>
        <p>
          <a class="text" href="#!" class="text-reset">Contactez nous</a>
        </p>
      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
        <!-- Links -->
        <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
        <p class="text"><i class="fas fa-home me-3 text-secondary"></i>Technopark Souss Massa, TA128</p>
        <p class="text">
          <i class="fas fa-envelope me-3 text-secondary"></i>
          info@ssampartners.ma
        </p>
        <p class="text"><i class="fas fa-phone me-3 text-secondary"></i>  +212 (0) 5 25 16 46 64</p>
        <!--p class="text"><i class="fas fa-print me-3 text-secondary"></i> + 01 234 567 89</p-->
      </div>
      <!-- Grid column -->
    </div>
    <!-- Grid row -->
  </div>
</section>
<!-- Section: Links  -->

<!-- Copyright -->
<div  class="text-center p-4 text" style="background-color: rgba(0, 0, 0, 0.025);">
  © 2023 Copyright:
  <a class="text" class="text-reset fw-bold" href="#">SSAM Partners</a>
</div>
<!-- Copyright -->
</footer>


  <!--File location-->
  <script src="js/realisation.js"></script>
  <!-- MDB -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  <!--Icon-->
  <script src="https://kit.fontawesome.com/8967e00685.js" crossorigin="anonymous"></script>
</body>

</html>