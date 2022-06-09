@extends('layouts.plantilla')
@section('title', 'Tarifas')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
@stop

@section('content_header')
    <h1>Tarifas Disponibles</h1>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Crear tarifa</button>
@stop
 
@section('content')
<div class="card">
    <div class="card-body">
            <table id="example" class="table align-middle mb-0 bg-white " cellspacing="0" width="100%">
            <thead>
                <tr>
                <th scope='col' class='center'>Tarifa id</th>
                <th scope='col' class='center'>Prenda id</th>
                <th scope='col' class='center'>Servicio id</th>
                <th scope='col' class='center'>Precio</th>
                <th scope='col' class='center'>Operacionces</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tarifa as $tarifa)
                    <tr>
                        <td scope="row">{{$tarifa->tarifa_id}}</td>
                        <td scope="row">{{$tarifa->prendas->nombre}}</td>
                        <td>{{$tarifa->servicios->nombre}}</td>
                        <td>{{$tarifa->precio}}</td>
                        <td> <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#actualizar-{{$tarifa->tarifa_id}}">Editar
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                              </svg>
                        </button>
                            <form action="" method="post" enctype="multipart/form-data">   
                              @csrf
                              @method('delete')
                              <button type="submit" class="btn btn-danger" name="eliminar">Eliminar
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                    <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                                  </svg>
                              </button>
                            </form></td>
                        </tr>
                    @include('tarifas.actualizar')
                @endforeach 
            </tbody>
        </table>
    </div>
</div>

<!-- Modal PAra crear-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Creacion de Tarifas</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form class="form-group" action="{{route('tarifas.store')}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="tarifa_id">
                <div class="form-group">
                    <label for="disabledTextInput">Prenda Id</label>
                        <select name='prenda_id' id='prenda_id' class="custom-select">
                            <option  selected>Elige una Prenda</option>
                                 @foreach ($prenda as $prenda)
                                    <option value="{{$prenda->prenda_id}}">{{$prenda->nombre}}</option>
                                @endforeach
                        </select>
                </div>
                <div class="form-group">
                    <label for="disabledTextInput">Servicio Id</label>
                    <select name='servicio_id' id='servicio_id' class="custom-select">
                        <option  selected>Elige un Servicio</option>
                             @foreach ($servicio as $servicio)
                                <option value="{{$servicio->servicio_id}}">{{$servicio->nombre}}</option>
                            @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Precio</label>
                    <input class="form-control"  rows="3" placeholder="Precio..." name="precio" required>
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