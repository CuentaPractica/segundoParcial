@extends('diseño.contenido')
@section('contenido')
<div id="borde"></div>
<div id="cuadro">
  <nav class="titulo"><h3>REGISTRAR REPUESTO</h3></nav>
  <form action="{{ route('repuesto.store') }}" method="post" class="needs-validation" novalidate>
  @csrf
<div class="form-row">
  <div class="col-md-4 mb-3">
      <label for="nombre">Nombre</label>
      <input type="text" name="nombre" class="form-control" id="nombre" placeholder="nombre" value="" required>
      <div class="invalid-feedback">
        Por favor proporcione un nombre válido.
      </div>
    </div>
    <div class="col-md-4 mb-3">
      <label for="modelo">Modelo</label>
      <input type="text" name="modelo" class="form-control" id="modelo" placeholder="Nombre de categoría" value="" required>
      <div class="invalid-feedback">
        Por favor proporcione un modelo válido.
      </div>
    </div>
    <div class="col-md-3 mb-3">
     <label for="marca">Marca</label>
     <select name="marca" id="marca" class="custom-select" size="3"  required>
     @foreach ($marcas as $marca)
      <option value="{{$marca->id}}">{{$marca->nombre}}</option>
      @endforeach
     </select>
     <div class="invalid-feedback">
        Por favor seleccione una marca.
      </div>
    </div>
    <div class="col-md-4 mb-3">
      <label for="precio">Precio</label>
      <input type="number" step='0.01' name="precio" class="form-control" id="precio" placeholder="Nombre de categoría" value="" required>
      <div class="invalid-feedback">
        Por favor proporcione un precio válido.
      </div>
    </div>
    <div class="col-md-3 mb-3">
     <label for="marca">Categoria</label>
     <select class="custom-select" size="3" name="categoria" required>
     @foreach ($categorias as $categoria)
      <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
      @endforeach
     </select>
     <div class="invalid-feedback">
        Por favor seleccione una categoría.
      </div>
    </div>
  </div>
  <button class="btn btn-primary" type="submit">Registrar</button>
</form>
</div>
<div id="borde"></div>
<footer class="page-footer font-small blue pt-4">
<div class="alert alert-dark" role="alert">{{Auth()->user()->showCounter(1)}}</div>
</footer>
@endsection