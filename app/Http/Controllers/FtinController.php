<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Occliente;
use App\Models\Ftin;
use App\Models\Ftout;
use	App\Models\Cot_moneda;
use Illuminate\Support\Facades\DB;

class FtinController extends Controller
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
        $ftins = DB::table('ftin')
                        ->select('id_ftin', 'cod_ftin', 'ruc_ftin', 'razons_ftin', 'desc_ftin', 'arch_ftin', 'cot_ftin', 'entrega_ftin', 'subtotal_ftin', 'total_ftin', 'femi_ftin', 'fcaduca_ftin', 'moneda_ftin', 'num')
                        ->Where('ruc_ftin', 'LIKE', '%'.$ruc.'%')
                        ->simplePaginate(50);

        return view('ftin.ftincrud', compact('ftins', 'ruc'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cod = "FTIN";
        $num = "0000";
        $cods = [];
        $x = Ftin::all();
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

        return view('ftin.ftincreate', compact('codigo', 'coda'));
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
            'arch_ftin' => 'max:8000',
        ]);

        $nomfile = $request->file('arch_ftin')->getClientOriginalName();

        $ftin = new Ftin;
        $ftin -> cod_ftin = $request->input('cod_ftin');
        $ftin -> ruc_ftin = $request->input('ruc_ftin');
        $ftin -> razons_ftin = $request->input('razons_ftin');
        $ftin -> desc_ftin = $request->input('desc_ftin');
        $ftin -> moneda_ftin = $request->input('moneda_ftin');
        $ftin -> arch_ftin = $request->file('arch_ftin')->storeAs('archivos-ftin', $nomfile);
        $ftin -> cot_ftin = $request->input('cot_ftin');
        $ftin -> entrega_ftin = $request->input('entrega_ftin');
        $ftin -> subtotal_ftin = $request->input('subtotal_ftin');
        $ftin -> total_ftin = $request->input('total_ftin');
        $ftin -> femi_ftin = $request->input('femi_ftin');
        $ftin -> fcaduca_ftin = $request->input('fcaduca_ftin');
        $ftin -> num = $request->input('num');
        $ftin->save();

        return redirect()->route('Ftin.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_ftin)
    {
        $ftin = Ftin::findOrFail($id_ftin);
        return view('ftin.ftindetalle', compact('ftin'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_ftin)
    {
        $ftin = Ftin::findOrFail($id_ftin);

        return view('ftin.ftinedit', compact('ftin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_ftin)
    {
        $request->validate([
            'arch_ftin' => 'max:8000',
        ]);

        /* $nomfile = $request->file('arch_ftin')->getClientOriginalName(); */

        $ftin = Ftin::findOrFail($id_ftin);
        $ftin -> ruc_ftin = $request->input('ruc_ftin');
        $ftin -> razons_ftin = $request->input('razons_ftin');
        $ftin -> desc_ftin = $request->input('desc_ftin');
        $ftin -> moneda_ftin = $request->input('moneda_ftin');
        /* $ftin -> arch_ftin = $request->file('arch_ftin')->storeAs('archivos', $nomfile); */
        $ftin -> cot_ftin = $request->input('cot_ftin');
        $ftin -> entrega_ftin = $request->input('entrega_ftin');
        $ftin -> subtotal_ftin = $request->input('subtotal_ftin');
        $ftin -> total_ftin = $request->input('total_ftin');
        $ftin -> femi_ftin = $request->input('femi_ftin');
        $ftin -> fcaduca_ftin = $request->input('fcaduca_ftin');
        $ftin->save();

        return redirect()->route('Ftin.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_ftin)
    {
        $ftin = Ftin::findOrFail($id_ftin);
        $ftin->delete();

        return redirect()->route('Ftin.index');
    }
}
