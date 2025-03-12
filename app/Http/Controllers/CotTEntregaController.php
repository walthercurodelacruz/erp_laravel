<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cot_tentrega;

class CotTEntregaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cottentregas = Cot_tentrega::all();

        return view('cottentrega.cottentregacrud', compact('cottentregas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cottentrega.cottentregacreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cottentrega = new Cot_tentrega;
        $cottentrega -> nom_tentrega = $request->input('nom_tentrega');
        $cottentrega->save();

        return redirect()->route('TEntregaCot.index');
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
    public function edit($id_tentrega)
    {
        $cottentrega = Cot_tentrega::findOrFail($id_tentrega);

        return view('cottentrega.cottentregaedit', compact('cottentrega'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_tentrega)
    {
        $cottentrega = Cot_tentrega::findOrFail($id_tentrega);
        $cottentrega -> nom_tentrega = $request->input('nom_tentrega');
        $cottentrega->save();

        return redirect()->route('TEntregaCot.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_tentrega)
    {
        $cottentrega = Cot_tentrega::findOrFail($id_tentrega);
        $cottentrega->delete();

        return redirect()->route('TEntregaCot.index');
    }
}
