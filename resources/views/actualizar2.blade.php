<!-- Modal Para Actualizar-->
<div class="modal fade" id="actualizar-{{$pedido->numero_pedido}}" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" >Actualizar Articulos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form class="form-group" action="{{route('pedidos.update',$pedido->numero_pedido)}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                @method('put')
                <div class="form-group">
                    <label for="disabledTextInput">Numero Pedido</label>
                    <input type="text" class="form-control" value="{{$pedido->numero_pedido}}" name="numero_pedio" >
                </div>
                <div class="form-group">
                    <label for="disabledTextInput">Cliente</label>
                    <input type="text" class="form-control"  value="{{$pedido->clientes->nombre}}" name="cliente" >
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Domicilio</label>
                    <input class="form-control"  rows="3" value="{{$pedido->domicilio}}" name="domicilio" >
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Frecha prevista</label>
                    <input type="date" class="form-control" name="foto" value="{{$pedido->fecha_prevista}}" >
                </div>
                <div class="form-group">
                    <label for="disabledTextInput">Fecha de Entrega</label>
                        <input type="date" class="form-control"  value="{{$pedido->fecha_entregado}}">
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