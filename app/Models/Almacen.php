<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Almacen extends Model
{
    //use HasFactory;
    protected $table = "almacen";
    protected $primaryKey = "id_alm";
    protected $fillable = [
    	'nom_alm',	
    ];
    public $timestamps = false;
}
