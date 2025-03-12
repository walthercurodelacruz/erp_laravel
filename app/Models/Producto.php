<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    //use HasFactory;
    protected $table = "producto";
    protected $primaryKey = "id_prod";
    protected $fillable = [
    	'cod_prod', 'item_prod', 'sn_prod', 'fabric_prod', 'modelo_prod', 'img_prod', 'pcosto_prod', 'pventa_prod', 'dispo_prod', 'estado_prod', 'desc_prod', 'ruc_prov', 'razons_prov', 'categ_prod', 'prod_serv', 'num'
    ];
    public $timestamps = false;
}
