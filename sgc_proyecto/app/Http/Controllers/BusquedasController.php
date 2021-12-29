<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BusquedasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $nombre = $request->get("Nombre");
        $apellido = $request->get("Apellido");
        $telefono = $request->get("Telefono");
        $correo = $request->get("Correo");

        $candidatos = DB::table("candidatos")
                                ->select("*")
                                ->where("Nombre", "like", "%".$nombre."%")
                                ->where("Apellido", "like", "%".$apellido."%")
                                ->where("Telefono", "like", "%".$telefono."%")
                                ->where("Correo", "like", "%".$correo."%")
                                ->get();
        $parametro = [
            "candidatos" => $candidatos,
            "titulo" => "Candidatos disponibles"
        ];

        return view('candidatos.buscar', $parametro);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        //
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
