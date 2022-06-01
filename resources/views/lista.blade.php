@extends('layouts.plantilla')

@section('title','Facturas')

@section('content')
<div class="container">
    <h1>Pedidos</h1>
    <br>
<div class='row'>
    <table id="tabla" class='table'>
        <thead>
            <tr>
            <th scope='col' class='center'>Numero de Pedido</th>
            <th scope='col' class='center'>Cliente </th>
            <th scope='col' class='center'>Fecha Recivido</th>
            <th scope='col' class='center'>Domicilio</th>
            <th scope='col' class='center'>Fecha Prevista</th>
            <th scope='col' class='center'>Fecha de Entrega</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pedido as $pedido)
                <tr>
                    <td><a href="{{route('pedidos.edit',$pedido->numero_pedido)}}">{{$pedido->numero_pedido}}</a></td>
                    <td>{{$pedido->clientes->nombre}}</td>
                    <td>{{$pedido->fecha_recibo}}</td>
                    <td>{{$pedido->domicilio}}</td>
                    <td>{{$pedido->fecha_prevista}}</td>
                    <td>{{$pedido->fecha_entregado}}</td>
                    </tr>
            @endforeach 
        </tbody>
    </table>
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
            data:{'id':id},
            success:function(data){
                var datos=JSON.parse(data);
                $("#domicilio").val(datos.domicilio);
                $("#municipio").val(datos.municipio);
                $("#provincia").val(datos.provincia);
            }
        });
        }else{
            alert("Cliente no seleccionado");
        }
        });
    });
    </script>
@endsection