<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use Illuminate\Http\Request;

class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return Persona::all();
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
        $persona = new Persona();
        
        $request->validate([
            'nombre'=>'required',
            'email'=>'required'
        ]);
        
        // $persona->nombre = $request->input('nombre');
        // $persona->email = $request->input('email');
        
        $persona->nombre = $request->nombre;
        $persona->email = $request->email;
        $persona->save();
        return $persona;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function show(Persona $persona)
    {
        //
        return $persona;
    }
    // public function show($id)
    // {
    //     //
    //     $persona = Persona::find($id);
    //     return $persona;
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Persona $persona)
    {
        //
        
        $request->validate([
            'nombre'=>'required',
            'email'=>'required'
        ]);
        
        // $persona->nombre = $request->input('nombre');
        // $persona->email = $request->input('email');
        
        $persona->nombre = $request->nombre;
        $persona->email = $request->email;
        $persona->update();
        return $persona;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function destroy(Persona $persona)
    {
        //
        if(is_null($persona)){
            return response()->json('No se puede realizar la peticíon ,el archivo ya no existe 404 ');
        };
        $persona->delete();
        
        return response()->noContent();
        
    }
}