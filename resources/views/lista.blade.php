@extends('layouts.plantilla')
@section('title', 'Prendas')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
@stop

@section('content_header')
    <h1>Pedios</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <table id="example" class="table align-middle mb-0 bg-white " cellspacing="0" width="100%">
        <thead>
            <tr>
            <th scope='col' class='center'>Numero de Pedido</th>
            <th scope='col' class='center'>Cliente </th>
            <th scope='col' class='center'>Fecha Recibido</th>
            <th scope='col' class='center'>Domicilio</th>
            <th scope='col' class='center'>Fecha Prevista</th>
            <th scope='col' class='center'>Fecha de Entrega</th>
            <th scope='col' class='center'>Operociones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pedido as $pedido)
                <tr>
                    <td><a href="{{route('pedidos.edit',$pedido->numero_pedido)}}">{{$pedido->numero_pedido}}</a></td>
                    <td>{{$pedido->clientes->nombre}}</td>
                    <td>{{$pedido->fecha_recibo}}</td>
                    <td>{{$pedido->domicilio}}</td>
                    <td>{{$pedido->fecha_prevista}}</td>
                    <td>{{$pedido->fecha_entregado}}</td>
                    <td><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#actualizar-{{$pedido->numero_pedido}}">Editar
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
                    @include("actualizar2")
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
          <form action="{{route('pedidos.destroy',$pedido->numero_pedido)}}" method="post" enctype="multipart/form-data">   
            @csrf
            @method('delete')
            ¿Estas seguro que quieres eliminar este pedido?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-danger" name="eliminar">Eliminar</button>
        </div>
      </form>
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