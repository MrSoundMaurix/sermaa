<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class IngresoCamal extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'ingresos';

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
    protected $fillable = ['id', 'fecha_ingreso', 'costo_total', 'id_users', 'estado', 'medio_movilizacion', 'placa_transporte', 'condicion_transporte', 'lugar_procedencia', 'numero_factura', 'observaciones', 'csmi', 'fecha_faenamiento', 'responsable_recepcion', 'responsable_recepcion_datos', 'validar_transporte', 't_camal'];
    protected $hidden = ['id'];


    public function users()
    {
        return $this->belongsTo('App\Models\User', 'id_users');
    }
    public function cabeceraDistribucion()
    {
        return $this->hasMany('App\Models\CabeceraDistribucion', 'id');
    }
    public function ingresosDetalle()
    {
        return $this->hasMany('App\Models\IngresoDetalle');
    }
    public function cuartoFrio()
    {
        return $this->hasMany('App\Models\CuartoFrio', 'id');
    }
}
