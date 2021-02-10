<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CabeceraDistribucion extends Model
{
    use HasFactory;
    protected $primaryKey = "id";
    protected $table = "cabecera_distribucion";


    protected $fillable = ['nombre_destinatario', 'lugar_destino', 'fecha_actual', 'placa_transporte', 'origen_provincia', 'origen_canton', 'origen_parroquia', 'destino_provincia', 'destino_canton', 'destino_parroquia', 'id_ingresos', 'id_costo_camal', 'costo_transporte'];
    public $timestamps = false;
    protected $hidden = ['id'];

    public function ingresos()
    {
        return $this->belongsTo('App\Models\IngresoCamal', 'id_ingresos');
    }
    public function distribuciones(){
        return $this->hasMany('App\Models\DetalleDistribucion', 'id');
    }
}
