<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guia extends Model
{
    //use HasFactory;
    protected $table = "guia";
    protected $primaryKey = "id_guia";
    protected $fillable = [
    	'cod_guia', 'rucp_guia', 'razons_guia', 'direc_guia', 'fecha_guia', 'hora_guia', 'arch_guia', 'ocp_guia', 'num_guia', 'num'

    ];
    public $timestamps = false;
}
