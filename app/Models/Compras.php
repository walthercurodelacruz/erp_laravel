<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compras extends Model
{
    //use HasFactory;
    protected $table = "compras";
    protected $primaryKey = "id_compras";
    protected $fillable = [
    	'cod_op', 'item_compras', 'nota_compras', 'cant_compras', 'prov_compras', 'mon_compras', 'costo_compras', 'cot_prov_compras', 'asig_compras', 'entrega_compras', 'respon_compras', 'ocp_compras'
    ];
    public $timestamps = false;
}
