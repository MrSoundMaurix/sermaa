<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fecha extends Model
{
    use HasFactory;
    protected $primaryKey = "id";
    protected $table = "fechas";

    protected $fillable = ['categoria','descripcion','dia', 'mes','hora'];
    public $timestamps = false;
    protected $hidden = ['id'];

   /*  public function User()
    {
        return $this->belongsTo(User::class,'id_users','id');
    } */


}