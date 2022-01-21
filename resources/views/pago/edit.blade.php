@extends('diseño.contenido')
@section('contenido')
<div id="borde"></div>
<div id="cuadro">
  <nav class="titulo"><h3>Modificar Marca</h3></nav>
  <form action="{{ route('pago.update',[$pago->id]) }}" method="post" class="needs-validation" novalidate>
  @csrf
  @method('PUT')
  <div class="form-row">
    <div class="col-md-4 mb-3">
      <input type="text" name="tipoPago" class="form-control" id="tipoPago" placeholder="Tipo de Pago" value="{{$pago->tipoPago}}" required>
      <div class="invalid-feedback">
        Por favor proporcione un nombre válido.
      </div>
    </div>
    <div class="col-md-4 mb-3">
    <button class="btn btn-primary" type="submit">Modificar</button>
   </div>
  </div>  
 
</form>
</div>
<div id="borde"></div>

<br>
@include('pago.index')

@endsection