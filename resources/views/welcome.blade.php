<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Fonts -->
  <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/welcome.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />


  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/fontawesome.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" />
  <style type="text/css">
    i {
      font-size: 50px !important;
      padding: 10px;
    }
  </style>
  <!-- Styles -->
  <style>
    /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */
    html {
      line-height: 1.15;
      -webkit-text-size-adjust: 100%
    }

    body {
      margin: 0
    }

    a {
      background-color: transparent
    }

    [hidden] {
      display: none
    }

    html {
      font-family: system-ui, -apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Helvetica Neue, Arial, Noto Sans, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol, Noto Color Emoji;
      line-height: 1.5
    }

    *,
    :after,
    :before {
      box-sizing: border-box;
      border: 0 solid #e2e8f0
    }

    a {
      color: inherit;
      text-decoration: inherit
    }

    svg,
    video {
      display: block;
      vertical-align: middle
    }

    video {
      max-width: 100%;
      height: auto
    }

    .bg-white {
      --bg-opacity: 1;
      background-color: #fff;
      background-color: rgba(255, 255, 255, var(--bg-opacity))
    }

    .bg-gray-100 {
      --bg-opacity: 1;
      background-color: #f7fafc;
      background-color: rgba(247, 250, 252, var(--bg-opacity))
    }

    .border-gray-200 {
      --border-opacity: 1;
      border-color: #edf2f7;
      border-color: rgba(237, 242, 247, var(--border-opacity))
    }

    .border-t {
      border-top-width: 1px
    }

    .flex {
      display: flex
    }

    .grid {
      display: grid
    }

    .hidden {
      display: none
    }

    .items-center {
      align-items: center
    }

    .justify-center {
      justify-content: center
    }

    .font-semibold {
      font-weight: 600
    }

    .h-5 {
      height: 1.25rem
    }

    .h-8 {
      height: 2rem
    }

    .h-16 {
      height: 4rem
    }

    .text-sm {
      font-size: .875rem
    }

    .text-lg {
      font-size: 1.125rem
    }

    .leading-7 {
      line-height: 1.75rem
    }

    .mx-auto {
      margin-left: auto;
      margin-right: auto
    }

    .ml-1 {
      margin-left: .25rem
    }

    .mt-2 {
      margin-top: .5rem
    }

    .mr-2 {
      margin-right: .5rem
    }

    .ml-2 {
      margin-left: .5rem
    }

    .mt-4 {
      margin-top: 1rem
    }

    .ml-4 {
      margin-left: 1rem
    }

    .mt-8 {
      margin-top: 2rem
    }

    .ml-12 {
      margin-left: 3rem
    }

    .-mt-px {
      margin-top: -1px
    }

    .max-w-6xl {
      max-width: 72rem
    }

    .min-h-screen {
      min-height: 100vh
    }

    .overflow-hidden {
      overflow: hidden
    }

    .p-6 {
      padding: 1.5rem
    }

    .py-4 {
      padding-top: 1rem;
      padding-bottom: 1rem
    }

    .px-6 {
      padding-left: 1.5rem;
      padding-right: 1.5rem
    }

    .pt-8 {
      padding-top: 2rem
    }

    .fixed {
      position: fixed
    }

    .relative {
      position: relative
    }

    .top-0 {
      top: 0
    }

    .right-0 {
      right: 0
    }

    .shadow {
      box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06)
    }

    .text-center {
      text-align: center
    }

    .text-gray-200 {
      --text-opacity: 1;
      color: #edf2f7;
      color: rgba(237, 242, 247, var(--text-opacity))
    }

    .text-gray-300 {
      --text-opacity: 1;
      color: #e2e8f0;
      color: rgba(226, 232, 240, var(--text-opacity))
    }

    .text-gray-400 {
      --text-opacity: 1;
      color: #cbd5e0;
      color: rgba(203, 213, 224, var(--text-opacity))
    }

    .text-gray-500 {
      --text-opacity: 1;
      color: #a0aec0;
      color: rgba(160, 174, 192, var(--text-opacity))
    }

    .text-gray-600 {
      --text-opacity: 1;
      color: #718096;
      color: rgba(113, 128, 150, var(--text-opacity))
    }

    .text-gray-700 {
      --text-opacity: 1;
      color: #4a5568;
      color: rgba(74, 85, 104, var(--text-opacity))
    }

    .text-gray-900 {
      --text-opacity: 1;
      color: #1a202c;
      color: rgba(26, 32, 44, var(--text-opacity))
    }

    .underline {
      text-decoration: underline
    }

    .antialiased {
      -webkit-font-smoothing: antialiased;
      -moz-osx-font-smoothing: grayscale
    }

    .w-5 {
      width: 1.25rem
    }

    .w-8 {
      width: 2rem
    }

    .w-auto {
      width: auto
    }

    .grid-cols-1 {
      grid-template-columns: repeat(1, minmax(0, 1fr))
    }

    @media (min-width:640px) {
      .sm\:rounded-lg {
        border-radius: .5rem
      }

      .sm\:block {
        display: block
      }

      .sm\:items-center {
        align-items: center
      }

      .sm\:justify-start {
        justify-content: flex-start
      }

      .sm\:justify-between {
        justify-content: space-between
      }

      .sm\:h-20 {
        height: 5rem
      }

      .sm\:ml-0 {
        margin-left: 0
      }

      .sm\:px-6 {
        padding-left: 1.5rem;
        padding-right: 1.5rem
      }

      .sm\:pt-0 {
        padding-top: 0
      }

      .sm\:text-left {
        text-align: left
      }

      .sm\:text-right {
        text-align: right
      }
    }

    @media (min-width:768px) {
      .md\:border-t-0 {
        border-top-width: 0
      }

      .md\:border-l {
        border-left-width: 1px
      }

      .md\:grid-cols-2 {
        grid-template-columns: repeat(2, minmax(0, 1fr))
      }
    }

    @media (min-width:1024px) {
      .lg\:px-8 {
        padding-left: 2rem;
        padding-right: 2rem
      }
    }

    @media (prefers-color-scheme:dark) {
      .dark\:bg-gray-800 {
        --bg-opacity: 1;
        background-color: #2d3748;
        background-color: rgba(45, 55, 72, var(--bg-opacity))
      }

      .dark\:bg-gray-900 {
        --bg-opacity: 1;
        background-color: #1a202c;
        background-color: rgba(26, 32, 44, var(--bg-opacity))
      }

      .dark\:border-gray-700 {
        --border-opacity: 1;
        border-color: #4a5568;
        border-color: rgba(74, 85, 104, var(--border-opacity))
      }

      .dark\:text-white {
        --text-opacity: 1;
        color: #fff;
        color: rgba(255, 255, 255, var(--text-opacity))
      }

      .dark\:text-gray-400 {
        --text-opacity: 1;
        color: #cbd5e0;
        color: rgba(203, 213, 224, var(--text-opacity))
      }

      .dark\:text-gray-500 {
        --tw-text-opacity: 1;
        color: #6b7280;
        color: rgba(107, 114, 128, var(--tw-text-opacity))
      }
    }
  </style>


