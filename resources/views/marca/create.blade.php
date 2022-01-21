@extends('diseño.contenido')
@section('contenido')
<div id="borde"></div>
<div id="cuadro">
  <nav class="titulo"><h3>Registrar Marca</h3></nav>
  <form action="{{ route('marca.store') }}" method="post" class="needs-validation" novalidate>
  @csrf
  <div class="form-row">
    <div class="col-md-4 mb-3">
      <input type="text" name="nombre" class="form-control" id="validationCustom01" placeholder="Nombre de marca" value="" required>
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
@include('marca.index')

@endsection