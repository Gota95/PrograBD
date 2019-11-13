@extends ('layouts.admin')
@section ('contenido')
<div class="row">
<div class="col-lg-8 col-md-6 col-xs-12">
<center><h3>Nueva Sucursal </h3></center>
<br>
@if (count($errors)>0)
<div class="alert alert-danger">
<ul>
@foreach ($errors->all() as $error)
<li>{{$error}} </li>
@endforeach
</ul>
</div>
@endif

{!!Form::open(array('url'=>'sucursal','method'=>'POST', 'autocomplete'=>'off','files'=>'true'))!!}
{{Form::token()}}
<div class="content-body">
        
<div class="row">

<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">

<div class="form-group">
<label for="nombre">Nombre</label>
<input type="text" name="nombre" class="form-control" placeholder="Nombre">
</div>
</div>



<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">

<div class="form-group">
<label for="direccion">Direccion</label>
<input type="text" name="direccion" class="form-control" placeholder="Direccion">
</div>
</div>

<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
<div class="form-group">
<label for="departamento">Departamento</label>
<input type="text" name="departamento" class="form-control" placeholder="Departamento">
</div>
</div>

<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
<div class="form-group">
<label for="latitud">Latitud</label>
<input type="text" name="latitud" class="form-control" placeholder="Latitud">
</div>
</div>


<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
<div class="form-group">
<label for="longitud">Longitud</label>
<input type="text" name="longitud" class="form-control" placeholder="Longitud">
</div>
</div>

</div>
<br>
<div class="form-group">
<button class="btn btn-primary" type="submit"> Guardar </button>
<button class="btn btn-danger" type="reset"> Cancelar </button>
<div>




{!!Form::close()!!}

</div>
</div>
</div>

@endsection