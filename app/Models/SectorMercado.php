<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SectorMercado extends Model
{
    protected $primaryKey = "id";
    protected $table = "sector_mercado";


    protected $fillable = ['id_tipo_pago_mercado', 'codigo', 'sector', 'mercado'];
    public $timestamps = false;
    // protected $hidden = ['id'];

    public function puestos()
    {
        return $this->hasMany('App\Models\PuestoMercado','id');
    }

    public function tipo_pago(){
        return $this->belongsTo('App\Models\TipoPagoMercado','id_tipo_pago_mercado');
    }
}
