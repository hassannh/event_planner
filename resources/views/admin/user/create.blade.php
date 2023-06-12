<head>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/formAdmin.css') }}">
    </head>@extends('layouts.admin')
    
    @section('content')
    
     <div class="row">
     <div class="col-md-12">
       <div class="card">
       <div class="card-header d-flex justify-content-between py-3">
            <div><h4 class="titre">Ajouter Utilisateur</h4></div>
            <div><a href="{{url('admin/user')}}" class="bttn float-end">Retour</a></div>
        </div>
        
        <div class="card-body">
            <form action="{{ route('user.store') }}"method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
            <div class="col-md-6 mb-3">
                <label for="" class="mb-2">
                    Name  :
                </label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}"  />
                @error('name')
                <p class="invalid-feedback">{{$message}}</p>
                @enderror
               
            </div> <div class="col-md-6 mb-3">
                <label for="" class="mb-2">
                    Last Name :
                </label>
                <input type="text" name="lname" class="form-control @error('lname') is-invalid @enderror" value="{{old('lname')}}"  />
                @error('lname')
                <p class="invalid-feedback">{{$message}}</p>
                @enderror
               
            </div>
            <div class="col-md-6 mb-3">
                <label for="" class="mb-2">
                    Email :
                </label>
                <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" value="{{old('email')}}"  />
                @error('email')
                <p class="invalid-feedback">{{$message}}</p>
                @enderror
               
            </div>
            <div class="col-md-6 mb-3">
                <label for="" class="mb-2">
                    Phone :
                </label>
                <input type="text" name="phone" class="form-control @error('"phone') is-invalid @enderror" value="{{old('"phone')}}"  />
                @error('phone')
                <p class="invalid-feedback">{{$message}}</p>
                @enderror
               
            </div>
           
            <div class="col-md-6 mb-3">
                <label for="" class="mb-2">
                    company :
                </label>
                <input type="text" name="company" class="form-control @error('company') is-invalid @enderror" value="{{old('company')}}"  />
                @error('company')
                <p class="invalid-feedback">{{$message}}</p>
                @enderror
               
            </div>
            <div class="col-md-6 mb-3">
                <label for="" class="mb-2">
                    Address :
                </label>
                <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" value="{{old('address')}}"  />
                @error('address')
                <p class="invalid-feedback">{{$message}}</p>
                @enderror
               
            </div>
            <div class="col-md-6 mb-3">
                <label for="" class="mb-2">
                    Role_as : <span class="fst-italic col">  (1: Admin  ET  0 : Client)</span>
                </label>
                <input type="number" name="role_as" class="form-control @error('role_as') is-invalid @enderror" value="{{old('role_as')}}"/>
                @error('slug')
                <p class="invalid-feedback">{{$message}}</p>
                @enderror
            </div>

            <div class="col-6">
                <label for="" class="mb-2">
                    Password :
                </label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Mot de passe" />

                @error('password')
                    <span class="invalid" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="" class="mb-2">
                    Password confirmation :
                </label>
                <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" value="{{old('password_confirmation')}}"/>
                @error('password_confirmation')
                <p class="invalid-feedback">{{$message}}</p>
                @enderror
            </div>
          
            
            </div>
            
            <button  class="bttn  float-end">Valider</button>
          </form>
        </div>
       </div>
     </div>
     </div>
     
    @endsection