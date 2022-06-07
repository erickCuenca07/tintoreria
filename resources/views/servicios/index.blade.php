@extends('layouts.plantilla')
@section('title','Listar Servicios')
  
@section('content')

<div class="container">
    <h1>Servicios Disponibles</h1>
    <button type="button" class="btn btn-primary" data-mdb-toggle="modal" data-mdb-target="#exampleModal">Crear Servicio</button>
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
                        <td> <button type="button" class="btn btn-warning" data-mdb-toggle="modal" data-mdb-target="#actualizar-{{$servicio->servicio_id}}">Editar</button>
                          <button type="button" class="btn btn-danger" data-mdb-toggle="modal" data-mdb-target="#staticBackdrop">Eliminar</button></td>
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
        <button ttype="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{route('servicios.destroy',$servicio->servicio_id)}}" method="post" enctype="multipart/form-data">   
          @csrf
          @method('delete')
          ¿Estas seguro que quieres eliminar este servicio?
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
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Creacion de Servicio</h5>
          <button ttype="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
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