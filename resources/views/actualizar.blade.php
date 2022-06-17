  <!-- Modal Para Actualizar-->
  <div class="modal fade" id="actualizar-{{$key->linea_pedido_id}}" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" >Actualizar Prenda</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form class="form-group" action="{{route('lineas.update',$key->linea_pedido_id)}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                @method('put')
                <div class="form-group">
                    <input type="hidden"  name="linea_pedido_id" value="{{$key->linea_pedido_id}}">
                </div>
                <div class="form-group">
                    <input type="hidden"  name="numero_pedido" value="{{$key->numero_pedido}}">
                </div>
                <div class="form-group">
                    <label for="disabledTextInput">Prenda</label>
                     <input type="text" class="form-control" value="{{$key->prenda->nombre}}" >
                     <input type="hidden" name="prenda_id"  value="{{$key->prenda_id}}">
                </div>
                <div class="form-group">
                    <label for="disabledTextInput">Servicio</label>
                    <input type="text" class="form-control"  value="{{$key->servicio->nombre}}" >
                    <input type="hidden" name="servicio"  value="{{$key->servicio_id}}">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Cantidad</label>
                    <input type="number" class="form-control" name="cantidad" value="{{$key->cantidad}}" >
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Precio</label>
                    <input type="number" class="form-control" name="precio" value="{{$key->precio}}" >
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