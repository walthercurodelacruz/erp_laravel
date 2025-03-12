<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cot_estado extends Model
{
    //use HasFactory;
    protected $table = "cot_estado";
    protected $primaryKey = "id_estado";
    protected $fillable = [
    	'nom_estado'	
    ];
    public $timestamps = false;
}
