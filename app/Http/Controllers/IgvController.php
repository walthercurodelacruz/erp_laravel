<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Igv;

class IgvController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $igv = Igv::all();

        return view('Igv.igvcrud', compact('igv'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Igv.igvcreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $igv = new Igv;
        $igv -> valor_igv = $request->input('valor_igv');
        $igv->save();

        return redirect()->route('Igv.index');
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
    public function edit($id_igv)
    {
        $igv = Igv::findOrFail($id_igv);

        return view('Igv.igvedit', compact('igv'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_igv)
    {
        $igv = Igv::findOrFail($id_igv);
        $igv -> valor_igv = $request->input('valor_igv');
        $igv->save();

        return redirect()->route('Igv.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_igv)
    {
        $igv = Igv::findOrFail($id_igv);
        $igv->delete();

        return redirect()->route('Igv.index');
    }
}
