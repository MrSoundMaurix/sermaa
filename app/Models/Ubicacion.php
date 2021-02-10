<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ubicacion extends Model
{
    protected $primaryKey = "id";
    protected $table = "ubicacion";


    protected $fillable = ['provincia', 'canton', 'parroquia', 'codigo'];
    public $timestamps = false;
    protected $hidden = ['id'];
}
