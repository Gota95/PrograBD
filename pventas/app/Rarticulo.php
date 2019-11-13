<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rarticulo extends Model
{
  //definimos las llavese primarias y los campos de la tabla
  protected $table='rarticulo';
  protected $primaryKey='idrarticulo';

  public $timestamps=false;

  protected $fillable=[
    'idarticulo',
    'idsucursal',
  ];
}
