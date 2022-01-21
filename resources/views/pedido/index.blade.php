@extends('diseño.contenido')
@section('contenido')
<div id="borde"> <nav class="titulo"><h3>PEDIDOS</h3></nav></div>
<div id="cuadro">

<table class="table table-hover table-responsive">
  <thead class="table-primary">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">TOTAL</th>
      <th scope="col">FECHA</th>
      <th scope="col">PROVEEDOR</th>
      <th scope="col">ACCIÓN</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($pedidos as $pedido)
    <tr >
      <th scope="row">{{$pedido->id}}</th>
         <td>{{ $pedido->montoTotal }}</td>
         <td>{{ $pedido->created_at}}</td>
         <td>{{$pedido->proveedores->nombre}} {{$pedido->proveedores->apellidos}}</td>
         <td>
            <a href=" {{route('detalle_pedido.create',[$pedido->id]) }}" class="btn btn-outline-warning btn-m" ><span><i class="fa fa-edit" style="margin-left:-5px;"></i></span></a>
            <a href=" {{route('pedido.destroy',[$pedido->id]) }}" class="btn btn-outline-danger btn-m"><span><i class="	fas fa-trash-alt" style="margin-left:-5px;"></i></span></a>
         </td>
    </tr>
  @endforeach
  {{$pedidos->links('herramientas.paginacion')}}
  </tbody>
</table>
</div>
<footer class="page-footer font-small blue pt-4">
<div class="alert alert-dark" role="alert">{{Auth()->user()->showCounter(3)}}</div>
</footer>
@endsection