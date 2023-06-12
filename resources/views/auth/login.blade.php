@extends('layouts.app')


<html>
<head>
   <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
   <style>
            
   
    .form a {
      color:#FFFFFF;
      margin-bottom: 20px;
    }
     .form .form-check{
       margin-left: 15px;
       margin-bottom:15px;
       text-align: left; 
       color:#FFFFFF;
    }
    .form h1 {
        color: #FFFFFF;
        margin-bottom: 40px;
       
    }
    .form {
    position: relative;
    text-align: center;
    width: 500px;
    margin-left: 100px;
  }
  
            
    </style>
</head>
<body>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <div class="">
            <div class="card-body">
                <div class="container">
                <div class="form ">
                    <form class="login-form " method="POST" action="{{ route('login') }}">
                        @csrf
                        <h1>Connexion</h1>
                       
                            <div class="col">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">

                                @error('email')
                                    <span class="invalid " role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                       

                        

                            <div class="col">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Mot de passe">

                                @error('password')
                                    <span class="invalid " role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                       

                        <div class="form-check">
                            <div class="col">
                               
                                    <input class="form-check-input" type="checkbox" name="remember" value="" id="flexCheckDefault" {{ old('remember') ? 'checked' : '' }} style="width: 20px;margin-right:10px; padding: 10px; ">

                                    <label class="form-check-label" for="flexCheckDefault" style="font-family: Georgia;">
                                        {{ __(' Se souvenir') }}
                                    </label>
                                
                            </div>
                        </div>

                       
                            <div class="col">
                                <button style="font-weight : bolder; width: 250px; " type="submit" >
                                    {{ __('Connexion') }}
                                </button>
                            </div>
                                @if (Route::has('password.request'))
                                <div class="col ">
                                    <a  href="{{ route('password.request') }}">
                                        {{ __('  Mot de passe opublié?') }}
                                    </a></div>
                                @endif
                                <div class="col "><a  href="{{ route('register') }}">
                                {{ __('Créer un compte') }}
                            </a></div>
                        
                    </form>
                
            
        </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
@endsection
</body>
</html>
