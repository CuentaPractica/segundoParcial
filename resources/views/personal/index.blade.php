@extends('diseño.contenido')
@section('contenido')
<div class="col-md-4 mb-3">
  <a href="{{route('personal.create')}}" class="btn btn-outline-primary">Registrar</a>
</div>
<div id="borde"></div>
<div id="cuadro">
<table class="table table-hover table-responsive">
  <thead class="table-primary">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nombre</th>
      <th scope="col">Apellidos</th>
      <th scope="col">CI</th>
      <th scope="col">Telefono</th>
      <th scope="col">Dirección</th>
      <th scope="col">Rol</th>
      <th scope="col">Email</th>
      <th scope="col">Accion</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($personal as $person)
    <tr >
      <th scope="row">{{ $person->id }}</th>
         <td>{{ $person->nombre }}</td>
         <td>{{ $person->apellidos }}</td>
         <td>{{ $person->CI }}</td>
         <td>{{ $person->telefono }}</td>
         <td>{{ $person->direccion }}</td>
         <td>{{ $person->tipo=='E'?'Encargado':'Administrador' }}</td>
         <td>{{ $person->users->email}}</td>
         <td>
            <a href=" {{route('personal.edit',[$person->id]) }}" class="btn btn-outline-warning btn-m" ><span><i class="fa fa-edit" style="margin-left:-5px;"></i></span></a>
            <a href=" {{route('personal.destroy',[$person->id]) }}" class="btn btn-outline-danger btn-m"><span><i class="	fas fa-trash-alt" style="margin-left:-5px;"></i></span></a>
         </td>
    </tr>
  @endforeach
  {{$personal->links('herramientas.paginacion')}}
  </tbody>
</table>
</div>
<footer class="page-footer font-small blue pt-4">
<div class="alert alert-dark" role="alert">{{Auth()->user()->showCounter(2)}}</div>
</footer>
</div>
@endsection