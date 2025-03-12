<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class items_op extends Model
{
    //use HasFactory;
    protected $table = "op_tabla";
    protected $primaryKey = "id_op";
    protected $fillable = [
    	'cod_op', 'item_op', 'nota_op', 'cant_op', 'obser_op'	
    ];
    public $timestamps = false;
}
