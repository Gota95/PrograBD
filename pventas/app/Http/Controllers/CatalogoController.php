<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Articulo;
use App\Sucursal;
use App\Categoria;
Use DB;
use Session;

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
      ->paginate();
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
    public function create()
    {
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
    public function edit($id)//cotizacion
    {
        return view('catalogo.carrito');
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

    public function carrito($id){

        $product = Articulo::find($id);
        $idp=$product->idarticulo;
        $nombre=$product->nombre;
        $precio=$product->precio;

        $cart = Session::get('cart');
        $cart[$idp] = array(
            "id" => $idp,
            "nombre" => $nombre,
            "precio" => $precio,
            "cantidad"=>1,
            "subtotal"=> $precio*1,
        );
    
        Session::put('cart', $cart);
        //dd(Session::get('cart'));
        
        //return redirect()->back();
        $categorias=Categoria::all();
        return view('catalogo.carrito',compact('categorias'));
    }
}
