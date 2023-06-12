<!DOCTYPE html>
<html>
<head>
	<title>Facture</title>
	<style type="text/css">
		body{
			font-family: Arial, Helvetica, sans-serif;
			margin: 0;
			padding: 0;
		}

		.container{
			max-width: 800px;
			margin: 0 auto;
			padding: 20px;
			border: 1px solid  #D91B5C;
		}
        .header {
  display: flex;
  align-items: center;
  margin-top: 30px;
}

		.logo{
			display: inline-block;
			vertical-align: middle;
			margin-right: 20px;
		}

		.logo img{
			max-width: 200px;
		}

		.info{
            flex: 1;
            text-align: right;
		}

		.table{
			border-collapse: collapse;
			width: 100%;
			margin-top: 20px;
		}

		th, td{
			border: 1px solid #ddd;
			padding: 8px;
			text-align: left;
		}

		th{

			font-weight: bold;
		}

		.total{
			font-weight: bold;
		}

        .facture{
            text-align: center;
			margin-top: -60px;


        }
		.event {
    color: #D91B5C;
	font-weight: bold;
    font-size: 40px;
    font-family: 'Times New Roman', Times, serif;
}

h2{
            font-weight: bold;
            font-size: 70px;
            color: #D91B5C;
        }
h2{
  font-weight: bold;
  font-size: 50px;
}

	</style>
</head>
<body>
	<div class="container">

		<div class="logo">
			<p class="event"><strong>EventPlanner</strong></p>
		</div>

	</br></br>
		<div class="facture">
            <h2>Facture</h2>
        </div>
		<hr style="border-color: #D91B5C;  width: 600px;  margin-left: auto; margin-right: auto;">


	</br></br>
		<div class="header">
		<div class="details">
			<p><strong>Facture n° : </strong> {{ $event->id }}</p>
			<p><strong>Date de début : </strong> {{ $event->datestart}}</p>
			<p><strong>Date de fin : </strong> {{ $event->dateEnd}}</p>
			<p><strong>Type d'événement : </strong>  {{ $typeEvent->TypeName}}</p>
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
			<th colspan="3"> Nom de Salle</th>
			<th colspan="3">Prix </th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<th  colspan="3">{{ $salle->SalleName }}</th>
			<td  colspan="3">{{ $salle->price }} DH</td>
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
					<th>Equipement</th>
					<th>Me choix</th>
					<th>Quantité</th>
                    <th>Prix unitaire</th>
					<th>Total</th>
				</tr>
			</thead>
			<tbody>
                 @php
                    $totalGeneralTab1 = 0;
                    $total = 0;
                @endphp
                @foreach($eventArticles as $eventArticle)
				<tr>
					<th>{{ $eventArticle->equipement_nom }}</th>
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

				<tr style="background-color:#adb5bd3a;">
					<td colspan="4" class="total">Total Général</td>
					<td class="total table-active">{{ $totalGeneralTab1 }}.00 DH</td>
				</tr>
			</tbody>
		</table>
    </br></br>
        <table class="table">
			<thead>
				<tr style="background-color:#D91B5C;color:white">
					<th>Services</th>
					<th>Mes choix</th>
					<th>Total</th>
				</tr>
			</thead>
			<tbody>
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
				<tr style="background-color:#adb5bd3a;">
					<td colspan="2" class="total">Total Général</td>
					<td class="total table-active">{{ $totalGeneralTab2 }}.00 DH</td>
				</tr>
			</tbody>
		</table>
    </br></br>
    <table class="table">
        <thead>
          <tr style="background-color:#D91B5C;color:white">
            <th>Personnel</th>
            <th>Femme</th>
            <th>Homme</th>
            <th>Prix unitaire</th>
            <th>Total</th>
          </tr>
        </thead>
        <tbody>
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
          </tr>
          <tr style="background-color:#adb5bd3a;">
            <td colspan="4" class="total">Total général</td>
            <td class="total table-active">{{ $totalGeneralTab3 }}.00 DH</td>
          </tr>
        </tbody>
      </table>

</br></br>

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
</body>
</html>
