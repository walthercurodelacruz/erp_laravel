<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Compras;
use Illuminate\Support\Facades\DB;

class ComprasController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-compras|crear-compras|editar-compras|borrar-compras', ['only'=>['index']]);
        $this->middleware('permission:crear-compras', ['only'=>['create', 'store']]);
        $this->middleware('permission:editar-compras', ['only'=>['edit', 'update']]);
        $this->middleware('permission:borrar-compras', ['only'=>['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $op = trim($request->get('op'));
        $item = trim($request->get('item'));
        $nota = trim($request->get('nota'));
        $cant = trim($request->get('cant'));
        $compras = DB::table('compras')
                        ->select('id_compras', 'cod_op', 'item_compras', 'nota_compras', 'cant_compras', 'prov_compras', 'mon_compras', 'costo_compras', 'cot_prov_compras', 'asig_compras', 'entrega_compras', 'respon_compras', 'ocp_compras')
                        ->Where('cod_op', 'LIKE', '%'.$op.'%')
                        ->Where('item_compras', 'LIKE', '%'.$item.'%')
                        ->Where('nota_compras', 'LIKE', '%'.$nota.'%')
                        ->Where('cant_compras', 'LIKE', '%'.$cant.'%')
                        ->simplePaginate(50);

        return view('compras.comprascrud', compact('compras', 'op', 'item', 'nota', 'cant'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $compras = Compras::all();
        $o_p = [];

        foreach ($compras as $comp) {
            $o_p[] = $comp->cod_op;
        }

        if (in_array($request->input('cod_op'), $o_p)) {
            $id_op = $request->input('id_op');

            return redirect()->route('Opedido.edit', $id_op);
        }else{
            $contar = count($request->input('item_eval'));

            for ($i=0; $i < $contar; $i++) {
                $compra = new Compras;
                $compra -> cod_op = $request->input('cod_op');
                $compra -> asig_compras = $request->input('asig_eval');
                $compra -> entrega_compras = $request->input('entrega_eval');
                $compra -> respon_compras = $request->input('tecnico_eval');
                $compra -> item_compras = $request->input('item_eval.'.$i.'');
                $compra -> nota_compras = $request->input('nota_eval.'.$i.'');
                $compra -> cant_compras = $request->input('cant_eval.'.$i.'');
                $compra->save();
            }

            return redirect()->route('Compras.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_compras)
    {
        $compra = Compras::findOrFail($id_compras);

        return view('compras.comprasshow', compact('compra'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_compras)
    {
        $compra = Compras::findOrFail($id_compras);

        return view('compras.comprasedit', compact('compra'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_compras)
    {
        $compra = Compras::findOrFail($id_compras);
        $compra -> prov_compras = $request->input('prov_compras');
        $compra -> mon_compras = $request->input('mon_compras');
        $compra -> costo_compras = $request->input('costo_compras');
        $compra -> cot_prov_compras = $request->input('cot_prov_compras');
        $compra->save();

        return redirect()->route('Compras.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
