@extends('diseño.contenido')
@section('contenido')
<div id="borde"></div>
<div id="cuadro">
  <nav class="titulo"><h3>Modificar Descuento</h3></nav>
  <form action="{{ route('descuento.update',[$descuento->id]) }}" method="post" class="needs-validation" novalidate>
  @csrf
  @method('PUT')
  <div class="form-row">
    <div class="col-md-4 mb-3">
      <input type="text" name="descripcion" class="form-control" id="descripcion" placeholder="Descripción" value="{{$descuento->descripcion}}" required>
      <div class="invalid-feedback">
        Por favor proporcione un nombre válido.
      </div>
    </div>
    <div class="col-md-4 mb-3">
      <input type="number" step='0.01' name="descuento" class="form-control" id="descuento" placeholder="Porcentaje descuento ej. 0.03" value="{{$descuento->porcentajeDescuento}}" required>
      <div class="invalid-feedback">
        Por favor proporcione un porcentaje válido.
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
@include('descuento.index')

@endsection