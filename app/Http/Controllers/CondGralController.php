<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cot_condgeneral;

class CondGralController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $condgrals = Cot_condgeneral::all();

        return view('condgral.condgralcrud', compact('condgrals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('condgral.condgralcreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $condgral = new Cot_condgeneral;
        $condgral -> nom_condgeneral = $request->input('nom_condgeneral');
        $condgral->save();

        return redirect()->route('CondicionGral.index');
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
    public function edit($id_condgeneral)
    {
        $condgral = Cot_condgeneral::findOrFail($id_condgeneral);

        return view('condgral.condgraledit', compact('condgral'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_condgeneral)
    {
        $condgral = Cot_condgeneral::findOrFail($id_condgeneral);
        $condgral -> nom_condgeneral = $request->input('nom_condgeneral');
        $condgral->save();

        return redirect()->route('CondicionGral.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_condgeneral)
    {
        $condgral = Cot_condgeneral::findOrFail($id_condgeneral);
        $condgral->delete();

        return redirect()->route('CondicionGral.index');
    }
}
