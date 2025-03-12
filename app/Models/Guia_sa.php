<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guia_sa extends Model
{
    //use HasFactory;
    protected $table = "guia_sa";
    protected $primaryKey = "id_guia";
    protected $fillable = [
    	'cod_guia', 'rucc_guia', 'razons_guia', 'direc_guia', 'fecha_guia', 'hora_guia', 'arch_guia', 'occ_guia', 'num_guia', 'num'

    ];
    public $timestamps = false;
}
