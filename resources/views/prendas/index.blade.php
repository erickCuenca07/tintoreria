@extends('layouts.plantilla')
@section('title', 'Prendas')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
@stop

@section('content_header')
    <h1>Prendas Disponibles</h1>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Crear Prenda</button>
@stop

@section('content')
<div class="card">
  <div class="card-body">
            <table id="example" class="table align-middle mb-0 bg-white " cellspacing="0" width="100%">
                <thead>
                    <tr>
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
                            <td>{{$prenda->nombre}}</td>
                            <td>{{$prenda->descripcion}}</td>
                            <td><img src="{{$prenda->foto}}" width="70"></td>
                            <td>{{$prenda->categoria->nombre}}</td>
                            <td> <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#actualizar-{{$prenda->prenda_id}}">Editar
                              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                              </svg>
                            </button>
                              <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#staticBackdrop">Eliminar
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                  <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                                </svg>  
                              </button></td>
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
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
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
@stop

@section('js')
<script src="https://kit.fontawesome.com/19ecb18a8d.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
<script>
  $(document).ready(function () {
      $('#example').DataTable({
          "language":{
            "search":     "Buscar",
            "lengthMenu": "Mostrar _MENU_ registros por página",
            "info":       "Mostrando página _PAGE_ de _PAGE_",
            "paginate":   {
                          "previous": "Anterior",
                          "next": "Siguiente",
                          "first": "Primero",
                          "last": "Ultimo"
            }
          }
      });
  });
  </script>
@stop
