<table class="table table-hover">
  <thead class="table-primary">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Descripción</th>
      <th scope="col">Porcentaje de descuento</th>
      <th scope="col">Accion</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($descuentos as $descuento)
    <tr >
      <th scope="row">{{ $descuento->id }}</th>
         <td>{{ $descuento->descripcion }}</td>
         <td>{{ $descuento->porcentajeDescuento }}</td>
         <td>
            <a href=" {{route('descuento.edit',[$descuento->id]) }}" class="btn btn-outline-warning btn-m" ><span><i class="fa fa-edit" style="margin-left:-5px;"></i></span></a>
            <a href=" {{route('descuento.destroy',[$descuento->id]) }}" class="btn btn-outline-danger btn-m" ><span><i class="	fas fa-trash-alt" style="margin-left:-5px;"></i></span></a>
         </td>
    </tr>
  @endforeach
  {{$descuentos->links('herramientas.paginacion')}}
  </tbody>
</table>
<footer class="page-footer font-small blue pt-4">
<div class="alert alert-dark" role="alert">{{Auth()->user()->showCounter(7)}}</div>
</footer>