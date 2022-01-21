@extends('diseño.contenido')
@section('contenido')
<div id="borde"></div>
<div id="cuadro">
  <nav class="titulo"><h3>MODIFICAR PROVEEDOR</h3></nav>
  <form action="{{ route('proveedor.update',[$proveedor->id]) }}" method="post" >
  @csrf
  @method('put')
  <div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="nombre">Nombre</label>
      <input type="text" name="nombre" class="form-control" id="nombre" placeholder="nombre" value="{{$proveedor->nombre}}" required>
      @error('nombre')
             <span class="text-danger">{{ $message}}</span>
        @enderror
    </div>

    <div class="col-md-4 mb-3">
      <label for="apellidos">Apellidos</label>
      <input type="text" name="apellidos" class="form-control" id="apellidos" placeholder="apellidos" value="{{$proveedor->apellidos}}" required>
      @error('apellidos')
             <span class="text-danger">{{ $message}}</span>
        @enderror
    </div>

    <div class="col-md-4 mb-3">
      <label for="CI">Carnet Identidad</label>
        <input type="number" name="CI" value="{{$proveedor->CI}}" class="form-control" id="CI" placeholder="carnet identidad" aria-describedby="inputGroupPrepend" required>
    </div>

    <div class="col-md-4 mb-3">
      <label for="telefono">Telefono</label>
        <input type="number" name="telefono" value="{{$proveedor->telefono}}" class="form-control" id="telefono" placeholder="telefono" aria-describedby="inputGroupPrepend" required>
    </div>

    <div class="col-md-4 mb-3">
      <label for="empresa">Empresa</label>
        <input type="text"  name="empresa" value="{{$proveedor->empresa}}" class="form-control" id="empresa" placeholder="empresa" value="{{$proveedor->empresa}}" required>
        @error('empresa')
             <span class="text-danger">{{ $message}}</span>
        @enderror
    </div>
    <div class="col-md-4 mb-3">
      <label for="direccion">Direccion</label>
        <input type="text"  name="direccion" value="{{$proveedor->direccion}}" class="form-control" id="direccion" placeholder="direccion" value="{{$proveedor->direccion}}" required>
        @error('direccion')
             <span class="text-danger">{{ $message}}</span>
        @enderror
    </div>
</div>
  <button class="btn btn-primary" type="submit">Modificar</button>
</form>
</div>
<div id="borde"></div>
@endsection