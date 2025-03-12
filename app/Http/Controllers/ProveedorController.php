<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proveedor;
use App\Models\Area;
use App\Models\Estado;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class ProveedorController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-prov|crear-prov|editar-prov|borrar-prov', ['only'=>['index']]);
        $this->middleware('permission:crear-prov', ['only'=>['create', 'store']]);
        $this->middleware('permission:editar-prov', ['only'=>['edit', 'update']]);
        $this->middleware('permission:borrar-prov', ['only'=>['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cod = trim($request ->get('cod'));
        $ruc = trim($request ->get('ruc'));
        $razon = trim($request ->get('razon'));
        $contact = trim($request ->get('contact'));
        $cel = trim($request ->get('cel'));
        $mail = trim($request ->get('mail'));
        $est = trim($request ->get('est'));
        $proveedores = DB::table('proveedores')
                        ->select('id_prov', 'cod_prov', 'ruc_prov', 'razons_prov', 'direc_prov', 'contacto_prov', 'cel1_prov', 'cel2_prov', 'email1_prov', 'email2_prov', 'pagweb_prov', 'estado_prov')
                        ->Where('cod_prov', 'LIKE', '%'.$cod.'%')
                        ->Where('ruc_prov', 'LIKE', '%'.$ruc.'%')
                        ->Where('razons_prov', 'LIKE', '%'.$razon.'%')
                        ->Where('contacto_prov', 'LIKE', '%'.$contact.'%')
                        ->Where('cel1_prov', 'LIKE', '%'.$cel.'%')
                        ->Where('email1_prov', 'LIKE', '%'.$mail.'%')
                        ->Where('estado_prov', 'LIKE', '%'.$est.'%')
                        ->simplePaginate(8);

        return view('proveedores.proveedorcrud', compact('proveedores', 'cod', 'ruc', 'razon', 'contact', 'cel', 'mail', 'est'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cod = "PROV";
        $num = "0000";
        $cods = [];
        $x = Proveedor::all();
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

        $areas = Area::all();
        $usuarios = User::all();
        $estado = Estado::all();
        return view('proveedores.proveedorcreate', compact('usuarios', 'estado', 'codigo', 'areas', 'coda'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $proveedor = new Proveedor;
        $proveedor -> cod_prov = $request->input('cod');
        $proveedor -> num = $request->input('num');
        $proveedor -> ruc_prov = $request->input('ruc');
        $proveedor -> razons_prov = $request->input('razon');
        $proveedor -> direc_prov = $request->input('direc');
        $proveedor -> contacto_prov = $request->input('contact');
        $proveedor -> cel1_prov = $request->input('cel1');
        $proveedor -> cel2_prov = $request->input('cel2');
        $proveedor -> email1_prov = $request->input('email1');
        $proveedor -> email2_prov = $request->input('email2');
        $proveedor -> pagweb_prov = $request->input('web');
        $proveedor -> estado_prov = $request->input('estado');
        $proveedor->save();
        return redirect()->route('Proveedor.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_prov)
    {
        $proveedor = Proveedor::findOrFail($id_prov);
        return view('proveedores.proveedordetalle', compact('proveedor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_prov)
    {
        $usuarios = User::all();
        $estado = Estado::all();
        $proveedor = Proveedor::findOrFail($id_prov);
        return view('proveedores.proveedoredit', compact('proveedor', 'usuarios', 'estado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_prov)
    {
        $proveedor = Proveedor::findOrFail($id_prov);
        $proveedor -> ruc_prov = $request->input('ruc');
        $proveedor -> razons_prov = $request->input('razon');
        $proveedor -> direc_prov = $request->input('direc');
        $proveedor -> contacto_prov = $request->input('contact');
        $proveedor -> cel1_prov = $request->input('cel1');
        $proveedor -> cel2_prov = $request->input('cel2');
        $proveedor -> email1_prov = $request->input('email1');
        $proveedor -> email2_prov = $request->input('email2');
        $proveedor -> pagweb_prov = $request->input('web');
        $proveedor -> estado_prov = $request->input('estado');
        $proveedor->save();
        return redirect()->route('Proveedor.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_prov)
    {
        $proveedor = Proveedor::findOrFail($id_prov);
        $proveedor->delete();
        return redirect()->route('Proveedor.index');
    }
}
