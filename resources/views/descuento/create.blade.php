@extends('diseño.contenido')
@section('contenido')
<div id="borde"></div>
<div id="cuadro">
  <nav class="titulo"><h3>Registrar Descuento</h3></nav>
  <form action="{{ route('descuento.store') }}" method="post" class="needs-validation" novalidate>
  @csrf
  <div class="form-row">
    <div class="col-md-4 mb-3">
      <input type="text" name="descripcion" class="form-control" id="descripcion" placeholder="Descripción" value="" required>
      <div class="invalid-feedback">
        Por favor proporcione un nombre válido.
      </div>
    </div>
    <div class="col-md-4 mb-3">
      <input type="number" step='0.01' name="descuento" class="form-control" id="descuento" placeholder="Porcentaje descuento ej. 0.03" value="" required>
      <div class="invalid-feedback">
        Por favor proporcione un porcentaje válido.
      </div>
    </div>
    <div class="col-md-4 mb-3">
    <button class="btn btn-primary" type="submit">Registrar</button>
   </div>
  </div>
</form>
</div>
<div id="borde"></div>

<br>
@include('descuento.index')

@endsection