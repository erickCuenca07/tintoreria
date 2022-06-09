@extends('layouts.plantilla')
@section('title', 'Editar Pedido')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
@stop

@section('content_header')
    <h1>Edicion de Pedido</h1>
@stop
    
@section('content')
<div class="card">
    <div class="card-body"> 
        <form class="form-group" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-md-3 mb-3">
                    <label for="validationDefault01">Pedido ID</label>
                    <input type="number" name="pedido_id" class="form-control" value="{{$pedido->numero_pedido}}">
                </div>      
                <div class="col-md-3 mb-3">
                    <label for="validationDefault01">Cliente</label>
                    <input type="text" name="pedido_id" class="form-control" value="{{$pedido->clientes->nombre}}">
                  </div>
                <div class="col-md-3 mb-3">
                    <label for="validationDefault01">Fecha Actual</label>
                    <input  type="text" name='fecha' id='fecha_actual' value="{{$pedido->fecha_recibo}}" class="form-control"> 
                </div>
                <div class="col-md-3 mb-3">
                    <label for="validationDefault01">Fecha prevista</label>
                    <input type="date" name="fecha_prevista" class="form-control" value="{{$pedido->fecha_prevista}}">
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 mb-3">
                    <label for="validationDefault01">Fecha de Entreda</label>
                    <input type="date" name="fecha_entrega" class="form-control">
                </div> 
                <div class="col-md-3 mb-3">
                    <label for="validationDefault03">Domicilio</label>
                    <input type="text" class="form-control" name="domicilio" id="domicilio" value="{{$pedido->domicilio}}" required>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="validationDefault03">Provincia</label>
                    <input type="text" class="form-control" name="provincia" id="provincia" value="{{$pedido->provincia}}" required>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="validationDefault04">Municipio</label>
                    <input type="text" class="form-control" name="municipio" id="municipio"  value="{{$pedido->municipio}}"required>
                </div>
            </div>     
            <input type="submit" class="btn btn-primary" name="Actulizar" value="Actualizar">
        </form> 
    </div>
</div>

<!-- Modal Para Añadir Prenda-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Añadir Prenda</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form class="form-group" action="{{route('lineas.store')}}"  method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name='linea_pedido_id' size="50">
                <input type="hidden" name='numero_pedido' size="50" value={{$pedido->numero_pedido}}>

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
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Cantidad</label>
                    <input type="number" class="form-control"  value="1" placeholder="Cantidad..." name="cantidad" required>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <input type="submit" class="btn btn-primary" name="crear" value="Añadir">
                  </div>
                
            </form>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="card">
    <div class="card-body">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Añadir Prendas</button><hr>
        <table id="example" class="table align-middle mb-0 bg-white " cellspacing="0" width="100%">
            <thead>
                <tr>
                <th scope='col' class='center'>Prenda</th>
                <th scope='col' class='center'>Servicio</th>
                <th scope='col' class='center'>Cantidad</th>
                <th scope='col' class='center'>Precio</th>
                <th scope='col' class='center'>Operacionces</th>
                </tr>
            </thead>
            <tbody>
                {{-- esta parte falta por mejorar funciona --}}
                @foreach ($pedido->lineas as $key)
                <tr>
                    <td>{{$key->prenda->nombre}}</td>
                    <td>{{$key->servicio->nombre}}</td>
                    <td>{{$key->cantidad}}</td>
                    <td>{{$key->precio}}</td>
                    <td> <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#actualizar-">Editar</button>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#staticBackdrop">Eliminar</button></td>
                    </tr>
                    @include('actualizar')
                @endforeach 
            </tbody>
        </table>
    </div>
</div>

{{-- modal para eliminar prenda --}}
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Eliminar Prenda</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{route('lineas.destroy',$key->linea_pedido_id)}}" method="post" enctype="multipart/form-data">   
            @csrf
            @method('delete')
            ¿Estas seguro que quieres eliminar esta prenda?
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