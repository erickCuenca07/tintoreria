@extends('layouts.plantilla')
@section('title','Listar Servicios')
  
@section('content')

<div class="container">
    <h1>Servicios Disponibles</h1>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Crear Servicio</button>
    <br><br>
    <div class='row'>
        <table class='table'>
            <thead>
                <tr>
                <th scope='col' class='center'>Servicio id</th>
                <th scope='col' class='center'>Nombre</th>
                <th scope='col' class='center'>Descripcion</th>
                <th scope='col' class='center'>Operacionces</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($servicios as $servicio)
                    <tr>
                        <th scope="row">{{$servicio->servicio_id}}</th>
                        <td>{{$servicio->nombre}}</td>
                        <td>{{$servicio->descripcion}}</td>
                        <td> <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#actualizar-{{$servicio->servicio_id}}">Editar</button>
                            <form action="{{route('servicios.destroy',$servicio->servicio_id)}}" method="post" enctype="multipart/form-data">   
                              @csrf
                              @method('delete')
                              <button type="submit" class="btn btn-danger" name="eliminar">Eliminar</button>
                            </form></td>
                        </tr>
                    @include('servicios.actulizar')
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
            <form class="form-group" action="{{route('servicios.store')}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <input type="hidden" class="form-control"  placeholder="El id se crea solo " name="servicio_id" disabled>
                </div>
                <div class="form-group">
                    <label for="disabledTextInput">Nombre</label>
                    <input type="text" class="form-control"  placeholder="Nombre de la mercaderia" name="nombre" required>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Descripcion</label>
                    <textarea class="form-control"  rows="3" placeholder="Descripcion del producto..." name="descripcion" required></textarea>
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