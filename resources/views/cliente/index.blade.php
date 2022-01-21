@extends('diseño.contenido')
@section('contenido')
<div class="col-md-4 mb-3">
  <a href="{{route('cliente.create')}}" class="btn btn-outline-primary">Registrar</a>
</div>
<div id="borde">
<form action="{{ route('cliente.buscar') }}" method="GET"   class="form-inline my-2 my-lg-0">
   @csrf
      <input class="form-control mr-sm-2" type="text" name="buscar" placeholder="Buscar" aria-label="Search">
      <select id="tipo" class="form-control" name="tipo" value="">
        <option value=1>Carnet Identidad</option>
        <option value=2>Apellidos</option>
      </select>&nbsp;&nbsp;&nbsp;
      <button class="btn btn-outline-dark my-2 my-sm-0" type="submit">Buscar</button>
  </form>
</div>
<div id="cuadro">
<table class="table table-hover table-responsive">
  <thead class="table-primary">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nombre</th>
      <th scope="col">Apellidos</th>
      <th scope="col">CI</th>
      <th scope="col">Telefono</th>
      <th scope="col">Accion</th>
      <th scope="col">Proceso</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($clientes as $cliente)
    <tr >
      <th scope="row">{{ $cliente->id }}</th>
         <td>{{ $cliente->nombre }}</td>
         <td>{{ $cliente->apellidos }}</td>
         <td>{{ $cliente->CI }}</td>
         <td>{{ $cliente->telefono }}</td>
         <td>
            <a href=" {{route('cliente.edit',[$cliente->id]) }}" class="btn btn-outline-warning btn-m" ><span><i class="fa fa-edit" style="margin-left:-5px;"></i></span></a>
            <a href=" {{route('cliente.destroy',[$cliente->id]) }}" class="btn btn-outline-danger btn-m"><span><i class="	fas fa-trash-alt" style="margin-left:-5px;"></i></span></a>
         </td>
         <td>
            <a href=" {{route('venta.create',[$cliente->id]) }}" class="btn btn-outline-primary btn-m" >vender</a>
            <a href=" {{route('reserva.create',[$cliente->id]) }}" class="btn btn-outline-primary btn-m" >Reservar</a>
         </td>
    </tr>
  @endforeach
  {{$clientes->links('herramientas.paginacion')}}
  </tbody>
</table>
</div>
</div>
@endsection