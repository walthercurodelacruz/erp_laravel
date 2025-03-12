<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servicios;
use App\Models\Producto;
use App\Models\Cliente;
use App\Models\Cotizacion;
use App\Models\User;
use App\Models\Proveedor;
use App\Models\Compras;
use App\Models\Ocp_items;
use App\Models\Oc_proveedor;
use App\Models\Opedido;
use App\Models\Occliente;
use App\Models\Guia;

class SearchController extends Controller
{
	
    public function buscarcliente(Request $request){
        $b = $request->get('b');
        $clientes = Cliente::where('razons_clie','LIKE' , '%'.$b.'%')->get();
        $ruc = [];

        foreach ($clientes as $query) {
            $ruc[] = [
                'label' => $query->razons_clie,
                'ruc_clie' => $query->ruc_clie,
                'direc_clie' => $query->direc_clie,
				'contacto_clie' => $query->contacto_clie,
				'area' => $query->area,
            ];
        }
        return $ruc;
    }
	
	public function buscarproveedor(Request $request){
        $c = $request->get('c');
        $proveedor = Proveedor::where('razons_prov','LIKE' , '%'.$c.'%')->get();
        $razons = [];

        foreach ($proveedor as $query) {
            $razons[] = [
                'label' => $query->razons_prov,
                'ruc_prov' => $query->ruc_prov,
                'direc_prov' => $query->direc_prov,
				'contacto_prov' => $query->contacto_prov,
            ];
        }
        return $razons;
    }
		
	public function numparte(Request $request){
        $d = $request->get('d');
        $nparte = Producto::where('sn_prod','LIKE' , '%'.$d.'%')->get();
        $num_parte = [];

        foreach ($nparte as $query) {
            $num_parte[] = [
                'label' => $query->sn_prod,
                'item_prod' => $query->item_prod,
				'desc_prod' => $query->desc_prod,
				'pventa_prod' => $query->pventa_prod,
            ];
        }

        return $num_parte;
    }	
		
    public function searchprod(Request $request){
        $e = $request->get('e');
        $productos = Producto::where('item_prod','LIKE' , '%'.$e.'%')->get();
        $name_prod = [];

        foreach ($productos as $query) {
            $name_prod[] = [
                'label' => $query->item_prod,
                'sn_prod' => $query->sn_prod,
				'desc_prod' => $query->desc_prod,
				'pventa_prod' => $query->pventa_prod,
            ];
        }

        return $name_prod;
    }

    public function searchasig(Request $request){
        $a = $request->get('a');
        $asignado = User::where('name','LIKE' , '%'.$a.'%')->where('id_cargo', 'LIKE', 'Evaluador')->get();
        $nom_asig = [];

        foreach ($asignado as $query) {
            $nom_asig[] = [
                'label' => $query->name,
				'last_name' => $query->last_name,
            ];
        }

        return $nom_asig;
    }

	 public function searchcrazons(Request $request){
        $f = $request->get('f');
        $clirazons = Cliente::where('razons_clie','LIKE' , '%'.$f.'%')->get();
        $cli_razons = [];

        foreach ($clirazons as $query) {
            $cli_razons[] = [
                'label' => $query->razons_clie,
				'ruc_clie' => $query->ruc_clie,
				'direc_clie' => $query->direc_clie,
            ];
        }

        return $cli_razons;
    }

    public function searchrucprov(Request $request){
        $g = $request->get('g');
        $rucprov = Proveedor::where('ruc_prov','LIKE' , '%'.$g.'%')->get();
        $name_razons = [];

        foreach ($rucprov as $query) {
            $name_razons[] = [
                'label' => $query->ruc_prov,
                'direc' => $query->direc_prov,
                'razons' => $query->razons_prov,
                'contacto' => $query->contacto_prov,
            ];
        }

        return $name_razons;
    }

    public function searchprodop(Request $request){
        $h = $request->get('h');
        $producto = Compras::where('item_compras', 'LIKE', '%'.$h.'%')->whereNull('ocp_compras')->get();
        $item = [];

        foreach ($producto as $query) {
            $item[] = [
                'label' => $query->item_compras,
                'nota' => $query->nota_compras,
                'cant' => $query->cant_compras,
                'id' => $query->id_compras,
                'cod' => $query->cod_op,
            ];
        }

        return $item;
    }

