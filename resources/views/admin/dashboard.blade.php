<head>
  <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/formAdmin.css') }}">

</head>

@extends('layouts.admin')

@section('content')

<html>
<body>
    <div class="ms-5"><p class="fs-3 pb-2 titre2 Merriweather ">Statistique des services choisis par les Clients</p></div>
<div class="d-flex justify-content-center">
     
    <div class="container">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages': ['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable(@json($chartData));

        var options = {
          title: 'Statistique des services choisis par le Client'
          
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>

    <div id="piechart" style="width: 500px; height: 500px;"></div>
  </div>
  <div class="container ">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawStuff);

      function drawStuff() {
        var data = new google.visualization.arrayToDataTable(@json($chartData));

        var options = {
          title: 'Chess opening moves',
          width: 550,
          legend: { position: 'none' },
          chart: { title: 'Sous Service Statistics',
                   subtitle: 'popularity by percentage' },
          bars: 'vertical', // Required for Material Bar Charts.
          axes: {
            x: {
              0: { side: 'top', label: 'Percentage'} // Top x-axis.
            }
          },
          bar: { groupWidth: "90%" }
        };

        var chart = new google.charts.Bar(document.getElementById('top_x_div'));
        chart.draw(data, options);
      }
    </script>
       <div id="top_x_div" style="width: 500px; height: 500px;"></div>
  </div>
 
 


</div>
<!-- Equipements -->

 
    
</body>
</html>

@endsection
