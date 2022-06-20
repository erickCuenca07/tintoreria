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
        <form class="form-group" action="{{route('pedidos.update',$pedido->numero_pedido)}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            @method('put')
            <div class="row">
                <div class="col-md-3 mb-3">
                    <label for="validationDefault01">Pedido ID</label>
                    <input type="number" name="numero_pedido" class="form-control" value="{{$pedido->numero_pedido}}">
                </div>      
                <div class="col-md-3 mb-3">
                    <label for="validationDefault01">Cliente</label>
                    <input type="text" name="" class="form-control" value="{{$pedido->clientes->nombre}}">
                    <input type="hidden" name="cliente_id"  value="{{$pedido->cliente_id}}">
                  </div>
                <div class="col-md-3 mb-3">
                    <label for="validationDefault01">Fecha Actual</label>
                    <input  type="text" name='fecha_actual' id='fecha_actual' value="{{$pedido->fecha_recibo}}" class="form-control"> 
                </div>
                <div class="col-md-3 mb-3">
                    <label for="validationDefault01">Fecha prevista</label>
                    <input type="text" name="fecha_prevista" class="form-control" value="{{$pedido->fecha_prevista}}">
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
                @csrf
                <input type="hidden" name='linea_pedido_id' size="50">
                <input type="hidden" name='numero_pedido' size="50" value={{$pedido->numero_pedido}}>

                <div class="form-group">
                    <label for="disabledTextInput">Prenda </label>
                        <select name='prenda_id' id='prenda_id' class="custom-select" required>
                            <option value="" selected>Elige una Prenda</option>
                                 @foreach ($prenda as $prenda)
                                    <option value="{{$prenda->prenda_id}}">{{$prenda->nombre}}</option>
                                @endforeach
                        </select>
                </div>
                <div class="form-group">
                    <label for="disabledTextInput">Servicio </label>
                    <select name='servicio_id' id='servicio_id' class="custom-select" required>
                        <option value="" selected>Elige un Servicio</option>
                             @foreach ($servicio as $servicio)
                                <option value="{{$servicio->servicio_id}}">{{$servicio->nombre}}</option>
                            @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Precio</label>
                    <input class="form-control"  rows="3" placeholder="Precio..." name="precio" id="precio" required>
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
                @foreach ($pedido->lineas as $key)
                <tr>
                    <td>{{$key->prenda->nombre}}</td>
                    <td>{{$key->servicio->nombre}}</td>
                    <td>{{$key->cantidad}}</td>
                    <td>{{$key->precio}}</td>
                    <td> <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#actualizar-{{$key->linea_pedido_id}}">Editar
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
                    @include('actualizar')
                @endforeach 
            </tbody>
        </table>
    </div>
</div>

<div class="card">
    <div class="card-body">
            <div class="col-md-2">
                <label>Total de la Compra</label>
                <input type="text" value="{{$pedido->total()}}" class="form-control" readonly>
            </div>
            <br>
            <a href="{{route('imprimir.edit',$pedido->numero_pedido)}}" class="btn btn-primary">Ver ticket
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-ticket-detailed" viewBox="0 0 16 16">
                    <path d="M4 5.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5Zm0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5ZM5 7a1 1 0 0 0 0 2h6a1 1 0 1 0 0-2H5Z"/>
                    <path d="M0 4.5A1.5 1.5 0 0 1 1.5 3h13A1.5 1.5 0 0 1 16 4.5V6a.5.5 0 0 1-.5.5 1.5 1.5 0 0 0 0 3 .5.5 0 0 1 .5.5v1.5a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 11.5V10a.5.5 0 0 1 .5-.5 1.5 1.5 0 1 0 0-3A.5.5 0 0 1 0 6V4.5ZM1.5 4a.5.5 0 0 0-.5.5v1.05a2.5 2.5 0 0 1 0 4.9v1.05a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-1.05a2.5 2.5 0 0 1 0-4.9V4.5a.5.5 0 0 0-.5-.5h-13Z"/>
                  </svg>
            </a>
        </div>
    </div>
</div>

@if(isset($key->linea_pedido_id))
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
            <input type="hidden" name="numero_pedido" value="{{$pedido->numero_pedido}}">
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
</div>
@else

@endif

@stop

@section('js')
<script src="https://kit.fontawesome.com/19ecb18a8d.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function(){


        $("#prenda_id").change(function(){
            $("#servicio_id").prop('selectedIndex',0);
            $("#precio").val('');
        })
            
        $("#servicio_id").change(function(){
    
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var id=$("select[name=prenda_id]").val();
            var servicio=$("select[name=servicio_id]").val();
            if(servicio!=''){
            if (id!=0){
            $.ajax({
                url: '{{route('ajax.tarifa')}}',
                method:'post',
                data:{'prenda_id':id,'servicio_id':servicio},
                success:function(data){
                    var datos=JSON.parse(data);
                    console.log(datos);
                    $("#precio").val(datos[0].precio);
                    
                }
            });
            
            }else{
                alert("Producto no seleccionado");
            }
            }    
        });
    });
        </script>
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