@extends('layouts.plantilla')
@section('title','Listar Clientes')
 
@section('content')
    <div class="container">
        <h1>Clientes Disponibles</h1>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Crear Cliente</button>
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
                            <td> <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#actualizar-{{$cliente->cliente_id}}">Editar</button>
                                <form action="{{route('clientes.destroy',$cliente->cliente_id)}}" method="post" enctype="multipart/form-data">   
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger" name="eliminar">Eliminar</button>
                                </form></td>
                        </tr>
                        @include('clientes.actualizar')
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
          <h5 class="modal-title" id="exampleModalLabel">Creacion de Articulos</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form class="form-group" action="{{route('clientes.store')}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="disabledTextInput">Cliente Id</label>
                    <input type="text" class="form-control"  placeholder="El id se crea solo " name="cliente_id" disabled>
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
  
@endsection