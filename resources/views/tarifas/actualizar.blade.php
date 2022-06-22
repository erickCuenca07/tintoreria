  <!-- Modal Para Actualizar-->
  <div class="modal fade" id="actualizar-{{$tarifa->tarifa_id}}" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" >Actualizar Tarifas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form class="form-group" action="{{route('tarifas.update',$tarifa->tarifa_id)}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                @method('put')
                <div class="form-group">
                    <input type="hidden" class="form-control" value="{{$tarifa->tarifa_id}}" name="tarifa_id" >
                </div>
                <div class="form-group">
                    <label for="disabledTextInput">Prenda </label>
                    <input type="text" class="form-control" value="{{$tarifa->prendas->nombre}}" >
                    <input type="hidden" class="form-control" value="{{$tarifa->prenda_id}}" name="prenda_id" >
                </div>
                <div class="form-group">
                    <label for="disabledTextInput">Servicio </label>
                    <input type="text" class="form-control" value="{{$tarifa->servicios->nombre}}">
                    <input type="hidden" class="form-control"  value="{{$tarifa->servicio_id}}" name="servicio_id" >
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Precio</label>
                    <input  type="text" class="form-control" value="{{$tarifa->precio}}" name="precio" >
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