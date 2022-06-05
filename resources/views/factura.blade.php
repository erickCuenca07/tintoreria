@extends('layouts.plantilla')
@section('title',' Crear Pedido')
    
@section('content')
<div class="container">
    <div class="form-row">    
        <form class="form-group" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-row">
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
                    <input  type="date" name='fecha' id='fecha_actual' value="{{$pedido->fecha_recibo}}" class="form-control"> 
                </div>
                <div class="col-md-3 mb-3">
                    <label for="validationDefault01">Fecha prevista</label>
                    <input type="date" name="fecha_prevista" class="form-control" value="{{$pedido->fecha_prevista}}">
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-3 mb-3">
                    <label for="validationDefault01">Fecha de Entreda</label>
                    <input type="text" name="fecha_entrega" class="form-control">
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

<div class="container">
    <div class='row'>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Añadir Prendas</button>
        <table id="tabla" class='table'>
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
                {{-- esta parte no funciona --}}
                {{-- @foreach ($pedido->lineas() as $linea)
                <tr>
                    <th scope="row">{{$linea->prenda_id}}</th>
                    <td>{{$linea->servicio_id}}</td>
                    <td>{{$linea->cantidad}}</td>
                    <td>{{$linea->precio}}</td>
                    <td> <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#actualizar-{{$linea->prenda_id}}">Editar</button>
                        <form action="" method="post" enctype="multipart/form-data">   
                          @csrf
                          @method('delete')
                          <button type="submit" class="btn btn-danger" name="eliminar">Eliminar</button>
                        </form></td>
                    </tr>
                @endforeach  --}}
            </tbody>
        </table>
    </div>
</div>

@endsection