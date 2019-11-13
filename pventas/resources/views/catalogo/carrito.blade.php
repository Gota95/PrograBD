@extends('welcome')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
 <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="container">
        <div class="nk-sidebar" style="position: fixed; left: 0; top: 5em;">
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Carrito</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
</head>
<body>
    <div style="margin-top:7%; margin-left:1rem">
        <div class="col-lg-12 col-lm-8" >
            <div class="card " id="imprimible">
                <div class="card-header">
                    <h1 class="text-center">Cotización</h1>
                </div>
                <div class="card-body">
                <h3 class="float-left"><strong>Fecha:</strong> {{date('d/m/Y')}}</h3><button  id="eliminar" class="btn btn-danger float-right">X</button>
                <div class="container-fluid mt-5">
                <table class="table table-bordered table-sm">
                    <thead>
                    <tr class="active text-center">
                        <th>Nombre</th>
                        <th style="width:20px;">Cantidad</th>
                        <th>Precio</th>
                        <th>Subtotal</th>
                        <th style="width:20px;"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach(Session::get('cart') as $values) 
                        <tr>
                            <td>{{$values['nombre']}}</td>
                            <td><input class="form-control form-control-sm" type="number" value="{{$values['cantidad']}}">
                            </td>
                            <td>Q.{{$values['precio']}}</td>
                            <td>Q.<p name="sub">{{$values['subtotal']}}</p></td>
                            <td class="p-0" id="eliminar"><a href="" class="btn btn-danger w-100" name="elimi"><span class="fas fa-trash-alt"></span></a></td>
                        </tr>   
                    @endforeach
                    </tbody>
                </table>
                <h3 class="float-right mr-5">Total: <strong>Q.</strong></h3><br>
                <div class="container-fluid">
                    
                </div>
                </div>
                </div>
            </div>
        </div>
    </div>
    <a href="/catalogo" class="btn btn-success" style="position: relative; top: -18px; left: 35px;">Agregar Producto</a>
    <a href="" class="btn btn-success" id="btnImprimir" style="position: relative; top: -18px; left: 70px;">Imprimir</a>


<script>
    var sum=document.getElementsByName('sub');
    var suma=0;
    for(i=1;i<=sum.length;i++){
        suma=suma+sum.values;
    }
    alert(suma);
function imprimirElemento(elemento){
    var boto = document.getElementsByName("elimi");
    for(i=1;i<=boto.length*100;i++){
        //alert("btm"+i);
        eliminarElemento('eliminar');
    }
    
  var ventana = window.open('', 'PRINT', 'height=600 ,width=700');
  ventana.document.write('<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">');
  ventana.document.write('<html><head><title>' + document.title + '</title>');
  ventana.document.write('</head><body >');
  ventana.document.write(elemento.innerHTML);
  ventana.document.write('</body></html>');
  ventana.document.close();
  ventana.focus();
  ventana.print();
  ventana.close();
  return true;
}

document.querySelector("#btnImprimir").addEventListener("click", function() {
  var div = document.querySelector("#imprimible");
  imprimirElemento(div);
});

function eliminarElemento(id){
    	imagen = document.getElementById(id);	
    	if (!imagen){
    		alert("El elemento selecionado no existe");
    	} else {
    		padre = imagen.parentNode;
    		padre.removeChild(imagen);
    	}
    }
</script>
</body>
</html>
@endsection