<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Sucursal;
use App\Http\Requests\SucursalFormRequest;
use Illuminate\Support\Facades\Redirect;
use DB;

class SucursalController extends Controller
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
            $sucursals=DB::table('sucursal as suc')
            ->select('suc.idsucursal','suc.nombre', 'suc.latitud', 'suc.longitud','suc.departamento','suc.direccion')
            ->where('suc.nombre','LIKE','%'.$query.'%')
            ->orderBy('suc.nombre','asc')
            ->paginate(5);
            return view("sucursal.index",["sucursals"=>$sucursals,"searchText"=>$query]);
          }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("sucursal.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sucursal=new Sucursal;
        $sucursal->idsucursal=$request->get('idsucursal');
        $sucursal->nombre=$request->get('nombre');
        $sucursal->direccion=$request->get('direccion');
        $sucursal->latitud=$request->get('latitud');
        $sucursal->longitud=$request->get('longitud');
        $sucursal->departamento=$request->get('departamento');
  
        $sucursal->save();
  
        return Redirect::to('sucursal');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sucursal  $sucursal
     * @return \Illuminate\Http\Response
     */
    public function show(Sucursal $sucursal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sucursal  $sucursal
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view("sucursal.edit",["sucursal"=>Sucursal::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sucursal  $sucursal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $sucursal=Sucursal::findOrFail($id);
        $sucursal->nombre=$request->get('nombre');
        $sucursal->direccion=$request->get('direccion');
        $sucursal->latitud=$request->get('latitud');
        $sucursal->longitud=$request->get('longitud');
        $sucursal->departamento=$request->get('departamento');
  
        $sucursal->update();
  
        return Redirect::to('sucursal');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sucursal  $sucursal
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sucursal = DB::table('sucursal')->where('idsucursal','=',$id)->delete();
        return Redirect::to('sucursal');
    }
}
