<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cot_fpago;

class CotFPagoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cotfpagos = Cot_fpago::all();

        return view('cotfpago.cotfpagocrud', compact('cotfpagos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cotfpago.cotfpagocreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cotfpago = new Cot_fpago;
        $cotfpago -> nom_fpago = $request->input('nom_fpago');
        $cotfpago->save();

        return redirect()->route('FPagoCot.index');
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
    public function edit($id_fpago)
    {
        $cotfpago = Cot_fpago::findOrFail($id_fpago);

        return view('cotfpago.cotfpagoedit', compact('cotfpago'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_fpago)
    {
        $cotfpago = Cot_fpago::findOrFail($id_fpago);
        $cotfpago -> nom_fpago = $request->input('nom_fpago');
        $cotfpago->save();

        return redirect()->route('FPagoCot.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_fpago)
    {
        $cotfpago = Cot_fpago::findOrFail($id_fpago);
        $cotfpago->delete();

        return redirect()->route('FPagoCot.index');
    }
}
