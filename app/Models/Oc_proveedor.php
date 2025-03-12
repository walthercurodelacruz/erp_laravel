<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Oc_proveedor extends Model
{
    //use HasFactory;
    protected $table = "oc_proveedor";
    protected $primaryKey = "id_ocp";
    protected $fillable = [
    	'cod_ocp', 'cod_cot	', 'ruc_prov', 'estado_ocp', 'respon_ocp', 'mon_ocp', 'entrega_ocp', 'razons_ocp', 'contacto_ocp', 'direc_ocp', 'fecha_ocp', 'num'
	
    ];
    public $timestamps = false;
}
