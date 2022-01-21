@extends('diseño.contenido')
@section('contenido')
<div id="borde"></div>
<div id="cuadro">
  <nav class="titulo"><h3>MODIFICAR REPUESTO</h3></nav>
  <form action="{{ route('repuesto.update',[$repuesto->id]) }}" method="post" class="needs-validation" novalidate>
  @csrf
  @method('put')
<div class="form-row">
  <div class="col-md-4 mb-3">
      <label for="nombre">Nombre</label>
      <input type="text" name="nombre" class="form-control" id="nombre" placeholder="nombre" value="{{$repuesto->nombre}}" required>
      <div class="invalid-feedback">
        Por favor proporcione un nombre válido.
      </div>
    </div>
    <div class="col-md-4 mb-3">
      <label for="modelo">Modelo</label>
      <input type="text" name="modelo" class="form-control" id="modelo" placeholder="modelo" value="{{$repuesto->modelo}}" required>
      <div class="invalid-feedback">
        Por favor proporcione un modelo válido.
      </div>
    </div>
    <div class="col-md-3 mb-3">
     <label for="marca">Marca</label>
     <select name="marca" id="marca" class="custom-select" size="3"  required>
     @foreach ($marcas as $marca)
      <option value="{{$marca->id}}" {{$repuesto->idMarca==$marca->id ? 'selected':''}}>{{$marca->nombre}}</option>
      @endforeach
     </select>
     <div class="invalid-feedback">
        Por favor seleccione una marca.
      </div>
    </div>
    <div class="col-md-4 mb-3">
      <label for="precio">Precio</label>
      <input type="number" step='0.01' name="precio" class="form-control" id="precio" placeholder="Nombre de categoría" value="{{$repuesto->precio}}" required>
      <div class="invalid-feedback">
        Por favor proporcione un precio válido.
      </div>
    </div>
    <div class="col-md-4 mb-3">
      <label for="stock">Stock</label>
      <input type="number" name="stock" class="form-control" id="stock" placeholder="stock" value="{{$repuesto->stock}}" required>
      <div class="invalid-feedback">
        Por favor proporcione un stock válido.
      </div>
    </div>
    <div class="col-md-3 mb-3">
     <label for="categoria">Categoria</label>
     <select class="custom-select" size="3" name="categoria" required>
     @foreach ($categorias as $categoria)
      <option value="{{$categoria->id}}" {{$repuesto->idCategoria==$categoria->id ? 'selected':''}}>{{$categoria->nombre}}</option>
      @endforeach
     </select>
     <div class="invalid-feedback">
        Por favor seleccione una categoría.
      </div>
    </div>
  </div>
  <button class="btn btn-primary" type="submit">Modificar</button>
</form>
</div>
<div id="borde"></div>
@endsection