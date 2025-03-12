<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Opedido extends Model
{
    //use HasFactory;
    protected $table = "op_logistica";
    protected $primaryKey = "id_op";
    protected $fillable = [
    'cod_op', 'ot_op', 'rucc_op', 'cliente_op', 'estado_op', 'asig_op', 'entrega_op', 'direc_op', 'creacionot_op', 'update_op', 'tecnico_op', 'detalle_op', 'requiere_op', 'num'
    ];
    public $timestamps = false;
}
