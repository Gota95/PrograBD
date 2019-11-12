<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Articulo;
use App\Sucursal;
use App\Categoria;
Use DB;
use Illuminate\Support\Facades\DB as IlluminateDB;

class CatalogoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      if($request){
      $query= trim($request->get('searchText'));
      $articulos=DB::table('articulo as art')
      ->join('categoria as cat', 'art.idcategoria','=','cat.idcategoria')->select('art.idarticulo','art.codigo',
      'art.nombre','art.precio','art.stock','art.descripcion','art.imagen','art.estado',DB::raw("cat.nombre as categoria"))
      ->where('cat.nombre','LIKE','%'.$query.'%')
      ->orderBy('art.idarticulo','asc')
      ->paginate(7);
      $categorias=Categoria::all();
      $sucursals=Sucursal::all();
      // se retorna  la vista a mostrar y en una variable los articulos
      return view("catalogo.index",["articulos"=>$articulos,"searchText"=>$query],compact('categorias'),compact('sucursals'));
      }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()//cotizacion
    {
        DB::select('CREATE TEMPORARY TABLE carritotemp(id INT NOT NULL AUTO_INCREMENT, 
        idarticulo INT NOT NULL,
        cantidad INT NOT NULL,
        PRIMARY KEY(id)');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $articulo=DB::table('articulo as art')
      ->join('categoria as cat', 'art.idcategoria','=','cat.idcategoria')->select('art.idarticulo','art.codigo',
      'art.nombre','art.precio','art.stock','art.descripcion','art.imagen','art.estado',DB::raw("cat.nombre as categoria"))
      ->where('art.idarticulo','=',$id)->first();
      $cat=Articulo::findOrFail($id);
      $sugeridos=DB::table('articulo as a')
      ->where('a.idcategoria','=',$cat->idcategoria)->get();
      $sucursals=Sucursal::all();
      return view("catalogo.show",["articulo"=>$articulo,"sugeridos"=>$sugeridos,"sucursals"=>$sucursals]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
