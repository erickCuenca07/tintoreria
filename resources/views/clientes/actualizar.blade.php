  <!-- Modal Para Actualizar-->
  <div class="modal fade" id="actualizar-{{$cliente->cliente_id}}" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" >Actualizar Clientes</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
            <form class="form-group" action="{{route('clientes.update',$cliente->cliente_id)}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                @method('put')
                <div class="form-group">
                    <label for="disabledTextInput">Cliente Id</label>
                    <input type="text" class="form-control" value="{{$cliente->cliente_id}}" name="cliente_id" >
                </div>
                <div class="form-group">
                    <label for="disabledTextInput">Nif</label>
                    <input type="text" class="form-control"  value="{{$cliente->nif}}" name="nif" >
                </div>
                <div class="form-group">
                    <label for="disabledTextInput">Nombre</label>
                    <input type="text" class="form-control"  value="{{$cliente->nombre}}" name="nombre" >
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Telefono</label>
                    <input class="form-control"  rows="3" value="{{$cliente->telefono}}" name="telefono" >
                </div>
                <div class="form-group">
                    <label for="disabledTextInput">Email</label>
                    <input type="text" class="form-control"  value="{{$cliente->email}}" name="email" >
                </div>
                <div class="form-group">
                    <label for="disabledTextInput">Domicilio</label>
                    <input type="text" class="form-control"  value="{{$cliente->domicilio}}" name="domicilio" >
                </div>
                <div class="form-group">
                    <label for="disabledTextInput">Provincia</label>
                    <input type="text" class="form-control"  value="{{$cliente->provincia}}" name="provincia" >
                </div>
                <div class="form-group">
                    <label for="disabledTextInput">Municipio</label>
                    <input type="text" class="form-control"  value="{{$cliente->municipio}}" name="municipio" >
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <input type="submit" class="btn btn-primary" name="Actulizar" value="Actulizar">
                </div>
            </form>
        </div>
    </div>
    </div>
</div>