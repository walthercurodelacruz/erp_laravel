<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cot_expira;

class CotExpiraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cotexpiras = Cot_expira::all();

        return view('cotexpira.cotexpiracrud', compact('cotexpiras'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cotexpira.cotexpiracreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cotexpira = new Cot_expira;
        $cotexpira -> nom_expira = $request->input('nom_expira');
        $cotexpira->save();

        return redirect()->route('ExpiraCot.index');
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
    public function edit($id_expira)
    {
        $cotexpira = Cot_expira::findOrFail($id_expira);

        return view('cotexpira.cotexpiraedit', compact('cotexpira'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_expira)
    {
        $cotexpira = Cot_expira::findOrFail($id_expira);
        $cotexpira -> nom_expira = $request->input('nom_expira');
        $cotexpira->save();

        return redirect()->route('ExpiraCot.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_expira)
    {
        $cotexpira = Cot_expira::findOrFail($id_expira);
        $cotexpira->delete();

        return redirect()->route('ExpiraCot.index');
    }
}
