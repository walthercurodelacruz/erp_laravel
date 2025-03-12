<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cot_estado;

class CotEstadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cotestados = Cot_estado::all();

        return view('cotestado.cotestadocrud', compact('cotestados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cotestado.cotestadocreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cotestado = new Cot_estado;
        $cotestado -> nom_estado = $request->input('nom_estado');
        $cotestado->save();

        return redirect()->route('EstadoCot.index');
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
    public function edit($id_estado)
    {
        $cotestado = Cot_estado::findOrFail($id_estado);

        return view('cotestado.cotestadoedit', compact('cotestado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_estado)
    {
        $cotestado = Cot_estado::findOrFail($id_estado);
        $cotestado -> nom_estado = $request->input('nom_estado');
        $cotestado->save();

        return redirect()->route('EstadoCot.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_estado)
    {
        $cotestado = Cot_estado::findOrFail($id_estado);
        $cotestado->delete();

        return redirect()->route('EstadoCot.index');
    }
}
