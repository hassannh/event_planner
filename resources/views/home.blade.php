@extends('layouts.app')
<html>
<head>
<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/home.css') }}">
</head>
@section('content')
<body>
    <div class="container-fluid d-flex justify-content-between">
       <div class="retour ms-4 mt-2">
         <button onclick="window.location.href='{{ url('/') }}'" class="btn d-flex">
            <p class="retour   bg-white fw-bold"><</p>
            <p class="fs-5 text-white fw-bold Merriweather ps-2">Retour</p>
         </button>
         
        
        </div>
        <div class="text-white  me-4 mt-2 navbar-menu-wrapper d-flex align-items-center">
        <ul class="navbar-nav navbar-nav-right">
        <script src="https://kit.fontawesome.com/cf08db5d6d.js" crossorigin="anonymous"></script>
         <li class="nav-item nav-profile dropdown logout ">
           <a class=" nav-link dropdown-toggle text-white" href="#" data-bs-toggle="dropdown" id="profileDropdown">
             
           <i class="fa-regular fa-circle-user fs-3 pe-2 mt-1"></i>
             <span class="nav-profile-name Merriweather fs-5">{{Auth::user()->name}}</span>
           </a>
           <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              
             <a class="dropdown-item " href="{{ route('logout') }}"
              onclick="event.preventDefault();
             document.getElementById('logout-form').submit();">
             <i class="mdi mdi-logout"></i> {{ __('Logout') }}
             </a>

             <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
             @csrf
             </form>
           </div>
         </li>
       </ul>
       <button class="navbar-toggler  navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
         <span class="mdi mdi-menu"></span>
       </button>
        </div>
    </div>
    <div class="container ">
       <div class="d-flex justify-content-center">
       <p class="text-white text-uppercase mt-2 fs-3 Merriweather fw-bold">mon événement</p>
       </div>
       <div class="container-fluid">
        <div class="container">
          <div class="card mx-5 ">
               <div class="card-body mt-3">
                <form action="{{route('home.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                   <div class="row">
                    <div class="col-md-6">
                        <label for="" class="mb-2">
                         Nom D'événement
                        </label>
                        <input type="text" placeholder="Nom D'événement" name="eventName" class="form-control @error('eventName') is-invalid @enderror" value="{{old('eventName')}}"  />
                        @error('eventName')
                        <p class="invalid-feedback">{{$message}}</p>
                        @enderror
                   </div>

                  <div class="col-md-6">
                       <label for="" class="mb-2">
                         Type D'événement
                        </label>
                        <select name="typeEvent_id" id=""class="form-select @error('typeEvent') is-invalid @enderror" value="{{old('typeEvent')}}">
                        @foreach($typeevente as $type)
                         <option value="{{$type->id}}">{{$type->TypeName}}</option>
                        @error('typeEvent_id')
                        <p class="invalid-feedback">{{$message}}</p>
                        @enderror
                         @endforeach
                      
                
             </select>
                  </div>
                   </div>
                   <div class="row mt-3">
                   <div class="col-md-6">
                        <label for="" class="mb-2">
                         Nombre des invités
                        </label>
                        <input type="number" placeholder="nombre des invités" name="guests" class="form-control @error('guests') is-invalid @enderror" value="{{old('guests')}}"  />
                        @error('guests')
                        <p class="invalid-feedback">{{$message}}</p>
                        @enderror
                   </div>

                   <div class="col-md-6">
                        <label for="" class="mb-2">
                         Ville
                        </label>
                        <input type="text" placeholder="Lieu d'événement" name="ville" class="form-control @error('ville') is-invalid @enderror" value="{{old('ville')}}"  />
                        @error('ville')
                        <p class="invalid-feedback">{{$message}}</p>
                        @enderror
                   </div>
                   </div>

                   <div class="row mt-3">
                        <label for="" class="mb-2">
                         Date d'événement
                        </label>
                   <div class="col-md-6">
                        <h6>Date début</h6>
                        
                        <input type="date"  name="datestart" class="form-control @error('datestart') is-invalid @enderror text-light" value="{{old('datestart')}}"  />
                        @error('datestart')
                        <p class="invalid-feedback">{{$message}}</p>
                        @enderror
                   </div>
                   <div class="col-md-6">
                       <h6>Date Fin</h6>
                       <input type="date"  name="dateEnd" class="form-control @error('dateEnd') is-invalid @enderror text-white" value="{{old('dateEnd')}}"  />
                       @error('dateEnd')
                       <p class="invalid-feedback">{{$message}}</p>
                       @enderror
                  </div>
                   </div>
                   <button type="submit" class="bouton px-5">Valider</button>
                  
                </form>
               </div>
          </div>
        </div>
       </div>
    </div>
</body>
</html>
@endsection

