<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorias extends Model
{
    //use HasFactory;
    protected $table = "categorias";
    protected $primaryKey = "id_categ";
    protected $fillable = [
    	'nom_categ'	
    ];
    public $timestamps = false;
}
