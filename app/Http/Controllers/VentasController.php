<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cot_condgeneral;
use App\Models\Cot_estado;
use App\Models\Cot_expira;
use App\Models\Cot_fpago;
use App\Models\Cot_moneda;
use App\Models\Cot_pie;
use App\Models\Cot_tentrega;
use App\Models\User;
use App\Models\Cliente;
use App\Models\Cotizacion;
use App\Models\Cot_items;
use App\Models\Producto;
use App\Models\Igv;
use Illuminate\Support\Facades\DB;

class VentasController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-cotizacion|crear-cotizacion|editar-cotizacion|borrar-cotizacion', ['only'=>['index']]);
        $this->middleware('permission:crear-cotizacion', ['only'=>['create', 'store']]);
        $this->middleware('permission:editar-cotizacion', ['only'=>['edit', 'update']]);
        $this->middleware('permission:borrar-cotizacion', ['only'=>['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cod = trim($request->get('cod'));
        $clie = trim($request->get('clie'));
        $ruc = trim($request->get('ruc'));
        $expira = trim($request->get('expira'));
        $est = trim($request->get('est'));
        $create = trim($request->get('create'));
        $cotizaciones = DB::table('cotizacion')
                        ->select('id_cot', 'cod_cot', 'rucc_cot', 'cliente_cot', 'estado_cot', 'asignado_cot', 'fpago_cot', 'moneda_cot', 'tentrega_cot', 'expira_cot', 'direc_cot', 'condgeneral_cot', 'pie_cot', 'fecha_cot')
                        ->Where('cod_cot', 'LIKE', '%'.$cod.'%')
                        ->Where('cliente_cot', 'LIKE', '%'.$clie.'%')
                        ->Where('rucc_cot', 'LIKE', '%'.$ruc.'%')
                        ->Where('expira_cot', 'LIKE', '%'.$expira.'%')
                        ->Where('estado_cot', 'LIKE', '%'.$est.'%')
                        ->Where('fecha_cot', 'LIKE', '%'.$create.'%')
                        ->orderby('fecha_cot', 'DESC')
                        ->simplePaginate(50);
        return view('cotizacion.listacoti', compact('cotizaciones', 'cod', 'clie', 'ruc', 'expira', 'est', 'create'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cod = "2022-";
        $num = "0000";
        $cods = [];
        $x = Cotizacion::all();
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



        $condgeneral = Cot_condgeneral::all();
        $estado = Cot_estado::all();
        $expira = Cot_expira::all();
        $fpago = Cot_fpago::all();
        $moneda = Cot_moneda::all();
        $pie = Cot_pie::all();
        $tentrega = Cot_tentrega::all();
        $usuarios = User::all();

        return view('cotizacion.cotizacion', compact('condgeneral', 'estado', 'expira', 'fpago', 'moneda', 'pie', 'tentrega', 'usuarios', 'codigo', 'coda'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cotizacion = new Cotizacion;
        $cotizacion -> cod_cot = $request->input('cod_cot');
        $cotizacion -> rucc_cot = $request->input('rucc_cot');
        $cotizacion -> num = $request->input('num');
        $cotizacion -> cliente_cot = $request->input('nom');
		$cotizacion -> contacto_cot = $request->input('contacto');
		$cotizacion -> cargo_cot = $request->input('cargo');
        $cotizacion -> estado_cot = $request->input('estado');
        $cotizacion -> asignado_cot = $request->input('asignado');
        $cotizacion -> fpago_cot = $request->input('fpago');
        $cotizacion -> moneda_cot = $request->input('moneda');
        $cotizacion -> tentrega_cot = $request->input('tentrega');
        $cotizacion -> expira_cot = $request->input('expira');
        $cotizacion -> direc_cot = $request->input('direc');
        $cotizacion -> condgeneral_cot = $request->input('condgeneral');
        $cotizacion -> pie_cot = $request->input('pie');
		$cotizacion -> impuestos = $request->input('impuestos');
		$cotizacion -> garantia = $request->input('garantia');
		$cotizacion -> condproduc = $request->input('condproduc');
		$cotizacion -> simbolo = $request->input('simbolo');
        $cotizacion->save();
        return redirect()->route('Cotizacion.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_cot)
    {
        $cotizacion = Cotizacion::findOrFail($id_cot);
        $clientes = Cliente::all();
        $tablaitem = Cot_items::all();
        $igvs = Igv::all();

        foreach ($igvs as $valor ) {
            
        }

        $subt = [];
        $subt2 = 0;
        $igv = $valor->valor_igv;

        foreach ($tablaitem as $item) {
            if ($cotizacion->cod_cot == $item->cod_cot) {
                $subt = $item->total_items;
                $subt2 += $subt;
            }
        }

        $IGV = (intval($igv)/100) * $subt2;
        $total = $IGV + $subt2;

        return view('cotizacion.detallescoti', compact('cotizacion', 'clientes', 'tablaitem', 'subt', 'subt2', 'IGV', 'total'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_cot)
    {
        $condgeneral = Cot_condgeneral::all();
        $estado = Cot_estado::all();
        $expira = Cot_expira::all();
        $fpago = Cot_fpago::all();
        $moneda = Cot_moneda::all();
        $pie = Cot_pie::all();
        $tentrega = Cot_tentrega::all();
        $usuarios = User::all();
        $cotizacion = Cotizacion::findOrFail($id_cot);
        return view('cotizacion.cotiedit', compact('cotizacion', 'condgeneral', 'estado', 'expira', 'fpago', 'moneda', 'pie', 'tentrega', 'usuarios'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_cot)
    {
        $cotizacion = Cotizacion::findOrFail($id_cot);
        $cotizacion -> garantia = $request->input('garantia');
		$cotizacion -> condproduc = $request->input('condproduc');
		$cotizacion -> direc_cot = $request->input('direc');
		$cotizacion -> estado_cot = $request->input('estado');
		$cotizacion -> fpago_cot = $request->input('fpago');
        $cotizacion -> tentrega_cot = $request->input('tentrega');
        $cotizacion -> expira_cot = $request->input('expira');
        $cotizacion -> moneda_cot = $request->input('moneda');
        $cotizacion -> simbolo = $request->input('simbolo');
        $cotizacion -> impuestos = $request->input('impuestos');
        $cotizacion->save();
        return redirect()->route('Cotizacion.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_cot)
    {
        $cotizacion = Cotizacion::findOrFail($id_cot);
        $cotizacion->delete();
        return redirect()->route('Cotizacion.index');
    }
}
