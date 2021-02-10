<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleDistribucion extends Model
{
    use HasFactory;

    protected $primaryKey = "id";
    protected $table = "detalle_distribucion";


    protected $fillable = ['especie', 'id_cabecera_distribucion', 'numero_id', 'producto', 'cantidad'];
    public $timestamps = false;
    protected $hidden = ['id'];
    public function cabeceraDistribucion()
    {
        return $this->belongsTo('App\Models\CabeceraDistribucion','id_cabecera_distribucion');
    }
}
