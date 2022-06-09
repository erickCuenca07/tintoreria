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
            <th scope='col' class='center'>Fecha Recivido</th>
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
                    <td><button type="button" class="btn btn-warning" data-mdb-toggle="modal" data-mdb-target="#actualizar-{{$pedido->numero_pedido}}">Editar</button>
                        <button type="button" class="btn btn-danger" data-mdb-toggle="modal" data-mdb-target="#staticBackdrop">Eliminar</button></td>
                    </tr>
            @endforeach 
        </tbody>
    </table>
</div>
</div>

  {{-- <!-- Modal Para Actualizar-->
  <div class="modal fade" id="actualizar-{{$pedido->numero_pedido}}" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" >Actualizar Articulos</h5>
        <button ttype="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form class="form-group" action="{{route('pedidos.update',$pedido->numero_pedido)}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                @method('put')
                <div class="form-group">
                    <label for="disabledTextInput">Numero Pedido</label>
                    <input type="text" class="form-control" value="{{$pedido->numero_pedido}}" name="numero_pedio" >
                </div>
                <div class="form-group">
                    <label for="disabledTextInput">Cliente</label>
                    <input type="text" class="form-control"  value="{{$pedido->clientes->nombre}}" name="cliente" >
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Domicilio</label>
                    <input class="form-control"  rows="3" value="{{$pedido->domicilio}}" name="domicilio" >
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Foto</label>
                    <input type="text" class="form-control" name="foto" value="{{$pedido->fecha_prevista}}" >
                </div>
                <div class="form-group">
                    <label for="disabledTextInput">Categoria</label>
                        <input type="text" class="form-control"  value="{{$pedido->fecha_entregado}}">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Cancelar</button>
                    <input type="submit" class="btn btn-primary" name="Actulizar" value="Actulizar">
                </div>
            </form>
        </div>
    </div>
    </div>
</div> --}}

<!-- Modal para elmiinar-->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Eliminar Articulo</h5>
          <button ttype="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{route('pedidos.destroy',$pedido->numero_pedido)}}" method="post" enctype="multipart/form-data">   
            @csrf
            @method('delete')
            ¿Estas seguro que quieres eliminar este pedido?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Cancelar</button>
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