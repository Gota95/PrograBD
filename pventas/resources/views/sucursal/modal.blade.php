<div class="modal fade modal-slide-in-rigth" aria-hidden="true"
role="dialog" tabindex="-1" id= "modal-delete-{{$suc->idsucursal}}">
{{Form::Open(array('action'=>array('SucursalController@destroy', $suc->idsucursal),'method'=>'delete'))}}
<div class="modal-dialog">
<div class="modal-content">


<div class="modal-header">

<h4 class="modal-title"> Eliminar Sucursal </h4>
<button type="button"class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">x</span>
</button>
</div>


<div class="modal-body">
<p> Confirme si desea eliminar esta sucursal </p>
</div>

<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
<button type="submit"class="btn btn-primary"> Confirmar</button>
</div>


</div>
</div>

{{Form::Close()}}

</div>
