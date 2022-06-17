@extends('layouts.plantilla')
@section('title', 'Crear Pedido')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
@stop

@section('content_header')
    <h1>Crear Pedido</h1>
@stop
    
@section('content')
<div class="card">
<div class="card-body">    
    <form class="form-group" action="{{route('pedidos.store')}}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        @csrf
        <div class="row">
            <div class="col-md-3 mb-3">
                <label for="validationDefault01">Numero de Teléfono</label>
                <input type="text" name='telefono' id='telefono' class="form-control" placeholder="Numero de teléfono">
            </div>
            <div class="col-md-3 mb-3">
                <label for="validationDefault01">Cliente</label>
                <input type="text" id='nombre' class="form-control" placeholder="Nombre del Cliente">
                <input type="hidden" name='cliente_id' id='cliente_id'>
              </div>
              <div class="col-md-2 mb-2">
                <label for="validationDefault01">O Puedes</label><br>
                <button type="button" class="btn btn-primary form-control" data-toggle="modal" data-target="#exampleModal">Crear Cliente</button>
              </div>
            <div class="col-md-2 mb-2">
                <label for="validationDefault01">Fecha Recogida</label>
                <input  type="text" name='fecha_actual' id='fecha_actual' class="form-control" value="{{ $ldate = date('d/m/Y')}}" > 
            </div>
            <div class="col-md-2 mb-2">
                <label for="validationDefault01">Fecha prevista</label>
                <input type="text" name="fecha_prevista" id='fechaPrevista' class="form-control" placeholder="Fecha prevista">
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 mb-3">
                <label for="validationDefault01">Fecha de Entrega</label>
                <input type="date" name="fecha_entrega" class="form-control">
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
{{-- Modal para crear un cliente --}}
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Creacion de Clientes</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form class="form-group" action="{{route('clientes.store')}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <input type="hidden" class="form-control"  placeholder="El id se crea solo " name="cliente_id" disabled>
                </div>
                <div class="form-group">
                    <label for="disabledTextInput">Nif</label>
                    <input type="text" class="form-control"  placeholder="Nif del cliente.." name="nif" required>
                </div>
                <div class="form-group">
                    <label for="disabledTextInput">Nombre</label>
                    <input type="text" class="form-control"  placeholder="Nombre del cliente.." name="nombre" required>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Email</label>
                    <input typt="email" class="form-control" placeholder="Email del cliente..." name="email" required>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Telefono</label>
                    <input type="text" class="form-control"  placeholder="Telefono del cliente..." name="telefono" required>
                </div>
                <div class="form-group">
                    <label for="disabledTextInput">Domicilio</label>
                    <input type="text" class="form-control"  placeholder="Domicilio del cliente..." name="domicilio" required>
                </div>
                <div class="form-group">
                    <label for="disabledTextInput">Provincia</label>
                    <input type="text" class="form-control"  placeholder="Provincia del cliente..." name="provincia" required>
                </div>
                <div class="form-group">
                    <label for="disabledTextInput">Municipio</label>
                    <input type="text" class="form-control"  placeholder="Municipio del cliente..." name="municipio" required>
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

@stop

@section('js')
<script src="https://kit.fontawesome.com/19ecb18a8d.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function(){
            
        $("#telefono").change(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
        });
            var id=$("input[name=telefono]").val();
          
            if (id!=0){
            $.ajax({
                url: '{{route('ajax.cliente')}}',
                method:'post',
                data:{'telefono':id},
                success:function(data){
                    var datos=JSON.parse(data);
                    console.log(datos);
                    var fecha = sumaFecha(2,fecha);
                    $("#fechaPrevista").val(fecha);
                    $("#cliente_id").val(datos[0].cliente_id);
                    $("#nombre").val(datos[0].nombre);
                    $("#domicilio").val(datos[0].domicilio);
                    $("#municipio").val(datos[0].municipio);
                    $("#provincia").val(datos[0].provincia);
                }
            });
            }else{
                alert("El cliente no existe");
            }
            });
            });
            sumaFecha = function(d, fecha)
            {
            var Fecha = new Date();
            var sFecha = fecha || (Fecha.getDate() + "/" + (Fecha.getMonth() +1) + "/" + Fecha.getFullYear());
            var sep = sFecha.indexOf('/') != -1 ? '/' : '-';
            var aFecha = sFecha.split(sep);
            var fecha = aFecha[2]+'/'+aFecha[1]+'/'+aFecha[0];
            fecha= new Date(fecha);
            fecha.setDate(fecha.getDate()+parseInt(d));
            var anno=fecha.getFullYear();
            var mes= fecha.getMonth()+1;
            var dia= fecha.getDate();
            mes = (mes < 10) ? ("0" + mes) : mes;
            dia = (dia < 10) ? ("0" + dia) : dia;
            var fechaFinal = dia+sep+mes+sep+anno;
            return (fechaFinal);
            }
            
        </script>
<script>
  $(document).ready(function () {
      $('#example').DataTable({
          "language":{
            "search":     "Buscar",
            "lengthMenu": "Mostrar _MENU_ registros por página",
            "info":       "Mostrando página _PAGE_ de _PAGE_",
            "paginate":   {
                          "previous": "Anterior",
                          "next": "Siguiente",
                          "first": "Primero",
                          "last": "Ultimo"
            }
          }
      });
  });
  </script>
@stop