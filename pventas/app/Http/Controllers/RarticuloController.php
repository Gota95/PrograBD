<?php

namespace App\Http\Controllers;

use App\Rarticulo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;


class RarticuloController extends Controller
{
  public function mes(){
//se obtienen los registros de los productos

    $mes=Carbon::now();
    $articulos=DB::table('detalle_venta as dv')
    ->join('venta as v','dv.idventa','=','v.idventa')
    ->join('articulo as a','dv.idarticulo','=','a.idarticulo')
    ->select(DB::raw('count(dv.idarticulo) as compras'),DB::raw('a.nombre as articulo'))
    ->where('v.fecha_hora','>=',)
    ->groupBy('a.nombre')
    ->get();
    //se configura y crea el archivo pdf para mostrar el reporte
    $view= \View::make('reportes.clientes',compact('clientes'));
    $pdf = \App::make('dompdf.wrapper');
    $pdf->loadHTML($view);
    return $pdf->stream('clientes'.'.pdf');

  }

  public function sucursal(){
//se obtienen los registros de los productos
    $articulos=DB::table('venta as v')
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

  public function general(){
//se obtienen los registros de los productos
    $articulos=DB::table('detalle_venta as dv')
    ->join('venta as v','dv.idventa','=','v.idventa')
    ->join('articulo as a','dv.idarticulo','=','a.idarticulo')
    ->select(DB::raw('count(dv.idarticulo) as compras'),DB::raw('a.nombre as articulo'))
    ->groupBy('a.nombre')
    ->get();
    //se configura y crea el archivo pdf para mostrar el reporte
    $view= \View::make('reportes.clientes',compact('clientes'));
    $pdf = \App::make('dompdf.wrapper');
    $pdf->loadHTML($view);
    return $pdf->stream('clientes'.'.pdf');

  }
}
