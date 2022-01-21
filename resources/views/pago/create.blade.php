@extends('diseño.contenido')
@section('contenido')
<div id="borde"></div>
<div id="cuadro">
  <nav class="titulo"><h3>Registrar Tipo de Pago</h3></nav>
  <form action="{{ route('pago.store') }}" method="post" class="needs-validation" novalidate>
  @csrf
  <div class="form-row">
    <div class="col-md-4 mb-3">
      <input type="text" name="tipoPago" class="form-control" id="tipoPago" placeholder="Tipo de Pago" value="" required>
      <div class="invalid-feedback">
        Por favor proporcione un nombre válido.
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
@include('pago.index')

@endsection