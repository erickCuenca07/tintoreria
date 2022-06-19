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

</head>
<body>
<div class="card">
    <div class="card-body">
    <h1 class="display-4">Tintorerias Erick</h1>
    <p>Cliente: <b>{{$pedido->clientes->nombre}}</b></p>
    <p>Fecha Actual: <b>{{$pedido->fecha_recibo}}</b></p>
    <p>Fecha Prevista: <b>{{$pedido->fecha_prevista}}</b></p>
    @foreach ($pedido->lineas as $key)
    <p>Numero de Pedido <b>#{{$key->numero_pedido}}</b></p>
    <table class="table table-borderless table-sm">
        <thead></thead>
          <tr>
            <th scope="col">Prenda</th>
            <th scope="col">Servicio</th>
            <th scope="col">Cantidad</th>
            <th scope="col">Precio</th>
          </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{$key->prenda->nombre}}</td>
                <td>{{$key->servicio->nombre}}</td>
                <td>{{$key->cantidad}}</td>
                <td>{{$key->precio}}</td>
            </tr>
        </tbody>
    </table>
    @endforeach
    <div class="card">
        <div class="card-body">
                <div class="col-md-2">
                    <label>Total de la Compra: {{$pedido->total()}}</label>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</body>
</html>