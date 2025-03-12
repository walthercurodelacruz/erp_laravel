<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ftin extends Model
{
    //use HasFactory;
    protected $table = "ftin";
    protected $primaryKey = "id_ftin";
    protected $fillable = [
    'cod_ftin', 'ruc_ftin', 'razons_ftin', 'desc_ftin', 'arch_ftin', 'cot_ftin', 'entrega_ftin', 'subtotal_ftin', 'total_ftin', 'femi_ftin', 'fcaduca_ftin', 'moneda_ftin', 'num'
    ];
    public $timestamps = false;
}
