<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guia;
use App\Models\Ingreso;
use Illuminate\Support\Facades\DB;

class GuiaController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-guia|crear-guia|editar-guia|borrar-guia', ['only'=>['index']]);
        $this->middleware('permission:crear-guia', ['only'=>['create', 'store']]);
        $this->middleware('permission:editar-guia', ['only'=>['edit', 'update']]);
        $this->middleware('permission:borrar-guia', ['only'=>['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $ruc = trim($request->get('ruc'));
        $guias = DB::table('guia')
                        ->select('id_guia', 'cod_guia', 'rucp_guia', 'razons_guia', 'direc_guia', 'fecha_guia', 'hora_guia', 'arch_guia', 'ocp_guia', 'num_guia', 'num')
                        ->Where('rucp_guia', 'LIKE', '%'.$ruc.'%')
                        ->simplePaginate(50);


        return view('guia.index', compact('guias','ruc'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cod = "GIN";
        $num = "0000";
        $cods = [];
        $x = Guia::all();
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

        return view('guia.crear', compact('codigo', 'coda'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nomfile = $request->file('arch_guia')->getClientOriginalName();

        $guia = new Guia;
        $guia -> cod_guia = $request->input('cod');
        $guia -> rucp_guia = $request->input('rucp_guia');
        $guia -> razons_guia = $request->input('razons_guia');
        $guia -> direc_guia = $request->input('direc_guia');
        $guia -> fecha_guia = $request->input('fecha_guia');
        $guia -> hora_guia = $request->input('hora_guia');
        $guia -> arch_guia = $request->file('arch_guia')->storeAs('archivos-guias', $nomfile);
        $guia -> ocp_guia = $request->input('op_guia');
        $guia -> num_guia = $request->input('num_guia');
        $guia -> num = $request->input('num');
        $guia->save();

        return redirect()->route('Guia_In.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_guia)
    {
        $guia = Guia::findOrFail($id_guia);

        return view('guia.show', compact('guia'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_guia)
    {
        $guia = Guia::findOrFail($id_guia);

        return view('guia.editar', compact('guia'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_guia)
    {
        $nomfile = $request->file('arch_guia')->getClientOriginalName();

        $guia = Guia::findOrFail($id_guia);
        $guia -> rucp_guia = $request->input('rucp_guia');
        $guia -> razons_guia = $request->input('razons_guia');
        $guia -> direc_guia = $request->input('direc_guia');
        $guia -> fecha_guia = $request->input('fecha_guia');
        $guia -> hora_guia = $request->input('hora_guia');
        $guia -> arch_guia = $request->file('arch_guia')->storeAs('archivos-guias', $nomfile);
        $guia -> ocp_guia = $request->input('op_guia');
        $guia -> num_guia = $request->input('num_guia');
        $guia ->save();
        return redirect()->route('Guia_In.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_guia)
    {
        $guia = Guia::findOrFail($id_guia);
        $guia ->delete();

        return redirect()->route('Guia_In.index');
    }
}
