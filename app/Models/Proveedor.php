<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    //use HasFactory;
    protected $table = "proveedores";
    protected $primaryKey = "id_prov";
    protected $fillable = [
    	'cod_prov', 'ruc_prov', 'num', 'razons_prov', 'direc_prov', 'contacto_prov', 'cel1_prov', 'cel2_prov', 'email1_prov', 'email2_prov', 'pagweb_prov', 'estado_prov'
    ];
    public $timestamps = false;
}