</head>

<body>
  <!-- <nav class="navbar navbar-expand-lg pt-3 navbar-dark position-fixed w-100">
  <div class="container-fluid">
   <a class="navbar-brand" ></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto  mb-2 mb-lg-0">
        <li class="nav-item pe-3">
          <a class="nav-link active" aria-current="page" href="#">Acceuil</a>
        </li>
        <li class="nav-item pe-3">
          <a class="nav-link active" href="{{url('/frontend/realisation')}}">Réalisations</a>
        </li>
       
        <li class="nav-item pe-3">
          <a class="nav-link active " href="{{url('/frontend/contact')}}" >Contact</a>
        </li>
        <li class="nav-item pe-3">
          <a class="nav-link active" href="#" onclick="window.location.href='{{ route('login') }}'">Connexion</a>
        </li>
      </ul>
    
        <button class="bouton fw-bold me-2" onclick="window.location.href='{{ route('login') }}'" type="submit">Budgétiser votre événement</button>
     
    </div>
  </div>
</nav> -->


  <div class="background">

    <div class="header container-fluid">

      <div class="logo" style="">
        <img src="{{asset('assets/photos/Log.png') }}" alt="">
      </div>

      <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button> -->


      <div class="nav_List mt-5">
        <ul>
          <li class="nav-link">
            <a href="">Acceuil</a>
          </li>
          <li class="nav-link">
            <a href="{{url('/frontend/realisation')}}">Réalisations</a>
          </li>
          <li class="nav-link">
            <a href="">Blog</a>
          </li>
          <li class="nav-link">
            <a href="{{url('/frontend/contact')}}">Contact</a>
          </li>
        </ul>
      </div>


      <div class="loginB offset-md-3">
        <button class="bouton fw-bold me-2" onclick="window.location.href='{{ route('login') }}'" type="submit">Budgétiser votre événement</button>
      </div>

      <div class="profil">
        <a href="">
          <img src="{{ asset('assets/photos/profile.png') }}" alt="">
        </a>
      </div>

    </div>





    <div class="section2">

      <div class="item1">
        <h3 style="background-color: white; border-radius: 22px; height: 38px; width: 370px; padding-left: 7px; color: rgb(199, 37, 91);">
          Renseigner-vous maintenant</h3>
        <h5 style="padding-left: 35px; color: white;">ipsum dolor sit amet consectetur</h5>
        <p style="padding-left: 40px; color: white; padding-top: 13px;">Lorem, ipsum dolor sit amet consectetur
          <br>
          adipisicing elit. Perspiciatis consectetur.
        </p>
      </div>

      <div class="item2">
        <img src="{{ asset('images/personnel/Group 171.png') }}" alt="">
      </div>
    </div>


    <div class="icons">
      <span>
        <i class="fa-sharp fa-light fa-table-picnic"></i>
        <i class="fa fa-trash"></i>

        SALLES
      </span>
      <span>
        <!-- <i class="fa-thin fa-couch"></i> -->
        <i class="fa fa-save"></i>
        EQUIPEMENTS
      </span>
      <span>
        <!-- <i class="fa-thin fa-users"></i>
                <i class="fa fa-copy"></i> -->
        <!-- <i class="fa-light fa-users"></i> -->
        <i class="fa-thin fa-user"></i>
        PERSONNELS
      </span>
      <span>
        <i class="fa-thin fa-user"></i>
        SERVICE
      </span>


    </div>

  </div>



  <style>
    .overflow-hidden .row {
      overflow: hidden;

    }
  </style>

  <style>
    * {
      margin: 0;
      padding: 0;
    }

    .header {
      /* background-image: url("pictures/Vector.svg");
            background-color: rgb(205, 39, 94); */
      display: flex;
      flex-direction: row;

    }
    .loginB{
      margin-top: 38px;
      margin-right: 20px;
    }

    .background {
      /* background-image: url("pictures/Vector.svg"); */
      background-color: rgb(220, 27, 91);
      height: 35rem;
    }

    .nav_List ul {
      display: flex;
      flex-direction: row;
      gap: 22px;
      margin-left: 33px;
      margin-top: -20px;
      list-style: none;
    }

    .nav_List ul li {
      color: white;
    }

    .logo img {
      height: 40px;
      width: 90px;
      margin-left: 5px;
      margin-top: 14px;
    }

    .profil img{
      height: 40px;
      width: 40px;
      margin-top: 19px;
      margin-left: 20px;
    }
    .profil{
      margin-top: 11px;
    
    }

    .booking {
      background-color: white;
      border-radius: 21px;
      height: 25px;
      width: 227px;
      padding-top: 2px;
      padding-left: 11px;
      align-items: center;
      color: rgb(189, 31, 84);

    }

    .section2 {
      display: flex;
      flex-direction: row;
      justify-content: space-around;
      margin-top: 3rem;
      margin-left: 3rem;
    }

    .section2 .item2 img {
      height: 300px;
      width: 500px;
    }

    .section2 .item1 {
      margin-top: 4rem;
    }

    .icons {
      display: flex;
      flex-direction: row;
      justify-content: space-around;
      margin-top: 19px;
    }

    .icons span img {
      width: 62px;

    }

    .main3{
      background: url({{asset('assets/photos/section3.png')}});
      h
    }

    .section3 {
    display: flex;
    flex-direction: row;
    justify-content: space-around;
    height: 400px;
    }

    .section3 {
      padding-top: 2rem;
    }

    .section3 .iconPic img {
      height: 280px;
      width: 280px;
    }
  </style>

  <div class="main3">


  <h2 style="display: flex; justify-content:center; padding-top:4rem;">À Propos de nous</h2>


    <div class="section3">

      <div class="iconPic">
        <img src="{{asset('assets/photos/icon1.png')}}" alt="">
      </div>
      <div>
        <h3>EVENTS PLANNER</h3>
        <p>EVENTS PLANNER est un outil en ligne <br>
          permettant aux organisateurs d’événements <br>
          de planifier et de budgétiser facilement <br>
          leurs événements. Il permet aux utilisateurs <br>
          de spécifier les détails de leur événement, <br>
          tels que le lieu, le nombre de participants, le <br>
          type de service requis, etc., et leur fournit <br>
          une estimation du coût total de l’événement</p>
      </div>
    </div>
    <div class="section3">


      <div>
        <h3>EVENTS PLANNER</h3>
        <p>EVENTS PLANNER est un outil en ligne <br>
          permettant aux organisateurs d’événements <br>
          de planifier et de budgétiser facilement <br>
          leurs événements. Il permet aux utilisateurs <br>
          de spécifier les détails de leur événement, <br>
          tels que le lieu, le nombre de participants, le <br>
          type de service requis, etc., et leur fournit <br>
          une estimation du coût total de l’événement</p>
      </div>

      <div class="iconPic">
        <img src="{{asset('assets/photos/icon2.png')}}" alt="">
      </div>
    </div>



    <div class="section3">

      <div class="iconPic">
        <img src="{{asset('assets/photos/icon3.png')}}" alt="">
      </div>
      <div>
        <h3>EVENTS PLANNER</h3>
        <p>EVENTS PLANNER est un outil en ligne <br>
          permettant aux organisateurs d’événements <br>
          de planifier et de budgétiser facilement <br>
          leurs événements. Il permet aux utilisateurs <br>
          de spécifier les détails de leur événement, <br>
          tels que le lieu, le nombre de participants, le <br>
          type de service requis, etc., et leur fournit <br>
          une estimation du coût total de l’événement</p>
      </div>
    </div>



    <div class="section3">


      <div>
        <h3>EVENTS PLANNER</h3>
        <p>EVENTS PLANNER est un outil en ligne <br>
          permettant aux organisateurs d’événements <br>
          de planifier et de budgétiser facilement <br>
          leurs événements. Il permet aux utilisateurs <br>
          de spécifier les détails de leur événement, <br>
          tels que le lieu, le nombre de participants, le <br>
          type de service requis, etc., et leur fournit <br>
          une estimation du coût total de l’événement</p>
      </div>

      <div class="iconPic">
        <img src="{{asset('assets/photos/icon4.png')}}" alt="">
      </div>
    </div>

  </div>

  <!-- <div class="container overflow-hidden">
    <div class="row">
      <div class="col-3 text-white">
        <ul class="list-unstyled text-uppercase menu mt-5">

          <li>
            <a class="image2" href="{{url('frontend/indexSalle')}}">
              <i><img alt=""></i>
              <P class="ms-3 mt-1 fw-bold">salles</P>
            </a>
          </li>
          <li>
            <a class="image3" href="{{url('frontend/index')}}">
              <i><img alt=""></i>
              <P class="mt-1 fw-bold">équipements</P>
            </a>
          </li>
          <li>
            <a class="image4" href="{{url('frontend/indexPersonnel')}}">
              <i><img alt=""></i>
              <P class="mt-1 fw-bold">personnels</P>
            </a>
          </li>
          <li>
            <a class="image5" href="{{url('frontend/indexservice')}}">
              <i><img alt=""></i>
              <P class="ms-2 mt-1 fw-bold">services</P>
            </a>
          </li>
        </ul>

      </div>
      <div class="col-9  pt-5  ">
        <button class="boutom text-capitalize fw-bold fs-2 bttm" onclick="window.location.href='{{ route('login') }}'" type="submit">renseigner-vous maintenant</button>
        <p class="text-capitalize fs-2 text-white ps-4 pt-3 " onclick="window.location.href='{{ route('login') }}'">Planifiez, calculez, réussissez</p>
        <p class="text-light  ps-5 fw-light"> La manière
          la plus rapide de budgétiser votre événement </p>
      </div>
    </div>
  </div> -->






</body>

</html>