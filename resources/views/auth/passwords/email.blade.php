@extends('layouts.app')
<html>
<head>
   <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
   <style>
    
    .form a {
                color: #FFFFFF;;
                margin-bottom: 20px;
            }
            .form .form-check{
                margin-left: 15px;
                margin-bottom:15px;
                text-align: left; 
                color:#FFFFFF;;
            }
            .form h3 {
        color: #FFFFFF;
        margin-bottom: 20px;
      }
      .form p{
            color:#FFFFFF;
            margin-bottom: 20px;
            font-family:Georgia;
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
        <div class="form">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="">
                        <div class="card-body">
                            <div class="container">
                            <form class="login-form" method="POST" action="{{ route('password.email') }}">
                        @csrf
                       <div class="col">
                        <h3>Réinitialiser le mot de passe</h3>
                        <p>Vous avez oublié votre mot de passe ? Veuillez entrer votre adresse email pour initier la réinitialisation.</p>

                        </div>
                            <div class="col">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email" >

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                       

                        <div class="col ">
                            
                                <button style="font-weight : bolder;width: 40%;" type="submit">
                                    {{ __(' Envoyer') }}
                                </button>
                           
                        </div>
                        <div class="col">
                        <button onclick="window.location.href='{{ route('login') }}'" style="font-weight : bolder; width: 40%;"> Retour</button>
                         </div>
                    </form>
                            </div>
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
