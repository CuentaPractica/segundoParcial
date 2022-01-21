<table class="table table-hover">
  <thead class="table-primary">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nombre</th>
      <th scope="col">Accion</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($categorias as $categoria)
    <tr >
      <th scope="row">{{ $categoria->id }}</th>
         <td>{{ $categoria->nombre }}</td>
         <td>
            <a href=" {{route('categoria.edit',[$categoria->id]) }}" class="btn btn-outline-warning btn-m" ><span><i class="fa fa-edit" style="margin-left:-5px;"></i></span></a>
            <a href=" {{route('categoria.destroy',[$categoria->id]) }}" class="btn btn-outline-danger btn-m" ><span><i class="	fas fa-trash-alt" style="margin-left:-5px;"></i></span></a>
         </td>
    </tr>
  @endforeach
  {{$categorias->links('herramientas.paginacion')}}
  </tbody>
</table>

<div class="alert alert-dark" role="alert">{{Auth()->user()->showCounter(1)}}</div>