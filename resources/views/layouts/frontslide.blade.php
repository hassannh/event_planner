<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="{{ asset('assets/css/frontend.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('assets/css/bootstrap.min.css') }} " rel="stylesheet">
    
    <!-- Scripts -->
  
</head>
<body>
        <div class="retour ms-4 mt-4">
         <button onclick="window.location.href='{{ url('/') }}'" class="btn d-flex">
            <p class="retour   bg-white fw-bold"><</p>
            <p class="fs-5 text-white fw-bold Merriweather ps-2">Retour</p>
         </button>
        
        </div>
<div class="container">
    <div class="row">
        <div class="col-3 text-white" >
          <ul class="list-unstyled text-uppercase menu mt-5">
           
            <li>
              <a  class="image2" href="{{url('frontend/indexSalle')}}">
                <i ><img  alt=""></i>
                <P class="ms-3 mt-1 fw-bold">salles</P>
              </a>
            </li>
            <li>
              <a  class="image3" href="{{url('frontend/index')}}">
                <i ><img  alt=""></i>
                <P class="mt-1 fw-bold">équipements</P>
              </a>
            </li>
            <li >
              <a  class="image4" href="{{url('frontend/indexPersonnel')}}">
                <i ><img  alt=""></i>
                <P class="mt-1 fw-bold">personnels</P>
              </a>
            </li>
            <li>
              <a  class="image5" href="{{url('frontend/indexservice')}}">
                <i ><img  alt=""></i>
                <P class="ms-2 mt-1 fw-bold">services</P>
              </a>
            </li>
          </ul>
        </div>

        
      <div class="col-9">
        
      @yield('content')
      </div>
    </div>
</div>
    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery-3.6.4.min.js')}}"></script>
   
</body>
</html>