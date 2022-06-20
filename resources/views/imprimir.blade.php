<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Imprimir</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    <style>
        td,th,tr,
        table {
            border-top: 1px solid black;
            border-collapse: collapse;
        }
        .ticket {
            width: 155px;
            max-width: 155px;
        }
        td.cantidad,th.cantidad {
            width: 40px;
            max-width: 40px;
            word-break: break-all;
        }
        td.producto,th.producto {
            width: 75px;
            max-width: 75px;
        }
        td.precio,th.precio {
            width: 40px;
            max-width: 40px;
            word-break: break-all;
        }
    </style>
</head>
<body>
<div class="ticket">
    <h1 class="display-4">Tintorerias Erick</h1>
    <p>Cliente: <b>{{$pedido->clientes->nombre}}</b></p>
    <p>Fecha Actual: <b>{{$pedido->fecha_recibo}}</b></p>
    <p>Fecha Prevista: <b>{{$pedido->fecha_prevista}}</b></p>
    @foreach ($pedido->lineas as $key)
    <p>Numero de Pedido <b>#{{$key->numero_pedido}}</b></p>
    <table class=" table table-borderless table-sm">
        <thead></thead>
          <tr>
            <th class="producto">Prenda</th>
            <th scope="col">Servicio</th>
            <th class="cantidad">Cant</th>
            <th class="precio">Precio</th>
          </tr>
        </thead>
        <tbody>
            <tr>
                <td class="producto">{{$key->prenda->nombre}}</td>
                <td>{{$key->servicio->nombre}}</td>
                <td class="cantidad">{{$key->cantidad}}</td>
                <td class="precio">{{$key->precio}}</td>
            </tr>
            <tr>
                <td class="cantidad"></td>
                <td class="cantidad"></td>
                <td class="producto">TOTAL</td>
                <td class="precio">{{$pedido->total()}}</td>
            </tr>
        </tbody>
    </table>
    @endforeach
</div>
</body>
</html>