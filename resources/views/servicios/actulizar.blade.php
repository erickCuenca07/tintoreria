  <!-- Modal Para Actualizar-->
  <div class="modal fade" id="actualizar-{{$servicio->servicio_id}}" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" >Actualizar Servicios</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form class="form-group" action="{{route('servicios.update',$servicio->servicio_id)}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                @method('put')
                <div class="form-group">
                    <label for="disabledTextInput">Id</label>
                    <input type="text" class="form-control" value="{{$servicio->servicio_id}}" name="servicio_id" >
                </div>
                <div class="form-group">
                    <label for="disabledTextInput">Nombre</label>
                    <input type="text" class="form-control"  value="{{$servicio->nombre}}" name="nombre" >
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Descripcion</label>
                    <input class="form-control"   value="{{$servicio->descripcion}}" name="descripcion" >
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Foto</label>
                    <input type="file" class="form-control" name="foto" value="{{$servicio->foto}}" >
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