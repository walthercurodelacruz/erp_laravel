<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fabricante;

class FabricanteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fabricantes = Fabricante::all();

        return view('fabricante.index', compact('fabricantes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('fabricante.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fabricante = new Fabricante;
        $fabricante -> nom_fabricante = $request->input('nom_fabricante');
        $fabricante->save();

        return redirect()->route('Fabricante.index');
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
    public function edit($id_fabricante)
    {
        $fabricante = Fabricante::findOrFail($id_fabricante);

        return view('fabricante.editar', compact('fabricante'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_fabricante)
    {
        $fabricante = Fabricante::findOrFail($id_fabricante);
        $fabricante -> nom_fabricante = $request->input('nom_fabricante');
        $fabricante->save();

        return redirect()->route('Fabricante.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_fabricante)
    {
        $fabricante = Fabricante::findOrFail($id_fabricante);
        $fabricante->delete();

        return redirect()->route('Fabricante.index');
    }
}
