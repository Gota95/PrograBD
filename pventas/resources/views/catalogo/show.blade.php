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
        <div class="card bg-light" style="margin: 5px; ">
          <img class="card-img-top" src="{{asset('imagenes/articulos/'.$articulo->imagen)}}" width="75" height="250" alt="Card image">
        </div>
        <div class="card bg-light" style="margin: 5px; width:300px; left: 100px; text-align: center;">
          <label for="codigo">Codigo</label>
          <h4 class="card-title" >{{$articulo->codigo}}</h4>
          <label for="precio">Precio</label>
          <h5>Q.{{$articulo->precio}}</h5>
          <label for="categoria">Categoria</label>
          <h5>{{$articulo->categoria}}</h5>
          <br>
    
          <a href="{{ route('catalogo.index', $articulo->idarticulo) }}"> <button class="btn btn-info"><i class="ti-shopping-cart"></i>Agregar</button></a>
               

         
        </div>
      </div>
    </div>
  </div>
  <div class="card col-lg-8" style="left: 300px;">
    <div class="card-header">
      <h1>Productos Sugeridos</h1>
    </div>
    <div class="card-body">
      <div class="row">
        @foreach ($sugeridos as $a)
        <div class="card bg-light" style="margin: 5px; ">
          <img class="card-img-top" src="{{ asset('imagenes/articulos/'.$a->imagen) }}" width="50" height="300" alt="Card image">
          <div class="card-body">
            <h4 class="card-title">{{$a->codigo}}</h4>
            <h4 class="card-title">{{$a->nombre}}</h4>
            <h5>Q.{{$a->precio}}</h5>
            <a href="{{ route('catalogo.show', $a->idarticulo) }}" class="btn btn-primary">Detalle</a>
            
          </div>
        </div>
    @endforeach
  </div>
      </div>
    </div>
  </div>
</div>




@push ('scripts')



@endpush

@endsection
