@extends('diseño.contenido')
@section('contenido')
<div id="borde"> <nav class="titulo"><h3>RESERVAS</h3></nav></div>
<div id="cuadro">

<table class="table table-hover table-responsive">
  <thead class="table-primary">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">CLIENTE</th>
      <th scope="col">FECHA DE RESERVA</th>
      <th scope="col">FECHA PARA RECOGER</th>
      <th scope="col">ENCARGADO</th>
      <th scope="col">ESTADO</th>
      <th scope="col">ACCIÓN</th>
      <th scope="col">PROCESO</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($reservas as $reserva)
    <tr >
      <th scope="row">{{$reserva->id}}</th>
         <td>{{$reserva->clientes->nombre}} {{$reserva->clientes->apellidos}}</td>
         <td>{{ $reserva->created_at }}</td>
         <td>{{ $reserva->fechaRecoger}}</td>
         <td>{{$reserva->encargados->nombre}} {{$reserva->encargados->apellidos}}</td>
         <td>{{ $reserva->estado==0 ? 'No vendido':'Vendido'}}</td>
         <td>
          <a href="{{route('detalle_reserva.create',[$reserva->id]) }}" class="btn btn-outline-warning btn-m" ><span><i class="fa fa-edit" style="margin-left:-5px;"></i></span></a>
          <a href=" {{route('reserva.destroy',[$reserva->id]) }}" class="btn btn-outline-danger btn-m"><span><i class="	fas fa-trash-alt" style="margin-left:-5px;"></i></span></a>
         </td>
         <td>
          <a href="{{route('detalle_venta.venderReserva',[$reserva->id]) }}" class="btn btn-outline-primary btn-m" >Vender</a>
         </td>
    </tr>
  @endforeach
  {{$reservas->links('herramientas.paginacion')}}
  </tbody>
</table>
</div>
@endsection