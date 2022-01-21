@extends('diseño.contenido')
@section('contenido')
<div id="borde"></div>
<div id="cuadro">
  <nav class="titulo"><h3>REGISTRAR PRODUCTOS PARA LA RESERVA</h3></nav>
  <form action="{{route('detalle_reserva.store',[$reserva->id])}}" method="post" class="needs-validation form-inline" novalidate>
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
      <th scope="col">ACCIÓN</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($reserva->detallesReservas as $detalleReserva)
    <tr >
      <th scope="row">{{$detalleReserva->repuestos->nombre}} [modelo]: {{$detalleReserva->repuestos->modelo}} [marca]:{{$detalleReserva->repuestos->marcas->nombre}}</th>
         <td>{{ $detalleReserva->precioUnitario }}</td>
         <td>{{ $detalleReserva->cantidad }}</td>
         <td>{{ $detalleReserva->idDescuento==0 ? 'Sin descuento':$detalleReserva->descuentos->descripcion}}</td>
         <td>
         <a href=" {{route('detalle_reserva.destroy',[$detalleReserva->id,$reserva->id]) }}" class="btn btn-outline-danger btn-m"><span><i class="	fas fa-trash-alt" style="margin-left:-5px;"></i></span></a>
         </td>
    </tr>
  @endforeach
  </tbody>
</table>
</div>
<div id="borde">
<form action="{{route('reserva.update',[$reserva->id])}}" method="POST"   class="form-inline my-2 my-lg-0">
   @csrf
   @method('PUT')
   <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">Recoger reserva</label>
   <div class="form-group mx-sm-3 mb-2">
     <input type="date" name="fechaRecoger" value="{{$reserva->fechaRecoger}}" class="form-control" id="fechaRecoger" placeholder="Fecha que tiene que recoger" aria-describedby="inputGroupPrepend" required>
   </div>
      <button class="btn btn-dark my-2 my-sm-0" type="submit">FINALIZAR RESERVA</button>
  </form>
</div>
<footer class="page-footer font-small blue pt-4">
<div class="alert alert-dark" role="alert">{{Auth()->user()->showCounter(5)}}</div>
</footer>

@endsection