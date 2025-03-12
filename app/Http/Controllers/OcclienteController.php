<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Occliente;
use Illuminate\Support\Facades\DB;

class OcclienteController extends Controller
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
        $occlientes = DB::table('oc_cliente')
                        ->select('id_occliente', 'cod_occliente', 'ruc_occliente', 'razons_occliente', 'desc_occliente', 'arch_occliente', 'cot_occliente', 'entrega_occliente', 'num')
                        ->Where('ruc_occliente', 'LIKE', '%'.$ruc.'%')
                        ->simplePaginate(50);

        return view('occliente.occlientecrud', compact('occlientes', 'ruc'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cod = "OCC";
        $num = "0000";
        $cods = [];
        $x = Occliente::all();
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

        return view('occliente.occlientecreate', compact('codigo', 'coda'));
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
            'arch_occ' => 'max:8000',
        ]);

        $nomfile = $request->file('arch_occ')->getClientOriginalName();

        $occliente = new Occliente;
        $occliente -> cod_occliente = $request->input('cod_occ');
        $occliente -> ruc_occliente = $request->input('ruc_occ');
        $occliente -> razons_occliente = $request->input('razons_occ');
        $occliente -> desc_occliente = $request->input('desc_occ');
        $occliente -> arch_occliente = $request->file('arch_occ')->storeAs('archivos-occ', $nomfile);
        $occliente -> cot_occliente = $request->input('cot_occ');
        $occliente -> entrega_occliente = $request->input('entrega_occ');
        $occliente -> num = $request->input('num');
        $occliente->save();

        return redirect()->route('Occliente.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_occliente)
    {
        $occliente = Occliente::findOrFail($id_occliente);
        return view('occliente.occlientedetalle', compact('occliente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_occliente)
    {
        $occliente = Occliente::findOrFail($id_occliente);

        return view('occliente.occlienteedit', compact('occliente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_occliente)
    {
        $request->validate([
            'arch_occ' => 'max:8000',
        ]);

        $nomfile = $request->file('arch_occ')->getClientOriginalName();

        $occliente = Occliente::findOrFail($id_occliente);
        $occliente -> ruc_occliente = $request->input('ruc_occ');
        $occliente -> razons_occliente = $request->input('razons_occ');
        $occliente -> desc_occliente = $request->input('desc_occ');
        $occliente -> arch_occliente = $request->file('arch_occ')->storeAs('archivos', $nomfile);
        $occliente -> cot_occliente = $request->input('cot_occ');
        $occliente -> entrega_occliente = $request->input('entrega_occ');
        $occliente->save();

        return redirect()->route('Occliente.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_occliente)
    {
        $occliente = Occliente::findOrFail($id_occliente);
        $occliente->delete();

        return redirect()->route('Occliente.index');
    }
}
