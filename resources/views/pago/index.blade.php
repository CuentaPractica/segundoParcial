<table class="table table-hover">
  <thead class="table-primary">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Tipo de pago</th>
      <th scope="col">Accion</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($pagos as $pago)
    <tr >
      <th scope="row">{{ $pago->id }}</th>
         <td>{{ $pago->tipoPago }}</td>
         <td>
            <a href=" {{route('pago.edit',[$pago->id]) }}" class="btn btn-outline-warning btn-m" ><span><i class="fa fa-edit" style="margin-left:-5px;"></i></span></a>
            <a href=" {{route('pago.destroy',[$pago->id]) }}" class="btn btn-outline-danger btn-m" ><span><i class="	fas fa-trash-alt" style="margin-left:-5px;"></i></span></a>
         </td>
    </tr>
  @endforeach
  {{$pagos->links('herramientas.paginacion')}}
  </tbody>
</table>