<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoPagoMercado extends Model
{

    protected $primaryKey = "id";
    protected $table = "tipo_pago_mercado";


    protected $fillable = ['descripcion', 'valor_pago', 'categoria', 'estadia'];
    public $timestamps = false;
    protected $hidden = ['id'];

    public static function showCategory($category)
    {
        if ($category == 0||$category == 2) {
            return 'Canon arrendamiento';
        }
        return 'Costos matrícula';
    }
    public static function showEstadia($estadia)
    {
        if ($estadia == "PERMANENTE") {
            return 'MENSUAL';
        } else if ($estadia == "EVENTUAL") {
            return 'DIARIO';
        } else if ($estadia == "OCASIONAL") {
            return "DIARIO";
        } else {
            return 'SELECCIONE';
        }
    }
    public function puestos()
    {
        return $this->hasOneThrough(PuestosMercado::class,SectorMercado::class,'id_tipo_pago_mercado','id_sector_mercado',
         'id','id');


    }
}
