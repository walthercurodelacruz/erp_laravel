<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Occliente extends Model
{
    //use HasFactory;
    protected $table = "oc_cliente";
    protected $primaryKey = "id_occliente";
    protected $fillable = [
    'cod_occliente', 'ruc_occliente', 'razons_occliente', 'desc_occliente', 'arch_occliente', 'cot_occliente', 'entrega_occliente', 'num'
    ];
    public $timestamps = false;
}
