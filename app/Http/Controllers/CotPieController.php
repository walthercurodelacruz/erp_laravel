<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cot_pie;

class CotPieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cotpies = Cot_pie::all();

        return view('cotpie.cotpiecrud', compact('cotpies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cotpie.cotpiecreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cotpie = new Cot_pie;
        $cotpie -> nom_pie = $request->input('nom_pie');
        $cotpie->save();

        return redirect()->route('PieCot.index');
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
    public function edit($id_pie)
    {
        $cotpie = Cot_pie::findOrFail($id_pie);

        return view('cotpie.cotpieedit', compact('cotpie'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_pie)
    {
        $cotpie = Cot_pie::findOrFail($id_pie);
        $cotpie -> nom_pie = $request->input('nom_pie');
        $cotpie->save();

        return redirect()->route('PieCot.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_pie)
    {
        $cotpie = Cot_pie::findOrFail($id_pie);
        $cotpie->delete();

        return redirect()->route('PieCot.index');
    }
}
