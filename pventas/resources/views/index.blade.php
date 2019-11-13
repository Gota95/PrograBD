@extends('welcome')
@section('carrusel')
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <style>
  /* Make the image fully responsive */
    div.carousel-inner{
        width: 100%;
        height: 350px;
    }
    .carousel-inner img {
        width: 100%;
 
    }
  </style>
</head>
<body>
<div id="promociones" class="carousel slide" data-ride="carousel">

  <!-- Indicators -->
  <ul class="carousel-indicators">
    <li data-target="#promociones" data-slide-to="0" class="active"></li>
    <li data-target="#promociones" data-slide-to="1"></li>
    <li data-target="#promociones" data-slide-to="2"></li>
  </ul>
  
  <!-- The slideshow -->
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="http://www.intelaf.com/data1/Banner_nueva_pagina/banner-hyperx-audifonos-pc.jpg" alt="Los Angeles" width="1100" height="500">
    </div>
    <div class="carousel-item">
      <img src="http://www.intelaf.com/data1/Banner_nueva_pagina/banner-nexxt-pc.jpg" alt="Chicago" width="1100" height="500">
    </div>
    <div class="carousel-item">
      <img src="https://t3.ftcdn.net/jpg/02/40/37/22/500_F_240372267_Z1hFxTp6xNAf31D6Xml4RRG3hDOl9jdZ.jpg" alt="New York" width="1100" height="500">
    </div>
  </div>
</div>

<div class="container-fluid">
    <br>
    <h1>Nuevos Productos</h1>
    <?php
        use App\Articulo;
        $articulos=Articulo::paginate(8);
    ?>
    <div class="container">
        <div class="row">
        @foreach ($articulos as $a)
            <div class="card bg-ligth align-items-center" style="margin: 15px; width:20%; height:350px; border-color: black; border-width: 2px; border-style: solid;">
            <img class="card-img-top mt-1" src="{{ asset('imagenes/articulos/'.$a->imagen) }}" alt="Card image" style="width:75%; height:75px;">
            <div class="card-body text-center">
                <h4 class="card-title">{{$a->nombre}}</h4>
                <h5 style="color:coral">Q.{{$a->precio}}</h5>
                <h5>{{$a->categoria}}</h5>
                <a href="{{ route('catalogo.show', $a->idarticulo) }}" class="btn btn-primary">Detalle</a>
            </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<br>
<div class="container-fluid" style="margin:0%; padding:0%;">
    <img src="https://blog.bq.com/wp-content/uploads/2019/04/5.-Active1.png" width="100%" height="250px">
</div>
<div class="container-fluid" style="margin:0%;">
   <CENTER> <h1>STORE ONLINE S.A</h1><br><br><br><br><br><br><br><br></CENTER>
</div>
<script>
  $('#promociones').carousel({
   interval: 4000
  });
  $('#productos').carousel({
   interval: 2000
  });
 </script>  
@endsection