<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Oc_proveedor;
use App\Models\Ocp_items;
use App\Models\Igv;
use App\Models\Compras;

class OcpItemsController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-itemsocp|crear-itemsocp|editar-itemsocp|borrar-itemsocp', ['only'=>['index']]);
        $this->middleware('permission:crear-itemsocp', ['only'=>['registrarocp', 'guardarocp']]);
        $this->middleware('permission:editar-itemsocp', ['only'=>['edit', 'update']]);
        $this->middleware('permission:borrar-itemsocp', ['only'=>['eliminarocp']]);
    }

    public function registrarocp($id_ocp)
    {
    	$cod = Oc_proveedor::findOrFail($id_ocp);
    	$ocps = Oc_proveedor::all();
        $item = Ocp_items::all();
        $igvs = Igv::all();

        foreach ($igvs as $igv) {
            # code...
        }


        return view('itemsocp.crear', compact('ocps', 'cod', 'item', 'igv'));
    }

    public function guardarocp(Request $request, $id_ocp)
    {
        if ($request->input('id_compras') == "")
        {
            $cod = Oc_proveedor::findOrFail($id_ocp);
            $items = new Ocp_items;
            $items -> cod_op = $request->input('cod_op');
            $items -> cod_ocp = $request->input('cod_ocp');
            $items -> item_ocp = $request->input('item_ocp');
            $items -> nota_ocp = $request->input('nota_ocp');
            $items -> cant_ocp = $request->input('cant_ocp');
            $items -> costo_ocp = $request->input('costo_ocp');
            $items -> total_ocp = $request->input('total_ocp');
            $items->save();
        }else
        {
            $cod = Oc_proveedor::findOrFail($id_ocp);
            $items = new Ocp_items;
            $items -> cod_op = $request->input('cod_op');
            $items -> cod_ocp = $request->input('cod_ocp');
            $items -> item_ocp = $request->input('item_ocp');
            $items -> nota_ocp = $request->input('nota_ocp');
            $items -> cant_ocp = $request->input('cant_ocp');
            $items -> costo_ocp = $request->input('costo_ocp');
            $items -> total_ocp = $request->input('total_ocp');
            $items->save();

            $compras = Compras::findOrFail($request->input('id_compras'));
            $compras -> prov_compras = $request->input('prov_compras');
            $compras -> costo_compras = $request->input('costo_ocp');
            $compras -> mon_compras = $request->input('mon_compras');
            $compras -> cot_prov_compras = $request->input('cot_prov_compras');
            $compras -> ocp_compras = $request->input('ocp_compras');
            $compras->save();
        }

    	


        $item = Ocp_items::all();
        $igvs = Igv::all();
        foreach ($igvs as $igv) {
            # code...
        }

        return view('itemsocp.crear', compact('cod', 'item', 'igv'));
    }

    public function eliminarocp($id_ocpi, $id_ocp)
    {
        $cod = Oc_proveedor::findOrFail($id_ocp);
        $items = Ocp_items::findOrFail($id_ocpi);
        $items->delete();
        $item = Ocp_items::all();
        $igvs = Igv::all();
        foreach ($igvs as $igv) {
            # code...
        }
        
        return view('itemsocp.crear', compact('cod', 'item', 'igv'));
    }
}
