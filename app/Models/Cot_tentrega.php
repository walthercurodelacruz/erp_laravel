<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cot_tentrega extends Model
{
    //use HasFactory;
    protected $table = "cot_tentrega";
    protected $primaryKey = "id_tentrega";
    protected $fillable = [
    	'nom_tentrega'	
    ];
    public $timestamps = false;
}
