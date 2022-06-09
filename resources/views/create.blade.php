@extends('layouts.plantilla')
@section('title', 'Crear Pedido')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
@stop

@section('content_header')
    <h1>Crear Pedido</h1>
@stop
    
@section('content')
<div class="container">
<div class="row">    
    <form class="form-group" action="{{route('pedidos.store')}}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="row">
            <input type="hidden" name="pedido_id"  class="form-control" >     
            <div class="col-md-3 mb-3">
                <label for="validationDefault01">Cliente</label>
                  <select name='cliente_id' id='cliente_id' class="custom-select">
                      <option selected>Elige un Cliente</option>
                      @foreach ($cliente as $cliente)
                          <option value="{{$cliente->cliente_id}}">{{$cliente->nombre}}</option>
                      @endforeach
                  </select>
              </div>
              <div class="col-md-3 mb-3">
                <label for="validationDefault01">O Puedes</label><br>
                <button type="button" class="btn btn-primary form-control" data-toggle="modal" data-target="#exampleModal">Crear Cliente</button>
              </div>
            <div class="col-md-3 mb-3">
                <label for="validationDefault01">Fecha Recogida</label>
                <input  type="text" name='fecha_actual' id='fecha_actual' class="form-control" value="{{ $ldate = date('d-m-Y')}}" > 
            </div>
            <div class="col-md-3 mb-3">
                <label for="validationDefault01">Fecha prevista</label>
                <input type="date" name="fecha_prevista" class="form-control">
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 mb-3">
                <label for="validationDefault01">Fecha de Entreda</label>
                <input type="date" name="fecha_entrega" class="form-control">
            </div> 
            <div class="col-md-3 mb-3">
                <label for="validationDefault03">Domicilio</label>
                <input type="text" class="form-control" name="domicilio" id="domicilio" placeholder="Domicilio del cliente..."required>
            </div>
            <div class="col-md-3 mb-3">
                <label for="validationDefault03">Provincia</label>
                <input type="text" class="form-control" name="provincia" id="provincia" placeholder="Provincia del cliente..."required>
            </div>
            <div class="col-md-3 mb-3">
                <label for="validationDefault04">Municipio</label>
                <input type="text" class="form-control" name="municipio" id="municipio" placeholder="Municipio del cliente..."required>
            </div>
        </div>     
        <input type="submit" class="btn btn-primary" name="Actulizar" value="Crear">
    </form>
</div>
</div>
{{-- Modal para crear un cliente --}}
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Creacion de Clientes</h5>
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