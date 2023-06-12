 <head>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/formAdmin.css') }}">
    </head>
    @extends('layouts.admin')
    
    @section('content')
    
    
    
    <div class="row">
     <div class="col-md-12">
       <div class="card">
        <div class="card-header d-flex justify-content-between ">
            <div><h4 class="titre">Evenement</h4></div>
    
            
        </div>
      
         
        <div class="card-body">
        <table class="table table-striped">
      <thead>
        <tr>
          <th>Id</th>
          <th>Client</th>
          <th>Event-Name</th>
          <th>Type-Event</th>
          <th>Ville</th>
          <th>Guests</th>
          <th>Datestar</th>
          <th>DateEnd </th>
          <th>Salle</th>
          <th>Facture</th>
        </tr>
    
      </thead>
      <tbody>
        @foreach ($evenements as $evenement)
        <tr  valign ="middle">
          <td>{{$evenement->id}}</td>
          <td>{{$evenement->user_id}}</td>
          <td>{{$evenement->eventName}}</td>
          <td>{{$evenement->typeEvent->TypeName}}</td>
          <td>{{$evenement->ville}}</td>
          <td>{{$evenement->guests}}</td>
          <td>{{$evenement->datestart}}</td>
          <td>{{$evenement->dateEnd}}</td>
          <td>{{$evenement->salle->SalleName}}</td>
          
          <td>
            <form  >
                @csrf
                <button href="" type="submit" class="btn btn-sm btn-warning text-white">Download</button>

              </form>
          </td>
        
        </tr>
        @endforeach

      </tbody>
    </table>
    
        </div>
       </div>
    
    
     </div>
    </div>
    
    
  
     
    
    @endsection
