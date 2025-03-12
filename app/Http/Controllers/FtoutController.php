<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Occliente;
use App\Models\Ftin;
use App\Models\Ftout;
use Illuminate\Support\Facades\DB;

class FtoutController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-occ|crear-occ|editar-occ|borrar-occ', ['only'=>['index']]);
        $this->middleware('permission:crear-occ', ['only'=>['create', 'store']]);
        $this->middleware('permission:editar-occ', ['only'=>['edit', 'update']]);
        $this->middleware('permission:borrar-occ', ['only'=>['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $ruc = trim($request->get('ruc'));
        $ftouts = DB::table('ftout')
                        ->select('id_ftout', 'cod_ftout', 'ruc_ftout', 'razons_ftout', 'desc_ftout', 'arch_ftout', 'cot_ftout', 'entrega_ftout', 'subtotal_ftout', 'total_ftout', 'femi_ftout', 'fcaduca_ftout', 'moneda_ftout', 'num')
                        ->Where('ruc_ftout', 'LIKE', '%'.$ruc.'%')
                        ->simplePaginate(50);

        return view('ftout.ftoutcrud', compact('ftouts', 'ruc'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cod = "FTOUT";
        $num = "0000";
        $cods = [];
        $x = Ftout::all();
        foreach ($x as $a) {
            $cods[] = $a->num;
        }

        $co =  end($cods);
        $coda = $co + 1;
        $codx = strval($coda);
        if ($co > 8){
            $num = "000";
        }elseif ($co > 98){
            $num = "00";
        }elseif ($co > 998){
            $num = "0";
        }
        $texto = $cod.$num;
        $codigo = $texto.$codx;

        return view('ftout.ftoutcreate', compact('codigo', 'coda'));
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
            'arch_ftout' => 'max:8000',
        ]);

        $nomfile = $request->file('arch_ftout')->getClientOriginalName();

        $ftout = new Ftout;
        $ftout -> cod_ftout = $request->input('cod_ftout');
        $ftout -> ruc_ftout = $request->input('ruc_ftout');
        $ftout -> razons_ftout = $request->input('razons_ftout');
        $ftout -> desc_ftout = $request->input('desc_ftout');
        $ftout -> moneda_ftout = $request->input('moneda_ftout');
        $ftout -> arch_ftout = $request->file('arch_ftout')->storeAs('archivos-ftout', $nomfile);
        $ftout -> cot_ftout = $request->input('cot_ftout');
        $ftout -> entrega_ftout = $request->input('entrega_ftout');
        $ftout -> subtotal_ftout = $request->input('subtotal_ftout');
        $ftout -> total_ftout = $request->input('total_ftout');
        $ftout -> femi_ftout = $request->input('femi_ftout');
        $ftout -> fcaduca_ftout = $request->input('fcaduca_ftout');
        $ftout -> num = $request->input('num');
        $ftout->save();

        return redirect()->route('Ftout.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_ftout)
    {
        $ftout = Ftout::findOrFail($id_ftout);
        return view('ftout.ftoutdetalle', compact('ftout'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_ftout)
    {
        $ftout = Ftout::findOrFail($id_ftout);

        return view('ftout.ftoutedit', compact('ftout'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_ftout)
    {
        $request->validate([
            'arch_ftout' => 'max:8000',
        ]);

        /* $nomfile = $request->file('arch_ftout')->getClientOriginalName(); */

        $ftout = Ftout::findOrFail($id_ftout);
        $ftout -> ruc_ftout = $request->input('ruc_ftout');
        $ftout -> razons_ftout = $request->input('razons_ftout');
        $ftout -> desc_ftout = $request->input('desc_ftout');
        $ftout -> moneda_ftout = $request->input('moneda_ftout');
        /* $ftout -> arch_ftout = $request->file('arch_ftout')->storeAs('archivos', $nomfile); */
        $ftout -> cot_ftout = $request->input('cot_ftout');
        $ftout -> entrega_ftout = $request->input('entrega_ftout');
        $ftout -> subtotal_ftout = $request->input('subtotal_ftout');
        $ftout -> total_ftout = $request->input('total_ftout');
        $ftout -> femi_ftout = $request->input('femi_ftout');
        $ftout -> fcaduca_ftout = $request->input('fcaduca_ftout');
        $ftout->save();

        return redirect()->route('Ftout.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_ftout)
    {
        $ftout = Ftout::findOrFail($id_ftout);
        $ftout->delete();

        return redirect()->route('Ftout.index');
    }
}
