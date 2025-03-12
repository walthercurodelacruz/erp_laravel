<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estado_ocp extends Model
{
    //use HasFactory;
    protected $table = "estado_ocp";
    protected $primaryKey = "id_ocp";
    protected $fillable = [
    	'nom_ocp'	
    ];
    public $timestamps = false;
}
