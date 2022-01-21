@extends('diseño.contenido')
@section('contenido')
<div id="borde"></div>
<div id="cuadro">
  <nav class="titulo"><h3>REGISTRAR PERSONAL</h3></nav>
  <form action="{{ route('personal.store') }}" method="post" >
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

    <div class="col-md-4 mb-3">
      <label for="direccion">Dirección</label>
        <input type="text" name="direccion" class="form-control" value="{{old('direccion')}}" id="direccion" placeholder="dirección" aria-describedby="inputGroupPrepend" required>
        @error('direccion')
             <span class="text-danger">{{ $message}}</span>
        @enderror
    </div>

    <div class="col-md-4 mb-3">
      <label for="tipo">Rol</label>
      <select id="tipo" class="form-control" name="tipo" value="{{old('tipo')}}">
        <option value="E">Encargado</option>
        <option value="A">Administrador</option>
      </select>
    </div>

    <div class="col-md-4 mb-3">
      <label for="email">Email</label>
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroupPrepend">@</span>
        </div>
        <input type="email" name="email" class="form-control" id="email" value="{{old('email')}}" placeholder="Correo electrónico" aria-describedby="inputGroupPrepend" required>
      </div>
      @error('email')
             <span class="text-danger">{{ $message}}</span>
        @enderror
    </div>

  <div class="col-md-4 mb-3">
      <label for="password">Contraseña</label>
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroupPrepend">#$#&</span>
        </div>
        <input type="password" name="password" class="form-control" id="password" placeholder="Contraseña" aria-describedby="inputGroupPrepend" required>
      </div>
      @error('password')
             <span class="text-danger"> {{ $message}}</span>
        @enderror
    </div>

  <div class="col-md-4 mb-3">
      <label for="validationPasswordV">Repetir contraseña</label>
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroupPrepend">#$#&</span>
        </div>
        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" id="validationPasswordV" placeholder="Contraseña" aria-describedby="inputGroupPrepend" required>
      </div>
    </div>
  </div>

<div class="col-md-4 mb-3">
  <button class="btn btn-primary" type="submit">Registrar</button>
</div>
</form>
</div>
<div id="borde"></div>
<footer class="page-footer font-small blue pt-4">
<div class="alert alert-dark" role="alert">{{Auth()->user()->showCounter(2)}}</div>
</footer>
@endsection