    public function searchprov(Request $request){
        $i = $request->get('i');
        $razonsprov = Proveedor::where('ruc_prov','LIKE' , '%'.$i.'%')->get();
        $name_razons = [];

        foreach ($razonsprov as $query) {
            $name_razons[] = [
                'label' => $query->ruc_prov,
                'razons' => $query->razons_prov,
            ];
        }

        return $name_razons;
    }
	
	public function searchgin(Request $request){
        $j = $request->get('j');
        $guia_entrada = Ingreso::where('guia_ing','LIKE' , '%'.$j.'%')->get();
        $dat_gin = [];

        foreach ($guia_entrada as $query) {
            $dat_gin[] = [
                'label' => $query->guia_ing,
                'item_ing' => $query->item_ing,
				'rucp_ing' => $query->rucp_ing,
				'razons_ing' => $query->razons_ing,
				'ocp_ing' => $query->ocp_ing,
            ];
        }
        return $dat_gin;
    }

    public function searchitems(Request $request){
        $k = $request->get('k');
        $items = Stock::where('item_stock','LIKE' , '%'.$k.'%')->get();
        $data_items = [];

        foreach ($items as $query) {
            $data_items[] = [
                'label' => $query->item_stock,
                'sn' => $query->cod_stock,
                'moneda' => $query->mon_stock,
                'modelo' => $query->model_stock,
                'pcosto' => $query->pc_stock,
                'medida' => $query->um_stock,
                'descripcion' => $query->desc_stock,
                'fabricante' => $query->fab_stock,
                'categoria' => $query->categ_stock,
                'lote' => $query->lote_stock,
                'almacen' => $query->alm_stock,
                'id_stock' => $query->id_stock,
                'unid_stock' => $query->unid_stock,
				'op_stock' => $query->op_stock,
            ];
        }

        return $data_items;
    }

    public function searchitems2(Request $request){
        $l = $request->get('l');
        $item_stock = Stock::where('item_stock','LIKE' , '%'.$l.'%')->get();
        $data_items = [];

        foreach ($item_stock as $query) {
            $data_items[] = [
                'label' => $query->item_stock,
                'sn' => $query->cod_stock,
                'moneda' => $query->mon_stock,
                'modelo' => $query->model_stock,
                'pcosto' => $query->pc_stock,
                'medida' => $query->um_stock,
                'descripcion' => $query->desc_stock,
                'fabricante' => $query->fab_stock,
                'categoria' => $query->categ_stock,
                'lote' => $query->lote_stock,
                'almacen' => $query->alm_stock,
                'unid_stock' => $query->unid_stock,
                'alm' => $query->cod_alm,
                'ruc' => $query->rucp_stock,
                'guia' => $query->guia_stock,
                'ocp' => $query->ocp_stock,
                'razons' => $query->razons_stock,
                'op' => $query->op_stock,
            ];
        }

        return $data_items;
    }

    public function searchprazons(Request $request){
        $m = $request->get('m');
        $razons = Proveedor::where('razons_prov','LIKE' , '%'.$m.'%')->get();
        $name_razons = [];

        foreach ($razons as $query) {
            $name_razons[] = [
                'label' => $query->razons_prov,
                'ruc_prov' => $query->ruc_prov,
                'direc_prov' => $query->direc_prov,
            ];
        }

        return $name_razons;
    }

    public function searchclienteruc(Request $request){
        $n = $request->get('n');
        $rucc = Cliente::where('ruc_clie','LIKE' , '%'.$n.'%')->get();
        $ruc_cliente = [];

        foreach ($rucc as $query) {
            $ruc_cliente[] = [
                'label' => $query->ruc_clie,
                'razons' => $query->razons_clie,
            ];
        }
        return $ruc_cliente;
    }
	
	public function searchocpitem(Request $request){
        $o = $request->get('o');
        $rucc = Ocp_items::where('item_ocp','LIKE' , '%'.$o.'%')->get();
        $ruc_cliente = [];

        foreach ($rucc as $query) {
            $ruc_cliente[] = [
                'label' => $query->item_ocp,
                'cod_ocp' => $query->cod_ocp,
				'cod_op' => $query->cod_op,
				'cant_ocp' => $query->cant_ocp,
				'costo_ocp' => $query->costo_ocp,
            ];
        }
        return $ruc_cliente;
    }
	
