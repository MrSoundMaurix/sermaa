<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PuestoMercado extends Model
{
    use HasFactory;
    protected $primaryKey = "id";
    protected $table = "puestos_mercado";
    public $timestamps = false;

    protected $fillable = ['nro_puesto', 'estado_puesto', 'id_users', 'id_sector_mercado'];

    protected $hidden = ['pivot'];

    public function sector()
    {
        return $this->belongsTo('App\Models\SectorMercado', 'id_sector_mercado');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'id_users');
    }

    public static function estadoPuesto($estado)
    {
        if ($estado == 'A') {
            return 'Activo';
        }
        return 'Inactivo';
    }
}
