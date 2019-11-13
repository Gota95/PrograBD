<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class RTopController extends Controller
{
  public function imprimirtop(){
//se obtienen los registros de los productos
    $productos=DB::table('articulo as ar')
    ->select('ar.codigo','ar.nombre','ar.precio','ar.stock','ar.estado')
    ->limit(20)
    ->where('ar.stock','<=',10)
    ->orderBy('ar.nombre','asc')
    ->get();
    //se configura y crea el archivo pdf para mostrar el reporte
    $view= \View::make('reportes.top20',compact('productos'));
    $pdf = \App::make('dompdf.wrapper');
    $pdf->loadHTML($view);
    return $pdf->stream('top20'.'.pdf');

  }

  public function imprimirtoptop(){
//se obtienen los registros de los productos
    $productos=DB::table('articulo as ar')
    ->select('ar.codigo','ar.nombre','ar.precio','ar.stock','ar.estado')
    ->limit(50)
    ->where('ar.stock','<=',10)
    ->orderBy('ar.nombre','asc')
    ->get();
    //se configura y crea el archivo pdf para mostrar el reporte
    $view= \View::make('reportes.top20',compact('productos'));
    $pdf = \App::make('dompdf.wrapper');
    $pdf->loadHTML($view);
    return $pdf->stream('top20'.'.pdf');

  }
}
