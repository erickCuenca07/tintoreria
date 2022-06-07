@extends('layouts.plantilla')
@section('title','Listar Clientes')
 
@section('content')
    <div class="container">
        <h1>Clientes Disponibles</h1>
        <button type="button" class="btn btn-primary" data-mdb-toggle="modal" data-mdb-target="#exampleModal">Crear Cliente</button>
        <br><br>
        <div class='row'>
            <table id="tabla" class='table'>
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
                            <td> <button type="button" class="btn btn-warning" data-mdb-toggle="modal" data-mdb-target="#actualizar-{{$cliente->cliente_id}}">Editar</button>
                                <button type="button" class="btn btn-danger" data-mdb-toggle="modal" data-mdb-target="#staticBackdrop">Eliminar</button></td>
                        </tr>
                        @include('clientes.actualizar')
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
          <h5 class="modal-title" id="staticBackdropLabel">Eliminar Cliente</h5>
          <button ttype="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{route('clientes.destroy',$cliente->cliente_id)}}" method="post" enctype="multipart/form-data">   
                @csrf
                @method('delete')
                ¿Estas seguro que quieres eliminar este cliente?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Cancelar</button>
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
          <button ttype="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
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
                  <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Cancelar</button>
                    <input type="submit" class="btn btn-primary" name="crear" value="Crear">
                  </div>
                
            </form>
        </div>
      </div>
    </div>
  </div>
  
@endsection