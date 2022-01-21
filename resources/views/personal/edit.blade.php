@extends('diseño.contenido')
@section('contenido')
<div id="borde"></div>
<div id="cuadro">
  <nav class="titulo"><h3>MODIFICAR PERSONAL</h3></nav>
  <form action="{{ route('personal.update',[$personal->id]) }}" method="post" >
  @csrf
  @method('PUT')
  <div class="form-row">

    <div class="col-md-4 mb-3">
      <label for="nombre">Nombre</label>
      <input type="text" name="nombre" class="form-control" id="nombre" placeholder="nombre" value="{{$personal->nombre}}" required>
      @error('nombre')
        <span class="text-danger">{{ $message}}</span>
      @enderror
    </div>

    <div class="col-md-4 mb-3">
      <label for="apellidos">Apellidos</label>
      <input type="text" name="apellidos" class="form-control" id="apellidos" placeholder="apellidos" value="{{$personal->apellidos}}" required>
      @error('apellidos')
        <span class="text-danger">{{ $message}}</span>
      @enderror
    </div>

    <div class="col-md-4 mb-3">
      <label for="CI">Carnet Identidad</label>
      <input type="number" name="CI" value="{{$personal->CI}}" class="form-control" id="CI" placeholder="carnet identidad" aria-describedby="inputGroupPrepend" required>
    </div>

    <div class="col-md-4 mb-3">
      <label for="telefono">Telefono</label>
      <input type="number" name="telefono" value="{{$personal->telefono}}" class="form-control" id="telefono" placeholder="telefono" aria-describedby="inputGroupPrepend" required>
    </div>

    <div class="col-md-4 mb-3">
      <label for="direccion">Dirección</label>
      <input type="text" name="direccion" value="{{$personal->direccion}}" class="form-control" id="direccion" placeholder="dirección" aria-describedby="inputGroupPrepend" required>
      @error('direccion')
        <span class="text-danger">{{ $message}}</span>
      @enderror
    </div>

    <div class="col-md-4 mb-3">
      <label for="inputState">Rol</label>
      <select id="inputState" class="form-control" name="tipo">
        <option value="E" {{$personal->tipo=='E' ? 'selected':''}} >Encargado</option>
        <option value="A" {{$personal->tipo=='A' ? 'selected':''}}>Administrador</option>
      </select>
    </div>

    <div class="col-md-4 mb-3">
      <label for="email">Email</label>
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroupPrepend">@</span>
        </div>
        <input type="email" name="email" value="{{$personal->users->email}}" class="form-control" id="email" placeholder="Correo electrónico" aria-describedby="inputGroupPrepend" required>
      </div>
      @error('email')
        <span class="text-danger">{{ $message}}</span>
      @enderror
    </div>
</div>

<div class="col-md-4 mb-3">
  <button class="btn btn-primary" type="submit">Modificar</button>
</div>
</form>
</div>
<div id="borde"></div>
@endsection