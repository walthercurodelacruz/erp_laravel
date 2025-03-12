<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Proveedor;
use App\Models\User;
use App\Models\Producto;
use App\Models\Cotizacion;
use App\Models\Cot_items;
use App\Models\Oc_proveedor;
use App\Models\Ocp_items;
use App\Models\Igv;
use App\Models\Evaluaciones;
use App\Models\ftin;
use App\Models\ftout;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Models\FichaTecnica;
use PDF;

class GeneralController extends Controller
{
    public function exportarpdf($id_cot)
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
        
        $text = "Cotización-";
        $textcod = $cotizacion->cod_cot;
        $file = $text.$textcod.".pdf";

        $pdf = PDF::loadView('cotizacion.detallescoti', compact('cotizacion', 'clientes', 'tablaitem', 'subt2', 'IGV', 'total'));

        return $pdf->download($file);
    }

    public function pdfocp($id_ocp)
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

        $text = "Detalles-";
        $textcod = $ocp->cod_ocp;
        $file = $text.$textcod.".pdf";

        $pdf = PDF::loadView('ocproveedor.show', compact('ocp', 'items', 'subt', 'subt2', 'IGV', 'total'));
        return $pdf->download($file);
    }


    public function dashboard()
    {
    	return view('dashboard');
    }

    public function stockdetalles()
    {
        return view('stock.detalles');
    }

    public function downloadfile(Request $request)
    {
        $file = $request->input('archivo');

        return Storage::download($file);
    }
    
}
