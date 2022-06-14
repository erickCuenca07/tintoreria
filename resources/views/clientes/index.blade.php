@extends('layouts.plantilla')
@section('title', 'Clientes')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
@stop

@section('content_header')
    <h1>Clientes Disponibles</h1>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Crear Cliente</button>
@stop

@section('content')
<div class="container">
  <div class="card">
  <div class="card-body">
            <table id="example" class="table align-middle mb-0 bg-white " cellspacing="0" width="100%">
                <thead>
                    <tr>
                    <th scope='col' class='center'>Cliente Id</th>
                    <th scope='col' class='center'>Nif</th>
                    <th scope='col' class='center'>Nombre</th>
                    <th scope='col' class='center'>Telefono</th>
                    <th scope='col' class='center'>Email</th>
                    <th scope='col' class='center'>Domicilio</th>
                    <th scope='col' class='center'>Provincia</th>
                    <th scope='col' class='center'>Municipio</th>
                    <th scope='col' class='center'>Operacionces</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($clientes as $cliente)
                        <tr>
                            <th scope="row">{{$cliente->cliente_id}}</th>
                            <td>{{$cliente->nif}}</td>
                            <td>{{$cliente->nombre}}</td>
                            <td>{{$cliente->telefono}}</td>
                            <td>{{$cliente->email}}</td>
                            <td>{{$cliente->domicilio}}</td>
                            <td>{{$cliente->provincia}}</td>
                            <td>{{$cliente->municipio}}</td>
                            <td> <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#actualizar-{{$cliente->cliente_id}}">Editar
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
                        @include('clientes.actualizar')
                    @endforeach 
                </tbody>
        </table>
      </div>
    </div>
</div>
    <!-- Modal para elmiinar-->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Eliminar Cliente</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button></div>
        <div class="modal-body">
            <form action="{{route('clientes.destroy',$cliente->cliente_id)}}" method="post" enctype="multipart/form-data">   
                @csrf
                @method('delete')
                ¿Estas seguro que quieres eliminar este cliente?
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
          <h5 class="modal-title" id="exampleModalLabel">Creacion de clientes</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form class="form-group" action="{{route('clientes.store')}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <input type="hidden" class="form-control"  placeholder="El id se crea solo " name="cliente_id" disabled>
                </div>
                <div class="form-group">
                    <label for="disabledTextInput">Nif</label>
                    <input type="text" class="form-control"  placeholder="Nif del cliente.." name="nif" required>
                </div>
                <div class="form-group">
                    <label for="disabledTextInput">Nombre</label>
                    <input type="text" class="form-control"  placeholder="Nombre del cliente.." name="nombre" required>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Email</label>
                    <input typt="email" class="form-control" placeholder="Email del cliente..." name="email" required>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Telefono</label>
                    <input type="text" class="form-control"  placeholder="Telefono del cliente..." name="telefono" required>
                </div>
                <div class="form-group">
                    <label for="disabledTextInput">Domicilio</label>
                    <input type="text" class="form-control"  placeholder="Domicilio del cliente..." name="domicilio" required>
                </div>
                <div class="form-group">
                    <label for="disabledTextInput">Provincia</label>
                    <input type="text" class="form-control"  placeholder="Provincia del cliente..." name="provincia" required>
                </div>
                <div class="form-group">
                    <label for="disabledTextInput">Municipio</label>
                    <input type="text" class="form-control"  placeholder="Municipio del cliente..." name="municipio" required>
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