@extends('diseño.contenido')
@section('contenido')
<div id="borde"></div>
<div id="cuadro">
  <nav class="titulo"><h3>REGISTRAR CLIENTE</h3></nav>
  <form action="{{ route('cliente.store') }}" method="post" >
  @csrf
  <div class="form-row">

    <div class="col-md-4 mb-3">
      <label for="nombre">Nombre</label>
      <input type="text" name="nombre" class="form-control" id="nombre" placeholder="nombre" value="{{old('nombre')}}" required>
      @error('nombre')
             <span class="text-danger">{{ $message}}</span>
        @enderror
    </div>

    <div class="col-md-4 mb-3">
      <label for="apellidos">Apellidos</label>
      <input type="text" name="apellidos" class="form-control" id="apellidos" placeholder="apellidos" value="{{old('apellidos')}}" required>
      @error('apellidos')
             <span class="text-danger">{{ $message}}</span>
        @enderror
    </div>

    <div class="col-md-4 mb-3">
      <label for="CI">Carnet Identidad</label>
        <input type="number" name="CI" value="{{old('CI')}}" class="form-control" id="CI" placeholder="carnet identidad" aria-describedby="inputGroupPrepend" required>
    </div>

    <div class="col-md-4 mb-3">
      <label for="telefono">Telefono</label>
        <input type="number" name="telefono" value="{{old('telefono')}}" class="form-control" id="telefono" placeholder="telefono" aria-describedby="inputGroupPrepend" required>
    </div>
  </div>
  <button class="btn btn-primary" type="submit">Registrar</button>
</form>
</div>
<div id="borde"></div>
@endsection