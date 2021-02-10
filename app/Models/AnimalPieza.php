<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnimalPieza extends Model
{
    use HasFactory;

    protected $table = 'animales_piezas';

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
    protected $fillable = ['id', 'id_animales', 'codigo', 'estado', 'id_procesos_detalle', 'peso', 'pieza'];
    //  protected $hidden = ['id'];

    public function animales()
    {
        return $this->belongsTo('App\Models\Animal', 'id');
    }
    public function ingresos_detalle()
    {
        return $this->hasMany('App\Models\Ingresos_detalle', 'id');
    }
}
