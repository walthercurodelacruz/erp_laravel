<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Oc_proveedor;
use App\Models\Estado_ocp;
use App\Models\Compras;
use App\Models\Cot_moneda;
use App\Models\Cot_tentrega;
use App\Models\Ocp_items;
use App\Models\Igv;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class OcProveedorController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-ocp|crear-ocp|editar-ocp|borrar-ocp', ['only'=>['index']]);
        $this->middleware('permission:crear-ocp', ['only'=>['create', 'store']]);
        $this->middleware('permission:editar-ocp', ['only'=>['edit', 'update']]);
        $this->middleware('permission:borrar-ocp', ['only'=>['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cod = trim($request->get('cod'));
        $ruc = trim($request->get('ruc'));
        $prov = trim($request->get('prov'));
        $cot = trim($request->get('cot'));
        $ent = trim($request->get('ent'));
        $est = trim($request->get('est'));
        $respon = trim($request->get('respon'));
        $ocps = DB::table('oc_proveedor')
                        ->select('id_ocp', 'cod_ocp', 'cod_cot', 'ruc_prov', 'estado_ocp', 'respon_ocp', 'mon_ocp', 'entrega_ocp', 'razons_ocp', 'contacto_ocp', 'direc_ocp', 'fecha_ocp', 'num')
                        ->Where('cod_ocp', 'LIKE', '%'.$cod.'%')
                        ->Where('ruc_prov', 'LIKE', '%'.$ruc.'%')
                        ->Where('razons_ocp', 'LIKE', '%'.$prov.'%')
                        ->Where('cod_cot', 'LIKE', '%'.$cot.'%')
                        ->Where('entrega_ocp', 'LIKE', '%'.$ent.'%')
                        ->Where('estado_ocp', 'LIKE', '%'.$est.'%')
                        ->Where('respon_ocp', 'LIKE', '%'.$respon.'%')
                        ->simplePaginate(50);

        return view('ocproveedor.index', compact('ocps', 'cod', 'ruc', 'prov', 'cot', 'ent', 'est', 'respon'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cod = "OCP";
        $num = "0000";
        $cods = [];
        $x = Oc_proveedor::all();
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

        $estados = Estado_ocp::all(); //Esta linea y las siguientes colocan los combobox en el formulario
        $moneda = Cot_moneda::all();
        $entrega = Cot_tentrega::all();
		$usuarios = User::all();

        return view('ocproveedor.crear', compact('codigo', 'coda', 'estados', 'moneda', 'entrega','usuarios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ocp = new Oc_proveedor;
        $ocp -> cod_ocp = $request->input('cod');
        $ocp -> cod_cot = $request->input('cod_cot');
        $ocp -> ruc_prov = $request->input('ruc_prov');
        $ocp -> estado_ocp = $request->input('estado_ocp');
        $ocp -> respon_ocp = $request->input('respon_ocp');
        $ocp -> mon_ocp = $request->input('mon_ocp');
        $ocp -> entrega_ocp = $request->input('entrega_ocp');
        $ocp -> razons_ocp = $request->input('razons_ocp');
        $ocp -> contacto_ocp = $request->input('contacto_ocp');
        $ocp -> direc_ocp = $request->input('direc_ocp');
        $ocp -> num = $request->input('num');
        $ocp->save();

        return redirect()->route('OcProveedor.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_ocp)
    {
        $ocp = Oc_Proveedor::findOrFail($id_ocp);
        $items = Ocp_items::all();
        $igvs = Igv::all();

        foreach ($igvs as $valor ) {
            
        }

        $subt = [];
        $subt2 = 0;
        $igv = $valor->valor_igv;

        foreach ($items as $item) {
            if ($item->cod_ocp == $ocp->cod_ocp) {
                $subt = $item->total_ocp;
                $subt2 += $subt;
            }
        }

        $IGV = (intval($igv)/100) * $subt2;
        $total = $IGV + $subt2;

        return view('ocproveedor.show', compact('ocp', 'items', 'subt', 'subt2', 'IGV', 'total'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_ocp)
    {
        $ocp = Oc_Proveedor::findOrFail($id_ocp);
        $estados = Estado_ocp::all();
        $moneda = Cot_moneda::all();
        $entrega = Cot_tentrega::all();
		$usuarios = User::all();

        return view('ocproveedor.editar', compact('ocp', 'estados', 'moneda', 'entrega','usuarios'));
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
        $ocp = Oc_Proveedor::findOrFail($id_ocp);
        $ocp -> cod_cot = $request->input('cod_cot');
        $ocp -> ruc_prov = $request->input('ruc_prov');
        $ocp -> estado_ocp = $request->input('estado_ocp');
        $ocp -> respon_ocp = $request->input('respon_ocp');
        $ocp -> mon_ocp = $request->input('mon_ocp');
        $ocp -> entrega_ocp = $request->input('entrega_ocp');
        $ocp -> razons_ocp = $request->input('razons_ocp');
        $ocp -> contacto_ocp = $request->input('contacto_ocp');
        $ocp -> direc_ocp = $request->input('direc_ocp');
        $ocp->save();

        return redirect()->route('OcProveedor.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_ocp)
    {
        $ocp = Oc_Proveedor::findOrFail($id_ocp);
        $ocp->delete();

        return redirect()->route('OcProveedor.index');
    }
}
