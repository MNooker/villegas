<?php

namespace App\Http\Controllers;

use App\usuarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class UsuariosController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos=usuarios::paginate(2);
        return view("usuarios.mostrar",compact('datos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usuarios.agregar');
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
        if($request->hasFile('Foto')){

            $datosEmpleados['Foto']=$request->file('Foto')->store('uploads','public');
        }
        usuarios::insert($datosEmpleados);
        return response()->json($datosEmpleados);
        return redirect("/usuarios");
        //return response()->json($datos);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function show(usuarios $usuarios)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function edit(usuarios $usuarios)
    {
        $datos=usuarios::findOrFail($usuarios);
        return view("usuarios.modificar",compact('datos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, usuarios $usuarios)
    {
        $datos=request()->except('_token','_method');

        if($request->hasFile('Foto')){
            $dato=usuarios::findOrFail($usuarios);
            Storage::delete('public/'.$dato->Foto);
            $datos['Foto']=$request->file('Foto')->store('uploads','public');
        }



        usuarios::where('id','=',$usuarios)->update($datos);
        return redirect('usuarios');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function destroy(usuarios $usuarios)
    {
        $dato=usuarios::findOrFail($usuarios);
        if(Storage::delete('public/'.$dato->Foto)){
            usuarios::destroy($usuarios);
        }

        return redirect('usuarios');
    }
}
