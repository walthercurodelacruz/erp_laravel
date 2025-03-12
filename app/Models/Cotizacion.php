<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cotizacion extends Model
{
    //use HasFactory;
    protected $table = "cotizacion";
    protected $primaryKey = "id_cot";
    protected $fillable = [
    	'cod_cot', 'rucc_cot', 'num', 'cliente_cot', 'contacto_cot','cargo_cot', 'estado_cot', 'asignado_cot', 'fpago_cot', 'moneda_cot', 'tentrega_cot', 'expira_cot', 'direc_cot', 'condgeneral_cot', 'pie_cot', 'fecha_cot', 'impuestos', 'garantia', 'condproduc', 'simbolo'
    ];
    public $timestamps = false;
}
