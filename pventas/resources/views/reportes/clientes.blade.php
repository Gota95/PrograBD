<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Productos</title>
  {{-- SE DEFINE EL ESTILO DEL FORMULARIO PARA LA VISTA AMIGABLE --}}
  <style>
  table{
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
  }
  td, th{
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
  }
  tr:nth-child(even){
    background-color: #dddddd;
  }
  </style>
</head>
<body>
  {{-- nombre del reporte --}}
  <h1>Lista de Productos</h1>
  {{-- creamos la tabla con los diferentes campos de encabezado y el cuerpo que contiene los datos obtenidos anteriormente --}}
    <table>
      <tr>
        <th>Nombre</th>
        <th>Compras</th>
      </tr>
      @foreach($clientes as $c)
        <tr>
          <td>{{$c->cliente}}</td>
          <td>{{$c->compras}}</td>
        </tr>
      @endforeach
    </table>
</body>
</html>
