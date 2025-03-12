<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cot_items extends Model
{
    //use HasFactory;
    protected $table = "cot_items";
    protected $primaryKey = "id_items";
    protected $fillable = [
   'cod_cot', 'detalle_items', 'nota_items', 'precio_items', 'cant_items', 'total_items', 'numitem'	
	
    ];
    public $timestamps = false;
}
