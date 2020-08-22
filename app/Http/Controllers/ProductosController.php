<?php

namespace App\Http\Controllers;

use App\productos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class ProductosController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$datos=productos::all();
        $datos=productos::paginate(2);
        return view("productos.mostrar",compact('datos'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("productos.agregar");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$datosEmpeados=request()->all();
        $datosEmpleados=request()->except('_token');
        if($request->hasFile('imagen')){

            $datosEmpleados['imagen']=$request->file('imagen')->store('imagenes','public');
        }
        productos::insert($datosEmpleados);

        return redirect('productos');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function show(productos $productos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $datos=productos::findOrFail($id);
        return view("productos.modificar",compact('datos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datos=request()->except('_token','_method');

        if($request->hasFile('imagen')){
            $dato=productos::findOrFail($id);
            Storage::delete('public/'.$dato->imagen);
            $datos['imagen']=$request->file('imagen')->store('uploads','public');
        }



        productos::where('id','=',$id)->update($datos);
        return redirect('productos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dato=productos::findOrFail($id);
        if(Storage::delete('public/'.$dato->Foto)){
            productos::destroy($id);
        }

        return redirect('productos');
    }
    public function catalogo(){
        $datos=productos::paginate(2);
        return view("productos.catalogo",compact('datos'));
    }
}
