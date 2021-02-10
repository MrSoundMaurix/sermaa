<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    use HasFactory;

    protected $table = 'animales';

    /**
     * The database primary key value.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    public $timestamps = false;
    protected $fillable = ['id', 'codigo', 'id_ingresos_detalle', 'peso', 'estado'];
    //  protected $hidden = ['id'];
    public function ingresos_detalle()
    {
        //return $this->belongsTo('App\Models\IngresoDetalle');
        return $this->belongsTo(IngresoCamal::class);
    }

    public function animales_piezas()
    {
        return $this->hasmany('App\Models\AnimalPieza', 'id_animales');
    }

    public function ingresosCabecera()
    {
        return $this->hasManyThrough('App\Models\IngresoCamal', 'App\Models\IngresoDetalle');
    }
}
