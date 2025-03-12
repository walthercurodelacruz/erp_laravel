<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    //use HasFactory;
    protected $table = "cliente";
    protected $primaryKey = "id_clie";
    protected $fillable = [
    	'cod_clie', 'ruc_clie', 'num', 'razons_clie', 'direc_clie', 'contacto_clie', 'tel1_clie', 'tel2_clie', 'cel1_clie', 'cel2_clie', 'email1_clie', 'email2_clie', 'pagweb_clie', 'area', 'estado', 'asignado'
    ];
    public $timestamps = false;
}
