<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IngresoDetalle extends Model
{
    use HasFactory;
    protected $primaryKey = "id";
    protected $table = "ingresos_detalle";


    protected $fillable = ['id', 'especie', 'cantidad', 'costo_unitario', 'subtotal', 'id_ingresos'];
    public $timestamps = false;
    // protected $hidden = ['id'];

    public function ingresosCamal()
    {
        return $this->belongsTo('App\Models\IngresoCamal', 'id_ingresos');
    }

    public function animalesPiezas()
    {
        return $this->hasMany('App\Models\AnimalPieza', 'id');
    }
    public function animales()
    {
        return $this->hasMany('App\Models\Animal', 'id');
    }
}
