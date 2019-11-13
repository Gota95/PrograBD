@extends ('welcome')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
 <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="container position-static">
        <div class="nk-sidebar"  style="position: fixed; left: 0; top: 5em;">
            <div class="nk-nav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label">Categorias</li>

                    <div class="form-group">
                          @foreach($categorias as $cat)
                            <li class="m-2"><button value="{{$cat->nombre}}" class="btn btn-primary p-0 w-100 bg-dark" name='boton'>
                                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                                    </i><span  class="nav-text text-warning font-weight-bold">{{$cat->nombre}}</span> 
                                </a>
                                </button>
                            </li>
                          @endforeach
                    </div>

                    
                    
                </ul>
            </div>
        </div>
</div>
<script type="text/javascript">
    $("button").click(function() {
        var nombre=$(this).val();
        location.href ="/catalogo?searchText="+nombre;

    });
</script>
        <!--**********************************
            Sidebar end
        ***********************************-->
@section('contenido')
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Store Online S.A.</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="6x6" href="{{asset('images/favicon.png')}}">
    <!-- Custom Stylesheet -->
    <link rel="stylesheet" href="{{asset('plugins/highlightjs/styles/darkula.css')}}">

    <link rel="stylesheet" href="{{asset('css/bootstrap-select.min.css')}}">

    <link href="{{asset('css/style.css')}}" rel="stylesheet">

</head>
       
<body>
<div style="margin-top:7%; margin-left:1rem">
  <div class="col-lg-12 col-lm-8" >
    <div class="card ">
      <div class="card-header">
        <h1>Articulos Disponibles</h1>
      </div>
      <div class="col-lg-12">
        @include('catalogo.search')
      </div>
      <div class="card-body  bg-dark">
        <div class="row">
        @foreach ($articulos as $a)
        <div class="card bg-light align-items-center" style="margin: 5px; width:24%; border-color: blue black yellow;
  border-width: 5px;
  border-style: solid;">
          <img class="card-img-top " src="{{ asset('imagenes/articulos/'.$a->imagen) }}" alt="Card image" style="width:75%; height:200px;">
          <div class="card-body text-center">
            <h4 class="card-title">{{$a->nombre}}</h4>
            <h5 style="color:coral">Q.{{$a->precio}}</h5>
            <h5>{{$a->categoria}}</h5>
            <a href="{{ route('catalogo.show', $a->idarticulo) }}" class="btn btn-primary">Detalle</a>
            <a href="{{ route('catalogo.carrito', $a->idarticulo) }}" class="btn btn-primary">Carrito</a>
          </div>
        </div>
        @endforeach
      </div>
        </div>
      </div>
    </div>
</div>
</body>
        <!--**********************************
        Scripts
    ***********************************-->
    <script src="{{asset('plugins/common/common.min.js')}}"></script>
    <script src="{{asset('js/custom.min.js')}}"></script>
    <script src="{{asset('js/jquery-3.4.1.min')}}"></script>
    @stack('scripts')
    <script src="{{asset('js/settings.js')}}"></script>
    <script src="{{asset('js/styleSwitcher.js')}}"></script>
    <script src="{{asset('js/bootstrap-select.min.css')}}"></script>

    <script src="{{asset('plugins/highlightjs/highlight.pack.min.js')}}"></script>
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>hljs.initHighlightingOnLoad();</script>

    <script>
        (function($) {
        "use strict"

            new quixSettings({
                version: "light", //2 options "light" and "dark"
                layout: "vertical", //2 options, "vertical" and "horizontal"
                navheaderBg: "color_1", //have 10 options, "color_1" to "color_10"
                headerBg: "color_1", //have 10 options, "color_1" to "color_10"
                sidebarStyle: "full", //defines how sidebar should look like, options are: "full", "compact", "mini" and "overlay". If layout is "horizontal", sidebarStyle won't take "overlay" argument anymore, this will turn into "full" automatically!
                sidebarBg: "color_1", //have 10 options, "color_1" to "color_10"
                sidebarPosition: "static", //have two options, "static" and "fixed"
                headerPosition: "static", //have two options, "static" and "fixed"
                containerLayout: "wide",  //"boxed" and  "wide". If layout "vertical" and containerLayout "boxed", sidebarStyle will automatically turn into "overlay".
                direction: "ltr" //"ltr" = Left to Right; "rtl" = Right to Left
            });


        })(jQuery);
    </script>
@endsection
