  <!-- Modal Para Actualizar-->
  <div class="modal fade" id="actualizar-{{$prenda->prenda_id}}" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" >Actualizar Articulos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
            <form class="form-group" action="{{route('prendas.update',$prenda->prenda_id)}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                @method('put')
                <div class="form-group">
                    <label for="disabledTextInput">Id</label>
                    <input type="text" class="form-control" value="{{$prenda->prenda_id}}" name="prenda_id" >
                </div>
                <div class="form-group">
                    <label for="disabledTextInput">Nombre</label>
                    <input type="text" class="form-control"  value="{{$prenda->nombre}}" name="nombre" >
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Descripcion</label>
                    <input class="form-control"  rows="3" value="{{$prenda->descripcion}}" name="descripcion" >
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Foto</label>
                    <input type="file" class="form-control" name="foto" value="{{$prenda->foto}}" >
                </div>
                <div class="form-group">
                    <label for="disabledTextInput">Categoria</label>
                        <input type="text" class="form-control"  value="{{$prenda->categoria->nombre}}"
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