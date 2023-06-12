@extends('layouts.app')

<html>
<head>
   <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
   
<style>
        .form input {
            width: 100%;
        }
        .form h3{
            font-family: Georgia;font-size: 25px;
            font-weight: 600;
            color: #FFFFFF;
            margin-top:5px;
            margin-bottom: 5px;
        }
        .form p{
            color:  #FFFFFF;
            margin-bottom: 40px;
            font-size: small;
        }

        .container {
            width: 600px;
            padding: 5% 0 0;
            margin: auto;
        }

        .form .row input::placeholder {
            color: #D91B5C;
            width: 600;
        }

        .form .row input:focus {
            outline: none !important;
            border: 1px solid  #FFFFFF;
            box-shadow: 0 0 10px  #;
        }
    

    .form {
    position: relative;
    text-align: center;
   
  }
</style>

</head>
<body>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 ">
        <div class="form">
        <div class="">
            <div class="card-body">
                <div class="container">
                <form class="login-form" method="POST" action="{{ route('register') }}">
                        @csrf
                        <h3>Inscription</h3>
                      <p>C'est rapide et facile</p>
                   
                <div class="row">

                            <div class="col-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Nom"> 

                                @error('name')
                                    <span class="invalid" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                       

                            <div class="col-6">
                                <input id="lname" type="text" class="form-control @error('lname') is-invalid @enderror" name="lname" value="{{ old('lname') }}" required autocomplete="lname" autofocus placeholder="Prénom"> 

                                @error('lname')
                                    <span class="invalid" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                </div>
                <div class="row">

                              <div class="col-6">
                              <input type="text" class="form-control @error('company') is-invalid @enderror" name="company" value="{{ old('company') }}" required autocomplete="company" autofocus placeholder="Nom d'entreprise"> 

                               @error('company')
                                 <span class="invalid" role="alert">
                               <strong>{{ $message }}</strong>
                               </span>
                              @enderror
                              </div>


                             <div class="col-6">
                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address" autofocus placeholder="Adresse d'entreprise"> 

                                 @error('address')
                               <span class="invalid" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                   @enderror
                             </div>
                </div>
                <div class="row">
                        

                            <div class="col-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">

                                @error('email')
                                    <span class="invalid" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                       

                            <div class="col-6">
                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus placeholder="Numéro de téléphone"> 

                                @error('phone')
                                    <span class="invalid" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                    </div>         
                    
                      <div class="row">

                            <div class="col-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Mot de passe">

                                @error('password')
                                    <span class="invalid" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirmer mot de passe">
                            </div>
                       </div>
                      </div>
                    

                        
                            <div class="col-6 offset-4">
                                <button type="submit"   style="font-weight : bolder; width: 50%; margin-top: 20px; margin-right: 100px;">
                                    {{ __("S'inscrire") }}
                                </button>
                            </div>
                        
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