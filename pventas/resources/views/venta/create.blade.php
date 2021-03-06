@extends ('layouts.admin')
@section ('contenido')

<div class="content-body">

<div class="row">

<div class="col-lg-10 col-md-12 col-xs-12">
<center><h3>Nueva Venta</h3></center>

@if (count($errors)>0)
<div class="alert alert-danger">
<ul>
@foreach ($errors->all() as $error)
<li>{{$error}} </li>
@endforeach
</ul>
</div>
@endif

{!!Form::open(array('url'=>'venta','method'=>'POST', 'autocomplete'=>'off'))!!}
{{Form::token()}}


<div class="row">
  <?php $day = date('Y-m-d'); ?>
<div class="col-lg-4 col-sm-4 col-md-4 col-xs-6">
<div class="form-group">
<label for="fecha_hora">Fecha</label>
<input type="date" name="fecha_hora" value="<?php echo $day; ?>" readonly class="form-control" placeholder="fecha">
</div>
</div>

<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
<div class="form-group">
<label>Sucursal</label>
<select name="idsucursal" id="idsucursal" class="form-control">
@foreach ($sucursales as $suc)
<option value="{{$suc->idsucursal}}">{{$suc->nombre}}</option>
@endforeach
</select>
</div>
</div>

<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
<div class="form-group">
<label>Cliente</label>
<select name="idcliente" id="idcliente" class="form-control">
@foreach ($personas as $per)
<option value="{{$per->idpersona}}">{{$per->nombre}}</option>
@endforeach
</select>
</div>
</div>



<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">

<div class="form-group">
<label>Tipo Pago</label>
<select  name="tipo_comprobante" class="form-control">
<option value="Credito">Credito</option>
<option value="Debito">Debito</option>

</select>
</div>
</div>

<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">

<div class="form-group">
<label for="serie_comprobante">Numero de Tarjeta</label>
<input type="text" name="serie_comprobante" class="form-control" placeholder="XXXXXXX">
</div>
</div>


<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">

<div class="form-group">
<label for="num_comprobante">CVV</label>
<input type="text" name="num_comprobante" class="form-control" placeholder="CVV">
</div>
</div>


<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
<div class="form">
<label>Articulo</label>
            <select name="pidarticulo" id="pidarticulo" class="form-control" data-live-search="true">
            @foreach($articulos as $articulo)
            <option value="{{$articulo->idarticulo}}_{{$articulo->stock}}_{{$articulo->precio_venta}}">{{$articulo->articulo}}</option>
            @endforeach
            </select>

</div>
</div>

<div class="col-lg-3 col-sm-4 col-md-4 col-xs-12">
<div class="form-group">
<label for="cantidad">Cantidad</label>
<input type="number" name="pcantidad" id="pcantidad" class="form-control" placeholder="Cantidad">
</div>


</div>
<div class="col-lg-3 col-sm-4 col-md-4 col-xs-12">
<div class="form-group">
<label for="stock">Stock</label>
<input type="number" disabled name="pstock" id="pstock" class="form-control" placeholder="Stock">
</div>


</div>


<div class="col-lg-2 col-sm-4 col-md-4 col-xs-12">
<div class="form-group">
<label for=precio_venta>Precio Venta</label>
<input type="number" disabled name="pprecio_venta" id="pprecio_venta" class="form-control">

</div>

</div>

<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
<div class="form-group">
<label for=descuento>Descuento</label>
<input type="number" name="pdescuento" id="pdescuento" class="form-control">
</div>
</div>


<div class="col-lg-3 col-sm-4 col-md-4 col-xs-12">

<button type="button" id="bt_add" class="btn btn-primary">
Agregar
</button>

</div>

<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
</div>
<table id="detalles" class= "table table-striped table-bordered table-condensed table-hover">
<thead style="background-color: #c3f3ea">
<th>Opciones</th>
<th>Articulo</th>
<th>Cantidad</th>
<th>Precio Venta</th>
<th>Descuento</th>
<th>Subtotal</th>

</thead>
<tfoot>
<th>TOTAL</th>
<th></th>
<th></th>
<th></th>
<th></th>
<th><h4 id="total">Q/. 0.00</h4><input type="hidden" name="total_venta"id="total_venta"></th>

</tfoot>
<tbody>

</tbody>
</table>
</div>

</div>



<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" id="guardar">
<div class="form-group">
<input name="_token" value="{{ csrf_token() }}" type="hidden"></input>
<button class="btn btn-primary" type="submit"> Guardar </button>
<button class="btn btn-danger" type="reset"> Cancelar </button>


</div>

</div>
</div>


{!!Form::close()!!}

@push ('scripts')

<script>
 $(document).ready(function(){
    $('#bt_add').click(function(){
    agregar();
    });

  });



 var cont=0;

 total=0;

 subtotal=[];

 $("#guardar").hide();

 $('#pidarticulo').change(mostrarValores);



 function mostrarValores(){

  datosArticulo=document.getElementById('pidarticulo').value.split('_');

  $('#pprecio_venta').val(datosArticulo[2]);

  $('#pstock').val(datosArticulo[1]);

 }



 function agregar(){



    datosArticulos=document.getElementById('pidarticulo').value.split('_');





    idarticulo=datosArticulos[0];

    articulo=$("#pidarticulo option:selected").text();

    cantidad=$("#pcantidad").val();



    descuento=$("#pdescuento").val();

    precio_venta=$("#pprecio_venta").val();

    stock=$("#pstock").val();



    if (idarticulo!="" && cantidad!="" && cantidad>0 && descuento!="" && precio_venta!="")

    {

      if (stock>=0)
      {

      subtotal[cont]=(cantidad*precio_venta-descuento);
      total=total+subtotal[cont];
       var fila='<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">X</button></td><td><input type="hidden" name="idarticulo[]" value="'+idarticulo+'">'+articulo+'</td><td><input type="number" name="cantidad[]" value="'+cantidad+'"></td><td><input type="number" name="precio_venta[]" value="'+precio_venta+'"></td><td><input type="number" name="descuento[]" value="'+descuento+'"></td><td>'+subtotal[cont]+'</td></tr>';
       cont++;
       limpiar();
       $('#total').html("Q./ " + total);
       $('#total_venta').val(total);
       evaluar();
       $('#detalles').append(fila);
     }
     else
     {
      alert ('La cantidad a vender supera el stock');
     }
    }
    else
    {
      alert("Error al ingresar el detalle de la venta, revise los datos del articulo")
    }

}





 function limpiar(){

    $("#pcantidad").val("");

    $("#pdescuento").val("");

    $("#pprecio_venta").val("");

  }



  function evaluar()

  {

    if (total>0)

    {

      $("#guardar").show();

    }

    else

    {

      $("#guardar").hide();

    }

   }



 function eliminar(index){

  total=total-subtotal[index];

    $("#total").html("Q/. " + total);

    $("#total_venta").val(total);

    $("#fila" + index).remove();

    evaluar();

 }



</script>

@endpush

@endsection
