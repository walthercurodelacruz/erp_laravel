<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cot_items;
use App\Models\Cotizacion;
use App\Models\Igv;

class ItemsController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-itemscot|crear-itemscot|editar-itemscot|borrar-itemscot', ['only'=>['index']]);
        $this->middleware('permission:crear-itemscot', ['only'=>['registrar', 'guardar']]);
        $this->middleware('permission:editar-itemscot', ['only'=>['edit', 'update']]);
        $this->middleware('permission:borrar-itemscot', ['only'=>['eliminar']]);
    }

    public function registrar($id_cot)
    {
    	$cod = Cotizacion::findOrFail($id_cot);
    	$cotizacion = Cotizacion::all();
        $item = Cot_items::all();
        $igvs = Igv::all();

        foreach ($igvs as $igv) {
            # code...
        }


        return view('cotizacion.itemscreate', compact('cotizacion', 'cod', 'item', 'igv'));
    }

    public function guardar(Request $request, $id_cot)
    {
    	$cod = Cotizacion::findOrFail($id_cot);
    	$items = new Cot_items;
        $items -> cod_cot = $request->input('cod_cot');
        $items -> detalle_items = $request->input('item');
        $items -> nota_items = $request->input('nota');
        $items -> cant_items = $request->input('cant');
        $items -> precio_items = $request->input('prec');
        $items -> total_items = $request->input('resultado');
		$items -> numitem = $request->input('numitem');
        $items->save();
        $item = Cot_items::all();
        $igvs = Igv::all();
        foreach ($igvs as $igv) {
            # code...
        }

        return view('cotizacion.itemscreate', compact('cod', 'item', 'igv'));
    }

    public function eliminar($id_items, $id_cot)
    {
        $cod = Cotizacion::findOrFail($id_cot);
        $items = Cot_items::findOrFail($id_items);
        $items->delete();
        $item = Cot_items::all();
        $igvs = Igv::all();
        foreach ($igvs as $igv) {
            # code...
        }
        
        return view('cotizacion.itemscreate', compact('cod', 'item', 'igv'));
    }
}
