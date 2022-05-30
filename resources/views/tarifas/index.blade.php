@extends('layouts.plantilla')
@section('title','Listar Tarifas')
 
@section('content')
<div class="container">
    <h1>Tarifas Disponibles</h1>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Crear Tarifa</button>
    <br><br>
    <div class='row'>
        <table id="tabla" class='table'>
            <thead>
                <tr>
                <th scope='col' class='center'>Prenda id</th>
                <th scope='col' class='center'>Servicio id</th>
                <th scope='col' class='center'>Precio</th>
                <th scope='col' class='center'>Operacionces</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tarifa as $tarifa)
                    <tr>
                        <td scope="row">{{$tarifa->prendas->nombre}}</td>
                        <td>{{$tarifa->servicios->nombre}}</td>
                        <td>{{$tarifa->precio}}</td>
                        <td> <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#actualizar-{{$tarifa->prenda_id}}">Editar</button>
                            <form action="" method="post" enctype="multipart/form-data">   
                              @csrf
                              @method('delete')
                              <button type="submit" class="btn btn-danger" name="eliminar">Eliminar</button>
                            </form></td>
                        </tr>
                    @include('tarifas.actualizar')
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
          <h5 class="modal-title" id="exampleModalLabel">Creacion de Tarifas</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form class="form-group" action="{{route('tarifas.store')}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
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
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <input type="submit" class="btn btn-primary" name="crear" value="Crear">
                  </div>
                
            </form>
        </div>
      </div>
    </div>
  </div>

</div>
@endsection

@section('scripts')
    <script>
$(document).ready(function(){
		
	$("#prenda_id").change(function(){
        $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
        var id=$("select[name=prenda_id]").val();
        if (id!=0){
        $.ajax({
            url: '{{route('ajax.prenda')}}',
            method:'post',
            data:{'prenda_id':id},
            success:function(data){
                var datos=JSON.parse(data);
                $("#nombre").val(datos.nombre);
            }
        });
        }else{
            alert("Prenda no seleccionada");
        }
        });
    });
    </script>
@endsection