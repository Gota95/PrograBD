@extends ('layouts.content')
@section('contenido')
<br>

  <div class="col-lg-12 col-lm-8">
    <div class="card">
      <div class="card-header">
        <h1>Articulos Disponibles</h1>
      </div>
      <div class="col-lg-12">
        @include('catalogo.search')
      </div>
      <div class="card-body">
        <div class="row">
        @foreach ($articulos as $a)
        <div class="card bg-secondary" style="margin: 5px; width:300px;">
          <img class="card-img-top" src="{{ asset('imagenes/articulos/'.$a->imagen) }}" width="50" height="300" alt="Card image">
          <div class="card-body">
            <h4 class="card-title">{{$a->codigo}}</h4>
            <h4 class="card-title">{{$a->nombre}}</h4>
            <h5>Q.{{$a->precio}}</h5>
            <h5>{{$a->categoria}}</h5>
            <a href="{{ route('catalogo.show', $a->idarticulo) }}" class="btn btn-primary">Detalle</a>
          </div>
        </div>
        @endforeach
      </div>
        </div>
      </div>
    </div>
@endsection
