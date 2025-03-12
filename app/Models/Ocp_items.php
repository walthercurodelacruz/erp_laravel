<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ocp_items extends Model
{
    //use HasFactory;
    protected $table = "ocp_items";
    protected $primaryKey = "id_ocpi";
    protected $fillable = [
   		'cod_op', 'cod_ocp', 'item_ocp', 'nota_ocp', 'cant_ocp', 'costo_ocp', 'total_ocp'
    ];
    public $timestamps = false;
}
