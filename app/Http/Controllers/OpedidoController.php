<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Opedido;
use App\Models\items_op;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class OpedidoController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-op|crear-op|editar-op|borrar-op', ['only'=>['index']]);
        $this->middleware('permission:crear-op', ['only'=>['create', 'store']]);
        $this->middleware('permission:editar-op', ['only'=>['edit', 'update']]);
        $this->middleware('permission:borrar-op', ['only'=>['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $ruc = trim($request->get('ruc'));
        $opedidos = DB::table('op_logistica')
                        ->select('id_op', 'cod_op', 'ot_op', 'rucc_op', 'cliente_op', 'estado_op', 'asig_op', 'entrega_op', 'direc_op', 'creacionot_op', 'update_op', 'tecnico_op', 'detalle_op', 'requiere_op', 'num')
                        ->Where('rucc_op', 'LIKE', '%'.$ruc.'%')
                        ->simplePaginate(50);

        return view('opedido.opedidocrud', compact('opedidos', 'ruc'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_op)
    {
        $opedido = Opedido::findOrFail($id_op);
        $item = items_op::all();
        
        return view('opedido.opedidoshow', compact('opedido', 'item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_op)
    {
        $opedido = Opedido::findOrFail($id_op);
        $items = items_op::all();
		$usuarios = User::all();

        return view('opedido.opedidoedit', compact('opedido', 'items','usuarios'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_op)
    {
        $opedido = Opedido::findOrFail($id_op);
        $opedido->delete();

        return redirect()->route('Opedido.index');
    }
}
