<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Almacen;

class AlmacenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $almacen = Almacen::all();
        return view('almacen.index', compact('almacen'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('almacen.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom_alm' => 'required',
        ]);

        $alma = new Almacen;
        $alma -> nom_alm = $request->input('nom_alm');
        $alma->save();
        return redirect()->route('Almacen.index');
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
    public function edit($id_alm)
    {
        $alma = ALmacen::findOrFail($id_alm);
        return view('almacen.editar', compact('alma'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_alm)
    {
        $request->validate([
            'nom_alm' => 'required',
        ]);

        $alma = ALmacen::findOrFail($id_alm);
        $alma -> nom_alm = $request->input('nom_alm');
        $alma->save();
        return redirect()->route('Almacen.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_alm)
    {
        $alma = Almacen::findOrFail($id_alm);
        $alma->delete();
        return redirect()->route('Almacen.index');
    }
}
