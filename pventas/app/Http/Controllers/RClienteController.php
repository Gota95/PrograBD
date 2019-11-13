<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class RClienteController extends Controller
{
  public function cliente(){
//se obtienen los registros de los productos
    $productos=DB::table('venta as v')
    ->join('categoria as cat','ar.idcategoria','=','cat.idcategoria')
    ->select('ar.codigo','ar.nombre','ar.precio','ar.stock','ar.estado',
    DB::raw('cat.nombre as categoria'))
    ->orderBy('ar.nombre','asc')
    ->get();
    //se configura y crea el archivo pdf para mostrar el reporte
    $view= \View::make('reportes.productos',compact('productos'));
    $pdf = \App::make('dompdf.wrapper');
    $pdf->loadHTML($view);
    return $pdf->stream('productos'.'.pdf');

  }
}
