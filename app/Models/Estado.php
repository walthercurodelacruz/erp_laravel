<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    //use HasFactory;
    protected $table = "estado";
    protected $primaryKey = "id_estado";
    protected $fillable = [
    	'nom_estado'	
    ];
    public $timestamps = false;
}
