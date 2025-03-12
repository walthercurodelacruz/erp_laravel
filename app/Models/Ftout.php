<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ftout extends Model
{
    //use HasFactory;
    protected $table = "ftout";
    protected $primaryKey = "id_ftout";
    protected $fillable = [
    'cod_ftout', 'ruc_ftout', 'razons_ftout', 'desc_ftout', 'arch_ftout', 'cot_ftout', 'entrega_ftout','subtotal_ftout', 'total_ftout', 'femi_ftout', 'fcaduca_ftout', 'moneda_ftout', 'num'
    ];
    public $timestamps = false;
}
