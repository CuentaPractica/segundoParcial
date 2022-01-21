@extends('diseño.contenido')
@section('contenido')
<div class="card shadow">
    <div class="card-header border-0">
      <div class="row align-items-center">
        <div class="col">
          <h3 class="mb-0">Frecuencia de ventas</h3>
        </div>
      </div>
    </div>
   
    <div class="card-body" role="alert">
        <div id="container">
        <script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<script>
    //HIGHCHARTS WITH DATA LABELS
    Highcharts.chart('container', {
        chart: {
            type: 'line'
        },
        title: {
            text: 'ventas registradas mensualmente'
        },
        xAxis: {
            categories: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dec']
        },
        yAxis: {
            title: {
                text: 'Cantidad de ventas'
            }
        },
        plotOptions: {
            line: {
                dataLabels: {
                    enabled: true
                },
                enableMouseTracking: false
            }
        },
        series: [{
            name: 'ventas registradas',
            data: {!! $counts !!},
        }
        ]
    });
</script>
        </div>
   </div>
   
</div>
<footer class="page-footer font-small blue pt-4">
<div class="alert alert-dark" role="alert">{{Auth()->user()->showCounter(8)}}</div>
</footer>
@endsection
