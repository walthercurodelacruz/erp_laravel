<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cot_pie extends Model
{
    //use HasFactory;
    protected $table = "cot_pie";
    protected $primaryKey = "id_pie";
    protected $fillable = [
    	'nom_pie'	
    ];
    public $timestamps = false;
}
