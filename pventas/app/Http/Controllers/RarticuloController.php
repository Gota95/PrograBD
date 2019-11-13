<?php

namespace App\Http\Controllers;

use App\Rarticulo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;


class RarticuloController extends Controller
{

  public function sucursal($id){
//se obtienen los registros de los productos
    $articulos=DB::table('detalle_venta as dv')
    ->join('venta as v','dv.idventa','=','v.idventa')
    ->join('articulo as a','dv.idarticulo','=','a.idarticulo')
    ->join('sucursal as s','dv.idsucursal','=','s.idsucursal')
    ->select(DB::raw('count(dv.idarticulo) as compras'),DB::raw('a.nombre as articulo'),
    DB::raw('s.nombre as sucursal'))
    ->groupBy('a.nombre')
    ->get();
    //se configura y crea el archivo pdf para mostrar el reporte
    $view= \View::make('reportes.clientes',compact('clientes'));
    $pdf = \App::make('dompdf.wrapper');
    $pdf->loadHTML($view);
    return $pdf->stream('clientes'.'.pdf');

  }

  public function general(){
//se obtienen los registros de los productos
    $articulos=DB::table('detalle_venta as dv')
    ->join('articulo as a','dv.idarticulo','=','a.idarticulo')
    ->select(DB::raw('SUM(dv.cantidad) as compras'),
    DB::raw('a.nombre as articulo'))
    ->groupBy('a.nombre')
    ->get();
    //se configura y crea el archivo pdf para mostrar el reporte
    $view= \View::make('reportes.articulogeneral',compact('articulos'));
    $pdf = \App::make('dompdf.wrapper');
    $pdf->loadHTML($view);
    return $pdf->stream('clientes'.'.pdf');

  }
}
