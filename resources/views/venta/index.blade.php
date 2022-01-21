@extends('diseño.contenido')
@section('contenido')
<div id="borde"> <nav class="titulo"><h3>VENTAS</h3></nav></div>
<div id="cuadro">

<table class="table table-hover table-responsive">
  <thead class="table-primary">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">CLIENTE</th>
      <th scope="col">TOTAL</th>
      <th scope="col">TIPO DE PAGO</th>
      <th scope="col">FECHA</th>
      <th scope="col">ENCARGADO</th>
      <th scope="col">ACCIÓN</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($ventas as $venta)
    <tr >
      <th scope="row">{{$venta->id}}</th>
         <td>{{$venta->clientes->nombre}} {{$venta->clientes->apellidos}}</td>
         <td>{{ $venta->montoTotal }}</td>
         <td>{{ $venta->idPago==0 ? ' ':$venta->pagos->tipoPago}}</td>
         <td>{{ $venta->created_at}}</td>
         <td>{{$venta->encargados->nombre}} {{$venta->encargados->apellidos}}</td>
         <td>
         <a href=" {{route('detalle_venta.create',[$venta->id]) }}" class="btn btn-outline-warning btn-m" ><span><i class="fa fa-edit" style="margin-left:-5px;"></i></span></a>
            <a href=" {{route('venta.destroy',[$venta->id]) }}" class="btn btn-outline-danger btn-m"><span><i class="	fas fa-trash-alt" style="margin-left:-5px;"></i></span></a>
         </td>
    </tr>
  @endforeach
  {{$ventas->links('herramientas.paginacion')}}
  </tbody>
</table>
</div>
<footer class="page-footer font-small blue pt-4">
<div class="alert alert-dark" role="alert">{{Auth()->user()->showCounter(4)}}</div>
</footer>
@endsection