<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Igv extends Model
{
    //use HasFactory;
    protected $table = "igv";
    protected $primaryKey = "id_igv";
    protected $fillable = [
    	'valor_igv'	
    ];
    public $timestamps = false;
}
