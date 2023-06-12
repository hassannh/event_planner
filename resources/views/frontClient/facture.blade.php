@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html>
<head>
	<title>Facture</title>
	<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/facture.css') }}">
	<style type="text/css">
		body {
			font-family: Arial, Helvetica, sans-serif;
			margin: 0;
			padding: 0;
		}

		.event{
            color: #D91B5C;
	        font-weight: bold;
            font-size: 40px;
            font-family: 'Times New Roman', Times, serif;
        }
		.container {
			max-width: 800px;
			margin: 0 auto;
			padding: 20px;
			border: 1px solid #D91B5C;
		}

		.header {
			display: flex;
			align-items: center;
			margin-top: 30px;
		}
		.logo {
			display: inline-block;
			vertical-align: middle;
			margin-right: 20px;
			margin-top: 10px;
		}
		.info {
			flex: 1;
			text-align: right;
		}
		.facture {
			text-align: center;
		}

		h2{
            font-weight: bold;
            font-size: 70px;
            color: #D91B5C;
        }

	</style>
</head>
<body>
    <div class="container-fluid d-flex justify-content-between">
        <div class="ms-4 mt-2">
         <button onclick="window.location.href='{{ url()->previous() }} '" class="btn d-flex">
            <p class=" fw-bold" style=" color:  #FFFFFF;  background-color: #D91B5C;  width: 25px; height:  25px; border-radius: 50px;"><</p>
            <p class="fs-5  fw-bold Merriweather ps-2" style=" color:  #D91B5C;">Retour</p>
         </button>
        </div>
		<div class="me-4 mt-2 navbar-menu-wrapper d-flex align-items-center">
            <ul class="navbar-nav navbar-nav-right">
                <script src="https://kit.fontawesome.com/cf08db5d6d.js" crossorigin="anonymous"></script>
                <li class="nav-item nav-profile dropdown logout">
                    <a class="nav-link dropdown-toggle " style="color: #D91B5C;" href="#" data-bs-toggle="dropdown"
                        id="profileDropdown">
                        <i class="fa-regular fa-circle-user fs-3 pe-2 mt-1"></i>
                        <span class="nav-profile-name Merriweather fs-5">{{Auth::user()->name}}</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown"
                        aria-labelledby="profileDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="mdi mdi-logout"></i> {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                data-toggle="offcanvas">
                <span class="mdi mdi-menu"></span>
            </button>
        </div>
    </div>

	<div class="container mt-5">
		<div class="logo">
			<p class="event"><strong>EventPlanner</strong></p>
		</div>
		<div class="facture">
			<h2>Facture</h2>
		</div>
		<hr style="border-color: black; border-width: 2px; width: 600px; height: 4px; margin-left: auto; margin-right: auto;">
		<div class="header">
			</br></br>
		</br></br>
			<div class="details">
				<p><strong>Facture n° : </strong> {{ $event->id }} </p>
				<p><strong>Date de début : </strong>{{ $event->datestart}}</p>
				<p><strong>Date de fin : </strong> {{ $event->dateEnd}}</p>
				<p><strong>Type d'événement : </strong> {{ $typeEvent->TypeName}}</p>
			</div>
			<div class="info">
				<p><strong>Nom de l'entreprise:</strong> {{ $user->company }}</p>
				<p><strong>Adresse de l'entreprise:</strong> {{ $user->address }} </p>
				<p><strong>Téléphone:</strong> {{ $user->phone }}</p>
				<p><strong>Email:</strong> {{ $user->email }}</p>
			</div>

		</div>
	</br></br>
		<table class="table">
			<thead>
				<tr style="background-color:#D91B5C;color:white">
					<th scope="col">N° de Salle</th>
					<th scope="col">Prix</th>
				</tr>
			</thead>
			<tbody class="text-capitalize">
				<tr>
					<td >{{ $salle->SalleName }}</td>
					<td>{{ $salle->price }} DH</td>
                    @php
                        $totalSalle = $salle->price;
                    @endphp
				</tr>
			</tbody>
		</table>
		</br></br>
		<table class="table">
			<thead>
				<tr style="background-color:#D91B5C;color:white">
					<th scope="col">Mes Equipement</th>
					<th scope="col">Mes choix</th>
					<th scope="col">Quantité</th>
					<th scope="col">Prix unitaire</th>
					<th scope="col">Total</th>
				</tr>

			</thead>
			<tbody class="text-capitalize">
                @php
                    $totalGeneralTab1 = 0;
                    $total = 0;
                @endphp
                @foreach($eventArticles as $eventArticle)
				<tr>
					<th scope="row">{{ $eventArticle->equipement_nom }}</th>
                    <td>{{ $eventArticle->article_nom }}</td>
					<td>{{ $eventArticle->quantite }}</td>
                    <td>{{ $eventArticle->prixUnitaire }} DH</td>
                    @php
                        $total = $eventArticle->prixUnitaire * $eventArticle->quantite;
                    @endphp
                    <td>{{ $total }}.00 DH</td>
                    @php
                        $totalGeneralTab1 += $total;
                    @endphp
				</tr>
                @endforeach
                <th class="table-active" colspan="4">Total Général</th>
                <th class="table-active">{{ $totalGeneralTab1 }}.00 DH</th>
			</tbody>
		</table>
		</br></br>
		<table class="table">
			<thead>
				<tr style="background-color:#D91B5C;color:white">
					<th scope="col">Services</th>
					<th scope="col">Mes choix</th>
					<th scope="col">Total</th>
				</tr>
			</thead>
			<tbody class="text-capitalize">
                @php
                    $totalGeneralTab2 = 0;
                @endphp
                @foreach($eventServices as $eventService)
				<tr>
					<th scope="row">{{ $eventService->Service_nom }}</th>
					<td>{{ $eventService->SousService_nom }}</td>
                    <td>{{ $eventService->prixService }} DH</td>
                    @php
                        $totalGeneralTab2 += $eventService->prixService;
                    @endphp
				</tr>
                @endforeach
                <th class="table-active" colspan="2">Total Général</th>
                <th class="table-active">{{ $totalGeneralTab2 }}.00 DH</th>
			</tbody>
		</table>
		</br></br>
		<table class="table">
			<thead>
				<tr style="background-color:#D91B5C;color:white">
					<th scope="col">Personnel</th>
					<th scope="col">Femme</th>
					<th scope="col">Homme</th>
					<th scope="col">Prix unitaire</th>
					<th scope="col">Total</th>
				</tr>
			</thead>
			<tbody class="text-capitalize">
                @php
                    $totalGeneralTab3 = 0;
                    $total = 0;
                @endphp
                @foreach($eventPersonnels as $eventPersonnel)
				<tr>
					<th scope="row">{{ $eventPersonnel->personnel_nom }}</th>
					<td>{{ $eventPersonnel->nbrHomme }}</td>
                    <td>{{ $eventPersonnel->nbrFemme }}</td>
                    <td>{{ $eventPersonnel->prixPersonnel }} DH</td>
                    @php
                        $total = $eventPersonnel->prixPersonnel * $eventPersonnel->nbrFemme + $eventPersonnel->prixPersonnel * $eventPersonnel->nbrHomme;
                    @endphp
                    <td>{{ $total }}.00 DH</td>
                    @php
                        $totalGeneralTab3 += $total;
                    @endphp
				</tr>
                @endforeach
                <th class="table-active" colspan="4">Total Général</th>
                <th class="table-active">{{ $totalGeneralTab3 }}.00 DH</th>
			</tbody>
		</table>
		</br></br>
		<table class="table">
			<thead>
				<tr style="background-color:#D91B5C;color:white">
					<th scope="col">Le budget d'événement est :</th>
					<th scope="col">{{  $totalSalle + $totalGeneralTab1 + $totalGeneralTab2 + $totalGeneralTab3}}.00 DH</th>
				</tr>
			</thead>
		</table>
		</br></br>

	</div>
    <form method="GET" action="{{ route('frontClient.pdfFacture')}}">
        @csrf
	<div class="mt-5 d-flex justify-content-end">
		<button type="submit" class="bouton px-5 float-end" style="margin-right: 180px;margin-bottom: 50px;">Téléchargez le PDF</button>
	</div>
</form>
</br></br>

</body>
</html>
@endsection
