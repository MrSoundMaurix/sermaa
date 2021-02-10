<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PuestosMercado extends Model
{
    protected $primaryKey = "id";
    protected $table = "puestos_mercado";


    protected $fillable = ['nro_puesto', 'estado_puesto', 'id_users','id_sector_mercado'];
    public $timestamps = false;
    // protected $hidden = ['id'];

    public function pagosPuestoMercado()
    {
        return $this->hasMany(PagosPuestoMercado::class, 'id_pagos_puestos_mercado');
    }

    public function tipoPagoMercado()
    {
        return $this->belongsTo(TipoPagoMercado::class, 'id_tipo_pago_mercado');
    }
    public function tipoPagoMercado2()
    {
        return $this->hasOneThrough(TipoPagoMercado::class,SectorMercado::class,'id_sector_mercado', 'id',
         'id','id');
    }
    public function usuariosMercado()
    {
        return $this->belongsTo(UsuarioMercado::class, 'id_usuarios_mercado');
    }
    public function user(){
        return $this->belongsTo(User::class,'id_users');
    }

    public function sectorMercado(){
        return $this->belongsTo(SectorMercado::class,'id_sector_mercado');
    }
}
