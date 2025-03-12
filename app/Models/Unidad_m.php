<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unidad_m extends Model
{
    //use HasFactory;
    protected $table = "unidad_medida";
    protected $primaryKey = "id_um";
    protected $fillable = [
    	'nom_um',
    ];
    public $timestamps = false;
}
