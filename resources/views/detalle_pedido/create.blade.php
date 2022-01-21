@extends('diseño.contenido')
@section('contenido')
<div id="borde"></div>
<div id="cuadro">
  <nav class="titulo"><h3>REGISTRAR PRODUCTOS AL PEDIDO</h3></nav>
  <form action="{{route('detalle_pedido.store',[$pedido->id])}}" method="post" class="needs-validation form-inline" novalidate>
  @csrf

  <div class="form-group mx-sm-3 mb-2">
  <input type="search" list="lista" name="repuesto" class="form-control" id="repuesto" placeholder="Código de producto" required>
      <div class="invalid-feedback">
        Por favor proporcione un código válido.
      </div>
  </div>
  <datalist id="lista">
  @foreach ($repuestos as $repuesto)
  <option value="{{$repuesto->id}}">
  @endforeach
 </datalist>

  <div class="form-group mx-sm-3 mb-2">
  <input type="number" name="cantidad" value="" class="form-control" id="cantidad" placeholder="cantidad" aria-describedby="inputGroupPrepend" required>
  </div>

  <div class="form-group mx-sm-3 mb-2">
  <input type="number" step='0.01'  name="precioTotal" value="" class="form-control" id="precioTotal" placeholder="Precio total" aria-describedby="inputGroupPrepend" required>
  </div>

  <button type="submit" class="btn btn-info mb-2">Añadir Producto</button>

</form>
@if ( session('mensaje') )
    <div class="alert alert-danger">{{ session('mensaje') }}</div>
@endif
<table class="table table-hover table-responsive">
  <thead class="table-primary">
    <tr>
      <th scope="col">REPUESTO</th>
      <th scope="col">PRECIO UNITARIO</th>
      <th scope="col">CANTIDAD</th>
      <th scope="col">PRECIO TOTAL</th>
      <th scope="col">ACCIÓN</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($pedido->detallesPedidos as $detallePedido)
    <tr >
      <th scope="row">{{$detallePedido->repuestos->nombre}} [modelo]: {{$detallePedido->repuestos->modelo}} [marca]:{{$detallePedido->repuestos->marcas->nombre}}</th>
         <td>{{ $detallePedido->precioUnitario }}</td>
         <td>{{ $detallePedido->cantidad }}</td>
         <td>{{ $detallePedido->precioTotal }}</td>
         <td>
         <a href=" {{route('detalle_pedido.destroy',[$detallePedido->id,$pedido->id]) }}" class="btn btn-outline-danger btn-m"><span><i class="	fas fa-trash-alt" style="margin-left:-5px;"></i></span></a>
         </td>
    </tr>
  @endforeach
  </tbody>
</table>
</div>
<div id="borde">
      <a href=" {{route('pedido.edit',[$pedido->id]) }}" class="btn btn-dark my-2 my-sm-0">FINALIZAR PEDIDO</a>
</div>

@endsection