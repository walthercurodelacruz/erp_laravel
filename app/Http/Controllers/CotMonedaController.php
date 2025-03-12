<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cot_moneda;

class CotMonedaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cotmonedas = Cot_moneda::all();

        return view('cotmoneda.cotmonedacrud', compact('cotmonedas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cotmoneda.cotmonedacreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cotmoneda = new Cot_moneda;
        $cotmoneda -> nom_moneda = $request->input('nom_moneda');
        $cotmoneda->save();

        return redirect()->route('MonedaCot.index');
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
    public function edit($id_moneda)
    {
        $cotmoneda = Cot_moneda::findOrFail($id_moneda);

        return view('cotmoneda.cotmonedaedit', compact('cotmoneda'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_moneda)
    {
        $cotmoneda = Cot_moneda::findOrFail($id_moneda);
        $cotmoneda -> nom_moneda = $request->input('nom_moneda');
        $cotmoneda->save();

        return redirect()->route('MonedaCot.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_moneda)
    {
        $cotmoneda = Cot_moneda::findOrFail($id_moneda);
        $cotmoneda->delete();

        return redirect()->route('MonedaCot.index');
    }
}
