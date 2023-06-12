@extends('layouts.app')


<html>
<head>
   <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
   <style>
    
    .form a {
                color: #FFFFFF;
                margin-bottom: 20px;
            }
            .form .form-check{
                margin-left: 15px;
                margin-bottom:15px;
                text-align: left; 
                color:#FFFFFF;
            }
            .form h3 {
        color: #FFFFFF;
        margin-bottom: 20px;
      }
      .form p{
            color:#FFFFFF;
            margin-bottom: 10px;
            font-family:Georgia;
            
        }
        .form label{
            color:#FFFFFF;
            margin-bottom: 20px;
            font-family:Georgia;
            
        }
        .form {
    position: relative;
    text-align: center;
   width: 700px;
   margin-left: 5px;
  }
  .container {
            width: 600px;
            padding: 5% 0 0;
            margin: auto;
        }
   </style>
</head>
<body>

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="form">
            <div class="">
              <P class="mt-4 fs-4">Reset Password</P>

                <div class="card-body">
                   <div class="container">
                   <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
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