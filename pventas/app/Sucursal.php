<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sucursal extends Model
{
    protected $table='sucursal';
    protected $primaryKey='idsucursal';
  
    public $timestamps=false;
    //se colocara el nombre de cada campo de la tabla tal y como este en la base de datos
    protected $fillable=[
        'nombre', 
        'latitud',
        'longitud',
        'direccion',
        'departamento'
    ];

}



