@extends('diseño.contenido')
@section('contenido')
<div class="col-md-4 mb-3">
  <a href="{{route('repuesto.create')}}" class="btn btn-outline-primary">Registrar</a>
</div>
<div id="borde"></div>
<div id="cuadro">
<table class="table table-hover table-responsive">
  <thead class="table-primary">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nombre</th>
      <th scope="col">Modelo</th>
      <th scope="col">Marca</th>
      <th scope="col">Precio</th>
      <th scope="col">Stock</th>
      <th scope="col">Categoría</th>
      <th scope="col">Accion</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($repuestos as $repuesto)
    <tr >
      <th scope="row">{{ $repuesto->id }}</th>
         <td>{{ $repuesto->nombre }}</td>
         <td>{{ $repuesto->modelo }}</td>
         <td>{{ $repuesto->marcas->nombre }}</td>
         <td>{{ $repuesto->precio }}</td>
         <td>{{ $repuesto->stock }}</td>
         <td>{{ $repuesto->categorias->nombre}}</td>
         <td>
            <a href=" {{route('repuesto.edit',[$repuesto->id]) }}" class="btn btn-outline-warning btn-m" ><span><i class="fa fa-edit" style="margin-left:-5px;"></i></span></a>
            <a href=" {{route('repuesto.destroy',[$repuesto->id]) }}" class="btn btn-outline-danger btn-m"><span><i class="	fas fa-trash-alt" style="margin-left:-5px;"></i></span></a>
         </td>
    </tr>
  @endforeach
  {{$repuestos->links('herramientas.paginacion')}}
  </tbody>
</table>
</div>
<footer class="page-footer font-small blue pt-4">
<div class="alert alert-dark" role="alert">{{Auth()->user()->showCounter(1)}}</div>
</footer>
</div>
@endsection