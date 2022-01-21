@extends('diseño.contenido')
@section('contenido')
<div class="col-md-4 mb-3">
  <a href="{{route('proveedor.create')}}" class="btn btn-outline-primary">Registrar</a>
</div>
<div id="borde">
<form action="{{ route('proveedor.buscar') }}" method="GET"   class="form-inline my-2 my-lg-0">
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
      <th scope="col">Empresa</th>
      <th scope="col">Direccion</th>
      <th scope="col">Tipo</th>
      <th scope="col">Accion</th>
      <th scope="col">Proceso</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($proveedores as $proveedor)
    <tr >
      <th scope="row">{{ $proveedor->id }}</th>
         <td>{{ $proveedor->nombre }}</td>
         <td>{{ $proveedor->apellidos }}</td>
         <td>{{ $proveedor->CI }}</td>
         <td>{{ $proveedor->telefono }}</td>
         <td>{{ $proveedor->empresa }}</td>
         <td>{{ $proveedor->direccion }}</td>
         <td>{{ $proveedor->tipo }}</td>
         <td>
            <a href=" {{route('proveedor.edit',[$proveedor->id]) }}" class="btn btn-outline-warning btn-m" ><span><i class="fa fa-edit" style="margin-left:-5px;"></i></span></a>
            <a href=" {{route('proveedor.destroy',[$proveedor->id]) }}" class="btn btn-outline-danger btn-m"><span><i class="	fas fa-trash-alt" style="margin-left:-5px;"></i></span></a>
         </td>
         <td>
            <a href=" {{route('pedido.create',[$proveedor->id]) }}" class="btn btn-outline-primary btn-m" >comprar</a>
         </td>
    </tr>
  @endforeach
  {{$proveedores->links('herramientas.paginacion')}}
  </tbody>
</table>
</div>
<footer class="page-footer font-small blue pt-4">
<div class="alert alert-dark" role="alert">{{Auth()->user()->showCounter(2)}}</div>
</footer>
</div>
@endsection