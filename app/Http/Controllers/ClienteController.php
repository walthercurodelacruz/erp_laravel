<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\User;
use App\Models\Estado;
use App\Models\Area;
use Illuminate\Support\Facades\DB;

class ClienteController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-cliente|crear-cliente|editar-cliente|borrar-cliente', ['only'=>['index']]);
        $this->middleware('permission:crear-cliente', ['only'=>['create', 'store']]);
        $this->middleware('permission:editar-cliente', ['only'=>['edit', 'update']]);
        $this->middleware('permission:borrar-cliente', ['only'=>['destroy']]);
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
        $clientes = DB::table('cliente')
                        ->select('id_clie', 'cod_clie', 'ruc_clie', 'razons_clie', 'direc_clie', 'contacto_clie', 'tel1_clie', 'tel2_clie', 'cel1_clie', 'cel2_clie', 'email1_clie', 'email2_clie', 'pagweb_clie', 'area', 'estado', 'asignado')
                        ->Where('cod_clie', 'LIKE', '%'.$cod.'%')
                        ->Where('ruc_clie', 'LIKE', '%'.$ruc.'%')
                        ->Where('razons_clie', 'LIKE', '%'.$razon.'%')
                        ->Where('contacto_clie', 'LIKE', '%'.$contact.'%')
                        ->Where('cel1_clie', 'LIKE', '%'.$cel.'%')
                        ->Where('email1_clie', 'LIKE', '%'.$mail.'%')
                        ->Where('estado', 'LIKE', '%'.$est.'%')
                        ->simplePaginate(50);

        return view('clientes.clientecrud', compact('clientes', 'cod', 'ruc', 'razon', 'contact', 'cel', 'mail', 'est'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cod = "CLI";
        $num = "0000";
        $cods = [];
        $x = Cliente::all();
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
        return view('clientes.clientecreate', compact('usuarios', 'estado', 'codigo', 'areas', 'coda'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cliente = new Cliente;
        $cliente -> cod_clie = $request->input('cod');
        $cliente -> num = $request->input('num');
        $cliente -> ruc_clie = $request->input('ruc');
        $cliente -> razons_clie = $request->input('razon');
        $cliente -> direc_clie = $request->input('direc');
        $cliente -> contacto_clie = $request->input('contact');
		$cliente -> tel1_clie = $request->input('tel1');
        $cliente -> tel2_clie = $request->input('tel2');
        $cliente -> cel1_clie = $request->input('cel1');
        $cliente -> cel2_clie = $request->input('cel2');
        $cliente -> email1_clie = $request->input('email1');
        $cliente -> email2_clie = $request->input('email2');
        $cliente -> pagweb_clie = $request->input('web');
        $cliente -> area = $request->input('area');
        $cliente -> estado = $request->input('estado');
        $cliente -> asignado = $request->input('asignado');
        $cliente->save();
        return redirect()->route('Cliente.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_clie)
    {
        $cliente = Cliente::findOrFail($id_clie);
        return view('clientes.clientedetalle', compact('cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_clie)
    {
        $usuarios = User::all();
        $estado = Estado::all();
        $cliente = Cliente::findOrFail($id_clie);
        return view('clientes.clientedit', compact('cliente', 'usuarios', 'estado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_clie)
    {
        $cliente = Cliente::findOrFail($id_clie);
        $cliente -> ruc_clie = $request->input('ruc');
        $cliente -> razons_clie = $request->input('razon');
        $cliente -> direc_clie = $request->input('direc');
        $cliente -> contacto_clie = $request->input('contact');
		$cliente -> tel1_clie = $request->input('tel1');
        $cliente -> tel2_clie = $request->input('tel2');
        $cliente -> cel1_clie = $request->input('cel1');
        $cliente -> cel2_clie = $request->input('cel2');
        $cliente -> email1_clie = $request->input('email1');
        $cliente -> email2_clie = $request->input('email2');
        $cliente -> pagweb_clie = $request->input('web');
        $cliente -> estado = $request->input('estado');
        $cliente->save();
        return redirect()->route('Cliente.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_clie)
    {
        $cliente = Cliente::findOrFail($id_clie);
        $cliente->delete();
        return redirect()->route('Cliente.index');
    }
}
