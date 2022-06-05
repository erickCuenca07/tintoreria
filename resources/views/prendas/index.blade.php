@extends('layouts.plantilla')
@section('title','Listar Aritculos')
 
@section('content')
@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.0/css/dataTables.bootstrap4.min.css">
@endsection

<div class="container">
    <h1>Prendas Disponibles</h1>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Crear Prenda</button>
    <br><br>
    <div class='row'>
        <table id="tabla" class='table'>
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
                        <td> <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#actualizar-{{$prenda->prenda_id}}">Editar</button>
                          <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#staticBackdrop">Eliminar</button></td>
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
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('prendas.destroy',$prenda->prenda_id)}}" method="post" enctype="multipart/form-data">   
          @csrf
          @method('delete')
          ¿Estas seguro que quieres eliminar este articulo?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form class="form-group" action="{{route('prendas.store')}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <input type="hidden" class="form-control"  placeholder="El id se crea solo " name="prenda_id" disabled>
                </div>
                <div class="form-group">
                    <label for="disabledTextInput">Nombre</label>
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
                      <select name='categoria' id='categoria' class="custom-select">
                          <option  selected>Elige una Categoria</option>
                               @foreach ($categoria as $categoria)
                                  <option value="{{$categoria->categoria_id}}">{{$categoria->nombre}}</option>
                              @endforeach
                      </select>
              </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <input type="submit" class="btn btn-primary" name="crear" value="Crear">
                  </div>
                
            </form>
        </div>
      </div>
    </div>
</div>


  @section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.0/js/dataTables.bootstrap4.min.js"></script>

<script>
  $(document).ready(function () {
    $('#tabla').DataTable();
});
</script>
@endsection
@endsection
