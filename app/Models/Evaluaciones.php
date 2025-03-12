<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluaciones extends Model
{
    //use HasFactory;
    protected $table = "evaluaciones";
    protected $primaryKey = "id_eval";
    protected $fillable = [
    	'cod_eval', 'cot_eval', 'rucc_eval', 'num', 'cliente_eval', 'estado_eval', 'asig_eval', 'entrega_eval', 'direc_eval', 'creacion_eval', /* 'update_eval', */ 'tecnico_eval', 'detalle_eval', 'requiere_eval'
    ];
    public $timestamps = false;
}
