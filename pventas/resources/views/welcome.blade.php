<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Control Ventas</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        
        <!-- Styles -->
        <link rel="stylesheet" href="css/estilos.css">
        <link href="{{asset('css/style.css')}}" rel="stylesheet">
    </head>

    <body class="m-3 p-0">


      <nav class="navbar navbar-expand-md navbar-dark bg-dark navbar-laravel fixed-top">
        <div class="container">
          <h3><a class="navbar-brand text-white" href="/">Sistema Ventas</a></h3>
          <h3><a class="navbar-brand text-white" href="/catalogo">Productos</a></h3>
          <h3><a class="navbar-brand text-white" href="/map">Mapa</a></h3>       
          <h3><a href="{{'/home'}}" style="text-decoration-line: none" class="text-white"><i calss="icon-user text-primary">
          </i> Iniciar Sesión</a></h3>
        </div>
    </nav>
    <div class="container-fluid" style="margin:0%; padding:0%;">
		  @yield('carrusel')
    </div>
    
	  <div class="content-body">
		@yield('contenido')
    </div>
    <div class="container-fluid">
		  @yield('contentmapa')
	  </div>
    </body>
</html>
