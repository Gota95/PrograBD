<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Venta;
use App\Sucursal;
use App\Http\Controllers\RVentasController;
use DB;


class RVentasController extends Controller
{
// funcion para obtener datos de los productos y la categoria al que pertenece
    public function imprimir(Request $request){
      //se obtienen los registros de las ventas y se filtran solo las que se realizarion en el dia actual

      $day = date("Y-m-d");
      $ventas=DB::table('venta as v')
      ->join('detalle_venta as dv','v.idventa','=','dv.idventa')
      ->join('persona as p','v.idcliente','=','p.idpersona')
      ->join('sucursal as s','dv.idsucursal','=','s.idsucursal')
      ->select('v.num_comprobante','v.total_venta',DB::raw('s.nombre as sucursal'),DB::raw('p.nombre as cliente'),'s.idsucursal')
      ->where('dv.idsucursal','=',$request->get('idsucursal'))
      ->orderBy('v.idventa','asc')
      ->get();

      $sucursal=DB::table('sucursal as s')
      ->select('s.idsucursal','s.nombre')
      ->where('s.idsucursal','=',$request->get('idsucursal'))
      ->get();

          //se configura y crea el archivo pdf para mostrar el reporte
      $view= \View::make('reportes.Ventas')->with('ventas',$ventas)->with('sucursal',$sucursal);
      $pdf = \App::make('dompdf.wrapper');
      $pdf->loadHTML($view);
      return $pdf->stream('ventas'.'.pdf');

    }
    public function ver(){
      $sucursales=DB::table('sucursal')->get();
      return view("reportes.sucursal",["sucursales"=>$sucursales]);
    }
}
