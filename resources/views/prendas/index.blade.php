@extends('layouts.plantilla')
@section('title','Listar Aritculos')
 
@section('content')


<div class="container">
    <h1>Prendas Disponibles</h1>
    <button type="button" class="btn btn-primary" data-mdb-toggle="modal" data-mdb-target="#exampleModal">Crear Prenda</button>
    <br><br>
    <div class='row'>
        <table id="dtBasicExample" class="table align-middle mb-0 bg-white " cellspacing="0" width="100%">
            <thead>
                <tr>
                <th scope='col' class='center'>id</th>
                <th scope='col' class='center'>Nombre</th>
                <th scope='col' class='center'>Descripcion</th>
                <th scope='col' class='center'>foto</th>
                <th scope='col' class='center'>Categoria</th>
                <th scope='col' class='center'>Operacionces</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($prendas as $prenda)
                    <tr>
                        <th scope="row">{{$prenda->prenda_id}}</th>
                        <td>{{$prenda->nombre}}</td>
                        <td>{{$prenda->descripcion}}</td>
                        <td><img src="{{$prenda->foto}}" width="70"></td>
                        <td>{{$prenda->categoria->nombre}}</td>
                        <td> <button type="button" class="btn btn-warning" data-mdb-toggle="modal" data-mdb-target="#actualizar-{{$prenda->prenda_id}}">Editar</button>
                          <button type="button" class="btn btn-danger" data-mdb-toggle="modal" data-mdb-target="#staticBackdrop">Eliminar</button></td>
                        </tr>
                    @include('prendas.actulizar')
                @endforeach 
            </tbody>
        </table>
    </div>
</div>

<!-- Modal para elmiinar-->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Eliminar Articulo</h5>
        <button ttype="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{route('prendas.destroy',$prenda->prenda_id)}}" method="post" enctype="multipart/form-data">   
          @csrf
          @method('delete')
          ¿Estas seguro que quieres eliminar este articulo?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-danger" name="eliminar">Eliminar</button>
      </div>
    </form>
    </div>
  </div>
</div>

<!-- Modal PAra crear-->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Creacion de Articulos</h5>
          <button ttype="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form class="form-group" action="{{route('prendas.store')}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <input type="hidden" class="form-control"  placeholder="El id se crea solo " name="prenda_id" disabled>
            </div>
            <div class="form-group">
                <label for="disabledTextInput" class="form-label">Nombre</label>
                <input type="text" class="form-control"  placeholder="Nombre de la mercaderia" name="nombre" required>
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Descripcion</label>
                <textarea class="form-control"  rows="3" placeholder="Descripcion del producto..." name="descripcion" required></textarea>
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Foto</label>
                <input type="file" class="form-control" name="foto" required>
            </div>
            <div class="form-group">
              <label for="disabledTextInput">Categoria</label>
                  <select name='categoria' id='categoria' class="browser-default custom-select">
                      <option  selected>Elige una Categoria</option>
                           @foreach ($categoria as $categoria)
                              <option value="{{$categoria->categoria_id}}">{{$categoria->nombre}}</option>
                          @endforeach
                  </select>
            </div>
          </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Cancelar</button>
                <input type="submit" class="btn btn-primary" name="crear" value="Crear">
              </div>
            
        </form>
        </div>
      </div>
    </div>
</div>

<script>
  $(document).ready(function () {
$('#dtBasicExample').DataTable();
$('.dataTables_length').addClass('bs-select');
});
</script>
@endsection
