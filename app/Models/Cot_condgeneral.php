<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cot_condgeneral extends Model
{
    //use HasFactory;
    protected $table = "cot_condgeneral";
    protected $primaryKey = "id_condgeneral";
    protected $fillable = [
    	'nom_condgeneral'	
    ];
    public $timestamps = false;
}
