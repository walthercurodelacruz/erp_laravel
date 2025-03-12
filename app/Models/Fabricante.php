<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fabricante extends Model
{
    //use HasFactory;
    protected $table = "fabricante";
    protected $primaryKey = "id_fabricante";
    protected $fillable = [
    	'nom_fabricante',
    ];
    public $timestamps = false;
}
