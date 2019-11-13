@extends ('layouts.admin')
@section ('contenido')

<div class="content-body">

<div class="row">

<div class="col-lg-8 col-md-6 col-xs-12">
<h3>Elegir Sucursal</h3>

@if (count($errors)>0)
<div class="alert alert-danger">
<ul>
@foreach ($errors->all() as $error)
<li>{{$error}} </li>
@endforeach
</ul>
</div>
@endif

{!!Form::open(array('url'=>'Ventas','method'=>'POST', 'autocomplete'=>'off'))!!}
{{Form::token()}}
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
<br>
<div class="form-group">
<button class="btn btn-primary" type="submit"> Ver</button>
<button class="btn btn-danger" type="reset"> Cancelar </button>
</div>




{!!Form::close()!!}

</div>

</div>
</div>
@endsection
