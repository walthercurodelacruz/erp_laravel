<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Unidad_m;

class UnidadMController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medidas = Unidad_m::all();

        return view('unidadm.index', compact('medidas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('unidadm.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $medida = new Unidad_m;
        $medida -> nom_um = $request->input('nom_um');
        $medida->save();

        return redirect()->route('Unidad_M.index');
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
    public function edit($id_um)
    {
        $medida = Unidad_m::findOrFail($id_um);

        return view('unidadm.editar', compact('medida'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_um)
    {
        $medida = Unidad_m::findOrFail($id_um);
        $medida -> nom_um = $request->input('nom_um');
        $medida->save();

        return redirect()->route('Unidad_M.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_um)
    {
        $medida = Unidad_m::findOrFail($id_um);
        $medida->delete();

        return redirect()->route('Unidad_M.index');
    }
}
