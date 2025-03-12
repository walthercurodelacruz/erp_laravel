<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estado_ocp;

class EstadoOcpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estados = Estado_ocp::all();

        return view('estadoocp.index', compact('estados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('estadoocp.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $estado = new Estado_ocp;
        $estado -> nom_ocp = $request->input('nom_ocp');
        $estado->save();

        return redirect()->route('EstadoOcp.index');
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
    public function edit($id_ocp)
    {
        $estado = Estado_ocp::findOrFail($id_ocp);

        return view('estadoocp.editar', compact('estado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_ocp)
    {
        $estado = Estado_ocp::findOrFail($id_ocp);
        $estado -> nom_ocp = $request->input('nom_ocp');
        $estado->save();

        return redirect()->route('EstadoOcp.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_ocp)
    {
        $estado = Estado_ocp::findOrFail($id_ocp);
        $estado->delete();

        return redirect()->route('EstadoOcp.index');
    }
}
