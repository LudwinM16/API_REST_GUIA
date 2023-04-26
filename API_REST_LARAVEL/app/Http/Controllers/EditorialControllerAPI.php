<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class EditorialControllerAPI extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $editoriales =DB::table('editoriales')->get();
        return $editoriales;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $editorial=['codigo_editorial'=>$request->codigo_editorial,
                    'nombre_editorial'=>$request->nombre_editorial,
                    'contacto'=>$request->contacto,
                    'telefono'=>$request->telefono];
        return DB::insert('INSERT INTO editoriales VALUES(:codigo_editorial, :nombre_editorial, :contacto, :telefono)',$editorial);


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $editoriales=DB::table('editoriales')->where('codigo_editorial',$id)->first();
        return $editoriales;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $editorial=['codigo_editorial'=>$id,
                    'nombre_editorial'=>$request->nombre_editorial,
                    'contacto'=>$request->contacto,
                    'telefono'=>$request->telefono];
        return DB::update('UPDATE editoriales SET nombre_editorial=:nombre_editorial,contacto=:contacto,telefono=:telefono WHERE codigo_editorial=:codigo_editorial',$editorial);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $codigo)
    {
        return DB::delete('DELETE FROM editoriales WHERE codigo_editorial=:codigo',['codigo_editorial'=>$codigo]);
    }
}
