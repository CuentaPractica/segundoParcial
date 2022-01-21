@extends('diseño.contenido')
@section('contenido')
<div id="borde"></div>
<div id="cuadro">
  <nav class="titulo"><h3>Modificar Marca</h3></nav>
  <form action="{{ route('marca.update',[$marca->id]) }}" method="post" class="needs-validation" novalidate>
  @csrf
  @method('PUT')
  <div class="form-row">
    <div class="col-md-4 mb-3">
      <input type="text" name="nombre" class="form-control" id="validationCustom01" placeholder="Nombre de marca" value="{{$marca->nombre}}" required>
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
@include('marca.index')

@endsection