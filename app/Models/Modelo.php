<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modelo extends Model
{
    //use HasFactory;
    protected $table = "modelo";
    protected $primaryKey = "id_modelo";
    protected $fillable = [
    	'nom_modelo',
    ];
    public $timestamps = false;
}
