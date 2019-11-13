<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Venta;
use DB;

class RClienteController extends Controller
{
  public function cliente(){
//se obtienen los registros de los productos
    $clientes=DB::table('venta as v')
    ->join('persona as p','v.idcliente','=','p.idpersona')
    ->select(DB::raw('p.nombre as cliente'),DB::raw('count(v.idcliente) as compras'))
    ->where('v.estado','=','A')
    ->groupBy('p.nombre')
    ->get();
    //se configura y crea el archivo pdf para mostrar el reporte
    $view= \View::make('reportes.clientes',compact('clientes'));
    $pdf = \App::make('dompdf.wrapper');
    $pdf->loadHTML($view);
    return $pdf->stream('clientes'.'.pdf');

  }
}
