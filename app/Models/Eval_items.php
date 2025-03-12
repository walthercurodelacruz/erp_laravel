<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eval_items extends Model
{
    //use HasFactory;
    protected $table = "eval_items";
    protected $primaryKey = "id_item";
    protected $fillable = [
    	'cod_eval', 'item_eval', 'nota_eval', 'cant_eval', 'obser_eval'		
    ];
    public $timestamps = false;
}
