<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cot_fpago extends Model
{
    //use HasFactory;
    protected $table = "cot_fpago";
    protected $primaryKey = "id_fpago";
    protected $fillable = [
    	'nom_fpago'	
    ];
    public $timestamps = false;
}
