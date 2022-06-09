@extends('layouts.plantilla')
@section('title', 'Servicios')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
@stop

@section('content_header')
    <h1>Servicios Disponibles</h1>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Crear Servicio</button>
@stop

@section('content')
<div class="card">
  <div class="card-body">
        <table id="example" class="table align-middle mb-0 bg-white " cellspacing="0" width="100%">
            <thead>
                <tr>
                <th scope='col' class='center'>Servicio id</th>
                <th scope='col' class='center'>Nombre</th>
                <th scope='col' class='center'>Descripcion</th>
                <th scope='col' class='center'>Foto</th>
                <th scope='col' class='center'>Operacionces</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($servicios as $servicio)
                    <tr>
                        <th scope="row">{{$servicio->servicio_id}}</th>
                        <td>{{$servicio->nombre}}</td>
                        <td>{{$servicio->descripcion}}</td>
                        <td><img src="{{$servicio->foto}}" width="70"></td>
                        <td> <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#actualizar-{{$servicio->servicio_id}}">Editar</button>
                          <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#staticBackdrop">Eliminar</button></td>
                        </tr>
                    @include('servicios.actulizar')
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
        <h5 class="modal-title" id="staticBackdropLabel">Eliminar Servicio</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('servicios.destroy',$servicio->servicio_id)}}" method="post" enctype="multipart/form-data">   
          @csrf
          @method('delete')
          ¿Estas seguro que quieres eliminar este servicio?
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
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Creacion de Servicio</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form class="form-group" action="{{route('servicios.store')}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <input type="hidden" class="form-control"  placeholder="El id se crea solo " name="servicio_id" disabled>
                </div>
                <div class="form-group">
                    <label for="disabledTextInput">Nombre</label>
                    <input type="text" class="form-control"  placeholder="Nombre del servicio" name="nombre" required>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Descripcion</label>
                    <textarea class="form-control"  rows="3" placeholder="Descripcion del servicio..." name="descripcion" required></textarea>
                </div>
                <div class="form-group">
                  <label for="exampleFormControlTextarea1">Foto</label>
                  <input type="file" class="form-control" name="foto" required>
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