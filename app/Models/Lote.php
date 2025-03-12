<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lote extends Model
{
    //use HasFactory;
    protected $table = "lote";
    protected $primaryKey = "id_lote";
    protected $fillable = [
    	'nom_lote',
    ];
    public $timestamps = false;
}
