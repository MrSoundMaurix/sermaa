<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PagosPuestoMercado extends Model
{
    use HasFactory;
    protected $primaryKey = "id";
    protected $table = "pagos_puesto_mercado";


    protected $fillable = ['id_puestos_mercado','id_users','valor_total', 'fecha','fecha_pago','observacion','foto','fototype','responsable_cobro','pago_realizado','matricula'];
    public $timestamps = false;
    protected $hidden = ['id'];

    public function puestoMercado()
    {
        return $this->belongsTo(PuestosMercado::class, 'id_puestos_mercado');
    }
    public function user(){
        return $this->belongsTo(User::class,'id_users');
    }
    public function responsableCobro(){
        return $this->belongsTo(User::class,'responsable_cobro');
    }
}
