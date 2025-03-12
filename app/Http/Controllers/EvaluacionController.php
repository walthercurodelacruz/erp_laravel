<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evaluaciones;
use App\Models\Cotizacion;
use App\Models\Cot_items;
use App\Models\Eval_items;
use App\Models\Opedido;
use App\Models\items_op;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class EvaluacionController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-evaluacion|crear-evaluacion|editar-evaluacion|borrar-evaluacion', ['only'=>['vista', 'vista_eva']]);
        $this->middleware('permission:crear-evaluacion', ['only'=>['crear', 'guardar']]);
        $this->middleware('permission:editar-evaluacion', ['only'=>['editar', 'guardarop']]);
        $this->middleware('permission:borrar-evaluacion', ['only'=>['eliminar']]);
    }

    public function vista(Request $request)
    {
        $ruc = trim($request->get('ruc'));
        $cotizaciones = DB::table('cotizacion')
                        ->select('id_cot', 'cod_cot', 'rucc_cot', 'cliente_cot', 'estado_cot', 'asignado_cot', 'fpago_cot', 'moneda_cot', 'tentrega_cot', 'expira_cot', 'direc_cot', 'condgeneral_cot', 'pie_cot', 'fecha_cot')
                        ->Where('rucc_cot', 'LIKE', '%'.$ruc.'%')
                        ->simplePaginate(50);

        return view('evaluaciones.evaluacioncrud', compact('cotizaciones', 'ruc'));
    }

    public function vista_eva(Request $request)
    {
        $ruc = trim($request->get('ruc'));
        $evaluaciones = DB::table('evaluaciones')
                        ->select('id_eval', 'cod_eval', 'cot_eval', 'rucc_eval', 'num', 'cliente_eval', 'estado_eval', 'asig_eval', 'entrega_eval', 'direc_eval', 'creacion_eval', 'update_eval', 'tecnico_eval', 'detalle_eval', 'requiere_eval')
                        ->Where('rucc_eval', 'LIKE', '%'.$ruc.'%')
                        ->simplePaginate(8);

        return view('evaluaciones.evaluacionot', compact('evaluaciones', 'ruc'));
    }

    public function crear($id_cot)
    {
    	$cod = "OT";
        $num = "0000";
        $cods = [];
        $x = Evaluaciones::all();
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

        $cotizacion = Cotizacion::findOrFail($id_cot);
        $items = Cot_items::all();

        return view('evaluaciones.evaluacioncrear', compact('cotizacion', 'items', 'codigo', 'coda'));
    }

    public function guardar(Request $request)
    {
        $evaluaciones = Evaluaciones::all();
        $eval = [];

        foreach ($evaluaciones as $evaluacion) {
            $eval[] = $evaluacion->cot_eval;
        }

        if (in_array($request->input('cot_eval'), $eval)) {
            $id_coti = $request->input('id_cot');

            return redirect()->route('Evaluaciones_crear', $id_coti);
        }else{
            $contar = count($request->input('item_eval'));

            $evaluacion = new Evaluaciones;
            $evaluacion -> cod_eval = $request->input('cod_eval');
            $evaluacion -> cot_eval = $request->input('cot_eval');
            $evaluacion -> num = $request->input('num');
            $evaluacion -> rucc_eval = $request->input('rucc_eval');
            $evaluacion -> cliente_eval = $request->input('cliente_eval');
            $evaluacion -> estado_eval = $request->input('estado_eval');
            $evaluacion -> asig_eval = $request->input('asig_eval');
            $evaluacion -> entrega_eval = $request->input('entrega_eval');
            $evaluacion -> direc_eval = $request->input('direc_eval');
            $evaluacion -> creacion_eval = $request->input('creacion_eval');
            /* $evaluacion -> update_eval = $request->input('update_eval'); */
            $evaluacion -> tecnico_eval = $request->input('tecnico_eval');
            $evaluacion -> detalle_eval = $request->input('detalle_eval');
            $evaluacion -> requiere_eval = $request->input('requiere_eval');
            $evaluacion->save();


            for ($i=0; $i < $contar; $i++) {
                $item = new Eval_items;
                $item -> cod_eval = $request->input('cod_eval');
                $item -> item_eval = $request->input('item_eval.'.$i.'');
                $item -> nota_eval = $request->input('nota_eval.'.$i.'');
                $item -> cant_eval = $request->input('cant_eval.'.$i.'');
                $item -> obser_eval = $request->input('obser_eval.'.$i.'');
                $item->save();
            }

            return redirect()->route('Evaluaciones_vista');
        }

        
    }

    public function editar($id_eval)
    {
        $cod = "OP";
        $num = "0000";
        $cods = [];
        $x = Opedido::all();
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

        $evaluacion = Evaluaciones::findOrFail($id_eval);
        $items = Eval_items::all();

        return view('evaluaciones.evaluacionedit', compact('evaluacion', 'items', 'codigo', 'coda'));
    }

    public function guardarop(Request $request)
    {
        $opedidos = Opedido::all();
        $ot = [];

        foreach ($opedidos as $op) {
            $ot[] = $op->ot_op;
        }

        if (in_array($request->input('ot_op'), $ot)) {
            $id_evalu = $request->input('id_eval');

            return redirect()->route('Evaluaciones_editar', $id_evalu);
        }else{
            $contar = count($request->input('item_eval'));

            $opedido = new Opedido;
            $opedido -> cod_op = $request->input('cod_op');
            $opedido -> ot_op = $request->input('ot_op');
            $opedido -> rucc_op  = $request->input('rucc_op');
            $opedido -> cliente_op = $request->input('cliente_op');
            $opedido -> estado_op = $request->input('estado_op');
            $opedido -> asig_op = $request->input('asig_op');
            $opedido -> entrega_op = $request->input('entrega_op');
            $opedido -> direc_op = $request->input('direc_op');
            $opedido -> creacionot_op = $request->input('update_op');
            $opedido -> tecnico_op = $request->input('tecnico_op');
            $opedido -> detalle_op = $request->input('detalle_op');
            $opedido -> requiere_op = $request->input('requiere_op');
            $opedido -> num = $request->input('num');
            $opedido->save();

            for ($i=0; $i < $contar; $i++) {
                $item = new items_op;
                $item -> cod_op = $request->input('cod_op');
                $item -> item_op = $request->input('item_eval.'.$i.'');
                $item -> nota_op = $request->input('nota_eval.'.$i.'');
                $item -> cant_op = $request->input('cant_eval.'.$i.'');
                $item -> obser_op = $request->input('obser_eval.'.$i.'');
                $item->save();
            }

            return redirect()->route('Evaluaciones_vista_eva');
        }
    }

    public function eliminar($id_eval)
    {
        $evaluacion = Evaluaciones::findOrFail($id_eval);
        $evaluacion->delete();

        return redirect()->route('Evaluaciones_vista_eva');
    }

    public function detallesot($id_eval)
    {
        $evaluacion = Evaluaciones::findOrFail($id_eval);
        $item = Eval_items::all();

        return view('evaluaciones.detallesot', compact('evaluacion', 'item'));
    }

    public function detalleseva($id_cot)
    {
        $cotizacion = Cotizacion::findOrFail($id_cot);
        $item = Cot_items::all();

        return view('evaluaciones.detalleseva', compact('cotizacion', 'item'));
    }
}
