@extends ('welcome')


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
 <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="container" style="float:left;">
        <div class="nk-sidebar" style="position: fixed; left: 0; top: 5em;">
            <div class="nk-nav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label">Sucursales</li>
                    <div class="form-group">
                          @foreach($sucursals as $suc)
                                <a  href="javascript:void()" aria-expanded="false">
                                 --   </i><span  class="nav-text text-warning font-weight-bold">{{$suc->nombre}}</span> 
                                </a>
                            </li>
                          @endforeach
                    </div>
                </ul>
            </div>
        </div>
</div>
@section('contenido')
<div style="margin-top:7%; margin-left:2rem">
<div class="col-lg-12 col-lm-8" >
    <div class="card ">
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
    
          <a href="{{ route('catalogo.carrito', $articulo->idarticulo) }}"> <button class="btn btn-info"><i class="ti-shopping-cart"></i>Agregar</button></a>
               

         
        </div>
      </div>
    </div>
  </div>
</div>





  <div class="col-lg-12 col-lm-8" >
    <div class="card">
    <div class="card-header">
      <h1>Productos Sugeridos</h1>
    </div>
    <div class="card-body">
      <div class="row">
        @foreach ($sugeridos as $a)
        <div class="card bg-light" style="margin: 5px; width:250px; left: 100px; text-align: center;">
          <img class="card-img-top" src="{{ asset('imagenes/articulos/'.$a->imagen) }}" width="0" height="250" alt="Card image">
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