	public function searchocp(Request $request){
        $p = $request->get('p');
        $rucc = Oc_proveedor::where('cod_ocp','LIKE' , '%'.$p.'%')->get();
        $ruc_cliente = [];

        foreach ($rucc as $query) {
            $ruc_cliente[] = [
                'label' => $query->cod_ocp,
                'ruc_prov' => $query->ruc_prov,
				'razons_ocp' => $query->razons_ocp,
				'mon_ocp' => $query->mon_ocp,
            ];
        }
        return $ruc_cliente;
    }
	
	public function searchclientes(Request $request){
        $q = $request->get('q');
        $clientes = Cliente::where('ruc_clie','LIKE' , '%'.$q.'%')->get();
        $ruc = [];

        foreach ($clientes as $query) {
            $ruc[] = [
                'label' => $query->ruc_clie,
                'direc' => $query->direc_clie,
                'razons' => $query->razons_clie,
            ];
        }
        return $ruc;
    }
	
	public function searchcodcot(Request $request){
        $r = $request->get('r');
        $codcot = Cotizacion::where('cod_cot','LIKE' , '%'.$r.'%')->get();
        $cod = [];

        foreach ($codcot as $query) {
            $cod[] = [
                'label' => $query->cod_cot,
                'entrega' => $query->tentrega_cot,
                'rucc_cot' => $query->rucc_cot,
                'cliente_cot' => $query->cliente_cot,
            ];
        }

        return $cod;
    }
	
	public function searchop(Request $request){
        $s = $request->get('s');
        $rucc = Opedido::where('cod_op','LIKE' , '%'.$s.'%')->get();
        $ruc_cliente = [];

        foreach ($rucc as $query) {
            $ruc_cliente[] = [
                'label' => $query->cod_op,
                'rucc_op' => $query->rucc_op,
				'cliente_op' => $query->cliente_op,
				'asig_op' => $query->asig_op,
				'tecnico_op' => $query->tecnico_op,
            ];
        }
        return $ruc_cliente;
    }
	
	public function searchocc(Request $request){
        $t = $request->get('t');
        $scot = Occliente::where('cot_occliente','LIKE' , '%'.$t.'%')->get();
        $cot_cliente = [];

        foreach ($scot as $query) {
            $cot_cliente[] = [
                'label' => $query->cot_occliente,
				'cod_occliente' => $query->cod_occliente,
				'ruc_occliente' => $query->ruc_occliente,
				'razons_occliente' => $query->razons_occliente,
				'entrega_occliente' => $query->entrega_occliente,
            ];
        }
        return $cot_cliente;
    }
	
	public function searchgsal(Request $request){
        $u = $request->get('u');
        $guiasal = Salida::where('guia_sal','LIKE' , '%'.$u.'%')->get();
        $guia_salida = [];

        foreach ($guiasal as $query) {
            $guia_salida[] = [
                'label' => $query->guia_sal,
				'occ_sal' => $query->occ_sal,
				'rucc_sal' => $query->rucc_sal,
				'razons_sal' => $query->razons_sal,
            ];
        }
        return $guia_salida;
    }
	
	public function buscarocp(Request $request){
        $v = $request->get('v');
        $buscarocp = Oc_proveedor::where('cod_ocp','LIKE' , '%'.$v.'%')->get();
        $bus_ocp = [];

        foreach ($buscarocp as $query) {
            $bus_ocp[] = [
                'label' => $query->cod_ocp,
				'ruc_prov' => $query->ruc_prov,
				'razons_ocp' => $query->razons_ocp,
				'cod_cot' => $query->cod_cot,
				'estado_ocp' => $query->estado_ocp,
				'respon_ocp' => $query->respon_ocp,
            ];
        }
        return $bus_ocp;
    }
	
	public function searchnumocc(Request $request){
        $w = $request->get('w');
        $snumocc = Occliente::where('entrega_occliente','LIKE' , '%'.$w.'%')->get();
        $buscar_numocc = [];

        foreach ($snumocc as $query) {
            $buscar_numocc[] = [
                'label' => $query->entrega_occliente,
				'ruc_occliente' => $query->ruc_occliente,
				'razons_occliente' => $query->razons_occliente,
				'cot_occliente' => $query->cot_occliente,
            ];
        }
        return $buscar_numocc;
    }
}
