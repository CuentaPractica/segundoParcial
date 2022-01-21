<table class="table table-hover">
  <thead class="table-primary">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nombre</th>
      <th scope="col">Accion</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($marcas as $marca)
    <tr >
      <th scope="row">{{ $marca->id }}</th>
         <td>{{ $marca->nombre }}</td>
         <td>
            <a href=" {{route('marca.edit',[$marca->id]) }}" class="btn btn-outline-warning btn-m" ><span><i class="fa fa-edit" style="margin-left:-5px;"></i></span></a>
            <a href=" {{route('marca.destroy',[$marca->id]) }}" class="btn btn-outline-danger btn-m" ><span><i class="	fas fa-trash-alt" style="margin-left:-5px;"></i></span></a>
         </td>
    </tr>
  @endforeach
  {{$marcas->links('herramientas.paginacion')}}
  </tbody>
</table>