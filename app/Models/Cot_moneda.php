<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cot_moneda extends Model
{
    //use HasFactory;
    protected $table = "cot_moneda";
    protected $primaryKey = "id_moneda";
    protected $fillable = [
    	'nom_moneda'	
    ];
    public $timestamps = false;
}
