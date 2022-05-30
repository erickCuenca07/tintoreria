@extends('layouts.plantilla')
@section('title',' Crear Pedido')
    
@section('content')
<div class="container">
<div class="form-row">    
    <form class="form-group" action="{{route('pedidos.store')}}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-row">
            <div class="col-md-3 mb-3">
                <label for="validationDefault01">Pedido ID</label>
                <input type="text" name="pedido_id" placeholder="Se crea solo..." class="form-control" >
            </div>      
            <div class="col-md-3 mb-3">
                <label for="validationDefault01">Cliente</label>
                  <select name='cliente_id' id='cliente_id' class="custom-select">
                      <option selected>Elige un Cliente</option>
                      @foreach ($cliente as $cliente)
                          <option value="{{$cliente->cliente_id}}">{{$cliente->nombre}}</option>
                      @endforeach
                  </select>
              </div>
            <div class="col-md-3 mb-3">
                <label for="validationDefault01">Fecha Recogida</label>
                <input  type="date" name='fecha_actual' id='fecha_actual' class="form-control"> 
            </div>
            <div class="col-md-3 mb-3">
                <label for="validationDefault01">Fecha prevista</label>
                <input type="date" name="fecha_prevista" class="form-control">
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-3 mb-3">
                <label for="validationDefault01">Fecha de Entreda</label>
                <input type="text" name="fecha_entrega" class="form-control">
            </div> 
            <div class="col-md-3 mb-3">
                <label for="validationDefault03">Domicilio</label>
                <input type="text" class="form-control" name="domicilio" id="domicilio" placeholder="Domicilio del cliente..."required>
            </div>
            <div class="col-md-3 mb-3">
                <label for="validationDefault03">Provincia</label>
                <input type="text" class="form-control" name="provincia" id="provincia" placeholder="Provincia del cliente..."required>
            </div>
            <div class="col-md-3 mb-3">
                <label for="validationDefault04">Municipio</label>
                <input type="text" class="form-control" name="municipio" id="municipio" placeholder="Municipio del cliente..."required>
            </div>
        </div>     
        <input type="submit" class="btn btn-primary" name="Actulizar" value="Crear">
    </form>
</div>
</div>

@endsection

@section('scripts')
    <script>
$(document).ready(function(){
		
	$("#cliente_id").change(function(){
        $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
        var id=$("select[name=cliente_id]").val();
        if (id!=0){
        $.ajax({
            url: '{{route('ajax.cliente')}}',
            method:'post',
            data:{'cliente_id':id},
            success:function(data){
                var datos=JSON.parse(data);
                $("#cliente_id").val(datos.cliente_id);
                $("#domicilio").val(datos.domicilio);
                $("#provincia").val(datos.provincia);
                $("#municipio").val(datos.municipio);  
            }
        });
        }else{
            alert("Cliente no seleccionado");
        }
        });
    });
</script>
@endsection