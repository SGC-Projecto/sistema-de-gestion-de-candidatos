<?php

namespace App\Http\Controllers;

use App\Models\Candidatos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CandidatosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['candidatos']=Candidatos::paginate(10);
        return view('candidatos.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('candidatos.create');
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
        //$datosCandidatos = request()->all();


        // $request->validate([
        //     'Nombre'=> 'required',
        //     'Apellido'=> 'required',
        //     'Telefono'=> 'required|integer|min:0|max:20',
        //     'Correo'=> 'required',
        //     'Foto'=>'required|mimes:png,jpg,jpeg|max:5048',
        //     'CV'=>'required'
        // ]);

        // $nombreFoto = time().'-'.$request->foto->extension();

        // dd($nombreFoto);
        // $request -> foto -> move(public_path('storage/uploads'),$nombreFoto);


        // $datosCandidatos = 

        // $test = $request->all();

        

        // $candidato = Candidatos::create([
        //     'Nombre'=> $request->input('Nombre'),
        //     'Apellido'=> $request->input('Apellido'),
        //     'Telefono'=> $request->input('Telefono'),
        //     'Correo'=> $request->input('Correo'),
        //     'Foto'=> $request->input('Foto'),
        //     'CV'=> $request->input('CV')
        // ]);


        $datosCandidatos = request()->except('_token');
        $nombreFoto = $request->Nombre.'-'.time().'.'.$request->Foto->extension();
        $nombreCV = $request->Nombre.'-'.time().'.'.$request->CV->extension();
        
        if($request->hasFile('Foto')){
            $datosCandidatos['Foto']=$request->file('Foto')->move('storage\uploads', $nombreFoto);
        }
        if($request->hasFile('CV')){
            $datosCandidatos['CV']=$request->file('CV')->move('storage\uploads', $nombreCV);
        }
        Candidatos::insert($datosCandidatos);

        return redirect('candidatos');

        dd($datosCandidatos);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Candidatos  $candidatos
     * @return \Illuminate\Http\Response
     */
    public function show(Candidatos $candidatos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Candidatos  $candidatos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $candidatos=Candidatos::findOrFail($id);
        return view('candidatos.edit', compact('candidatos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Candidatos  $candidatos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        
        $datosCandidatos = request()->except(['_token', '_method']);
        $nombreFoto = $request->Nombre.'-'.time().'.'.$request->Foto->extension();
        $nombreCV = $request->Nombre.'-'.time().'.'.$request->CV->extension();
        if($request->hasFile('Foto')){
            $datosCandidatos['Foto']=$request->file('Foto')->move('storage\uploads', $nombreFoto);
        }
        if($request->hasFile('CV')){
            $datosCandidatos['CV']=$request->file('CV')->move('storage\uploads', $nombreCV);
        }
        Candidatos::where('id','=', $id)->update($datosCandidatos);

        $candidatos=Candidatos::findOrFail($id);
        return view('candidatos.edit', compact('candidatos'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Candidatos  $candidatos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Candidatos::destroy($id);
        return redirect('candidatos');
    }
}
