<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cot_expira extends Model
{
    //use HasFactory;
    protected $table = "cot_expira";
    protected $primaryKey = "id_expira";
    protected $fillable = [
    	'nom_expira'	
    ];
    public $timestamps = false;
}
