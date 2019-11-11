@extends ('layouts.content')
@section('contenido')
<br>
<div class="row">
  <div class="card col-lg-8" style="left: 300px;">
    <div class="card-header">

      <h1>{{$articulo->nombre}}</h1>
    </div>
    <div class="card-body">
      <div class="row">
        <div class="card bg-light" style="margin: 5px; width:300px;">
          <img class="card-img-top" src="{{asset('imagenes/articulos/'.$articulo->imagen)}}" alt="Card image">
        </div>
        <div class="card bg-light" style="margin: 5px; width:300px; text-align: center;">
          <label for="codigo">Codigo</label>
          <h4 class="card-title">{{$articulo->codigo}}</h4>
          <label for="precio">Precio</label>
          <h5>Q.{{$articulo->precio}}</h5>
          <label for="categoria">Categoria</label>
          <h5>{{$articulo->categoria}}</h5>
        </div>

        <div class="card bg-light" style="margin: 5px; width:300px;">
          
          <button type="button" name="Add" class="btn btn-primary"> <i class="ti-shopping-cart"></i> Agregar</button>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
