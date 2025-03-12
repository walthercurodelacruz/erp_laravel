<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Proveedor;
use App\Models\Categorias;
use Illuminate\Support\Facades\DB;

class ProductoController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-ps|crear-ps|editar-ps|borrar-ps', ['only'=>['index']]);
        $this->middleware('permission:crear-ps', ['only'=>['create', 'store']]);
        $this->middleware('permission:editar-ps', ['only'=>['edit', 'update']]);
        $this->middleware('permission:borrar-ps', ['only'=>['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cod = trim($request->get('cod'));
        $item = trim($request->get('item'));
        $sn_prod = trim($request->get('sn_prod'));
        $dispo_prod = trim($request->get('dispo_prod'));
        $razons_prov = trim($request->get('razons_prov'));
        $prov = trim($request->get('prov'));
        $tipo = trim($request->get('tipo'));
        $productos = DB::table('producto')
                        ->select('id_prod', 'item_prod', 'sn_prod', 'cod_prod', 'fabric_prod', 'modelo_prod', 'img_prod', 'pcosto_prod', 'pventa_prod', 'dispo_prod', 'estado_prod', 'desc_prod', 'ruc_prov', 'razons_prov', 'categ_prod', 'prod_serv', 'num')
                        ->Where('cod_prod', 'LIKE', '%'.$cod.'%')
                        ->Where('item_prod', 'LIKE', '%'.$item.'%')
                        ->Where('sn_prod', 'LIKE', '%'.$sn_prod.'%')
                        /* ->Where('dispo_prod', 'LIKE', '%'.$dispo_prod.'%') */
                        /* ->Where('razons_prov', 'LIKE', '%'.$razons_prov.'%') */
                        /* ->Where('ruc_prov', 'LIKE', '%'.$prov.'%') */
                        ->Where('prod_serv', 'LIKE', '%'.$tipo.'%')
                        ->simplePaginate(50);

        return view('producto.productocrud', compact('productos', 'cod', 'item', 'sn_prod', 'dispo_prod', 'razons_prov', 'prov', 'tipo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cod = "PS";
        $num = "0000";
        $cods = [];
        $x = Producto::all();
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

        $categorias = Categorias::all();
        $proveedor = Proveedor::all();
        return view('producto.productocreate', compact('proveedor', 'categorias', 'codigo', 'coda'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /* $nomfile = $request->file('img_prod')->getClientOriginalName(); */

        $producto = new Producto;
        $producto -> cod_prod = $request->input('cod');
        $producto -> item_prod = $request->input('item_prod');
        $producto -> sn_prod = $request->input('sn_prod');
        $producto -> fabric_prod = $request->input('fabric_prod');
        $producto -> modelo_prod = $request->input('modelo_prod');
        /* $producto -> img_prod = $request->file('img_prod')->storeAs('img', $nomfile); */
        $producto -> pcosto_prod = $request->input('pcosto_prod');
        $producto -> pventa_prod = $request->input('pventa_prod');
        $producto -> dispo_prod = $request->input('dispo_prod');
        $producto -> desc_prod = $request->input('desc_prod');
        $producto -> ruc_prov = $request->input('ruc_prov');
        $producto -> razons_prov = $request->input('razons_prov');
        $producto -> categ_prod = $request->input('categ_prod');
        $producto -> prod_serv = $request->input('prod_serv');
        $producto -> num = $request->input('num');
        $producto->save();
        return redirect()->route('Producto.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_prod)
    {
        $producto = Producto::findOrFail($id_prod);
        return view('producto.productodetalle', compact('producto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_prod)
    {
        $proveedor = Proveedor::all();
        $producto = Producto::findOrFail($id_prod);
        return view('producto.productoedit', compact('producto', 'proveedor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_prod)
    {
        /* $nomfile = $request->file('img_prod')->getClientOriginalName(); */

        $producto = Producto::findOrFail($id_prod);
        /* $producto -> img_prod = $request->file('img_prod')->storeAs('img', $nomfile); */
        $producto -> item_prod = $request->input('item_prod');
        $producto -> fabric_prod = $request->input('fabric_prod');
        $producto -> pcosto_prod = $request->input('pcosto_prod');
        $producto -> pventa_prod = $request->input('pventa_prod');
        $producto -> dispo_prod = $request->input('dispo_prod');
        $producto -> estado_prod = $request->input('estado_prod');
        $producto -> desc_prod = $request->input('desc_prod');
        $producto -> ruc_prov = $request->input('ruc_prov');
        $producto -> razons_prov = $request->input('razons_prov');
        $producto -> prod_serv = $request->input('prod_serv');
        $producto->save();
        return redirect()->route('Producto.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_prod)
    {
        $producto= Producto::findOrFail($id_prod);
        $producto->delete();
        return redirect()->route('Producto.index');
    }
}
