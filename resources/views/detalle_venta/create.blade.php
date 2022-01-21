@extends('diseño.contenido')
@section('contenido')
<div id="borde"></div>
<div id="cuadro">
  <nav class="titulo"><h3>REGISTRAR PRODUCTOS A LA VENTA</h3></nav>
  <form action="{{route('detalle_venta.store',[$venta->id])}}" method="post" class="needs-validation form-inline" novalidate>
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
  <select id="descuento" class="form-control" name="descuento" value="">
      <option value=0>No tiene descuento</option>
        @foreach($descuentos as $descuento)
        <option value="{{$descuento->id}}">{{$descuento->descripcion}}</option>
        @endforeach
      </select>
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
      <th scope="col">PRECIO</th>
      <th scope="col">CANTIDAD</th>
      <th scope="col">DESCUENTO</th>
      <th scope="col">PRECIO TOTAL</th>
      <th scope="col">ACCIÓN</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($venta->detallesVentas as $detalleVenta)
    <tr >
      <th scope="row">{{$detalleVenta->repuestos->nombre}} [modelo]: {{$detalleVenta->repuestos->modelo}} [marca]:{{$detalleVenta->repuestos->marcas->nombre}}</th>
         <td>{{ $detalleVenta->precioUnitario }}</td>
         <td>{{ $detalleVenta->cantidad }}</td>
         <td>{{ $detalleVenta->idDescuento==0 ? 'Sin descuento':$detalleVenta->descuentos->descripcion}}</td>
         <td>{{ $detalleVenta->precioTotal }}</td>
         <td>
         <a href=" {{route('detalle_venta.destroy',[$detalleVenta->id,$venta->id]) }}" class="btn btn-outline-danger btn-m"><span><i class="	fas fa-trash-alt" style="margin-left:-5px;"></i></span></a>
         </td>
    </tr>
  @endforeach
  </tbody>
</table>
</div>
<div id="borde">
<form action="{{route('venta.update',[$venta->id])}}" method="POST"   class="form-inline my-2 my-lg-0">
   @csrf
   @method('PUT')
   <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">Tipo de pago</label>
      <select id="pago" class="form-control" name="pago" value="">
        @foreach($pagos as $pago)
        <option value="{{$pago->id}}">{{$pago->tipoPago}}</option>
        @endforeach
      </select>&nbsp;&nbsp;&nbsp;
      <button class="btn btn-dark my-2 my-sm-0" type="submit">FINALIZAR VENTA</button>
  </form>
</div>

@endsection