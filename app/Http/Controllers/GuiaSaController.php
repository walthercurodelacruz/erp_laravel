<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guia_sa;
use Illuminate\Support\Facades\DB;

class GuiaSaController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-guia-sa|crear-guia-sa|editar-guia-sa|borrar-guia-sa', ['only'=>['index']]);
        $this->middleware('permission:crear-guia-sa', ['only'=>['create', 'store']]);
        $this->middleware('permission:editar-guia-sa', ['only'=>['edit', 'update']]);
        $this->middleware('permission:borrar-guia-sa', ['only'=>['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $ruc = trim($request->get('ruc'));
        $guias = DB::table('guia_sa')
                        ->select('id_guia', 'cod_guia', 'rucc_guia', 'razons_guia', 'direc_guia', 'fecha_guia', 'hora_guia', 'arch_guia', 'occ_guia', 'num_guia', 'num')
                        ->Where('rucc_guia', 'LIKE', '%'.$ruc.'%')
                        ->simplePaginate(50);

        return view('guia_sa.index', compact('guias','ruc'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cod = "GSA";
        $num = "0000";
        $cods = [];
        $x = Guia_sa::all();
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

        return view('guia_sa.crear', compact('codigo', 'coda'));
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

        $guia = new Guia_sa;
        $guia -> cod_guia = $request->input('cod');
        $guia -> rucc_guia = $request->input('rucc_guia');
        $guia -> razons_guia = $request->input('razons_guia');
        $guia -> direc_guia = $request->input('direc_guia');
        $guia -> fecha_guia = $request->input('fecha_guia');
        $guia -> hora_guia = $request->input('hora_guia');
        $guia -> arch_guia = $request->file('arch_guia')->storeAs('archivos-gsal', $nomfile);
        $guia -> occ_guia = $request->input('occ_guia');
        $guia -> num_guia = $request->input('num_guia');
        $guia -> num = $request->input('num');
        $guia->save();

        return redirect()->route('Guia_Sa.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_guia)
    {
        $guia = Guia_sa::findOrFail($id_guia);

        return view('guia_sa.show', compact('guia'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_guia)
    {
        $guia = Guia_sa::findOrFail($id_guia);

        return view('guia_sa.editar', compact('guia'));
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

        $guia = Guia_sa::findOrFail($id_guia);
        $guia -> rucc_guia = $request->input('rucc_guia');
        $guia -> razons_guia = $request->input('razons_guia');
        $guia -> direc_guia = $request->input('direc_guia');
        $guia -> fecha_guia = $request->input('fecha_guia');
        $guia -> hora_guia = $request->input('hora_guia');
        $guia -> arch_guia = $request->file('arch_guia')->storeAs('archivos-guias', $nomfile);
        $guia -> occ_guia = $request->input('occ_guia');
        $guia -> num_guia = $request->input('num_guia');
        $guia ->save();
        return redirect()->route('Guia_Sa.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_guia)
    {
        $guia = Guia_sa::findOrFail($id_guia);
        $guia ->delete();

        return redirect()->route('Guia_Sa.index');
    }
}
