<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Antemorten extends Model
{
    protected $table = 'antemorten';

    protected $primaryKey = 'id';

    public $timestamps = false;
    protected $fillable = [
        'fecha', 'especie', 'lugar_procedencia', 'csmi', 'nro_lote', 'etapa_productiva', 'nro_machos', 'nro_hembras', 'total_animales', 'nro_animales_muertos', 'causa_probable', 'decomiso', 'aprovechamiento', 'nro_sindrome_nervioso', 'nro_sindrome_digestivo', 'nro_sindrome_vesicular', 'nro_sindrome_respiratorio', 'tipo_secrecion', 'nro_cojera', 'nro_ambulatorios', 'nro_matanza_normal', 'nro_matanza_especial', 'nro_matanza_emergencia', 'nro_aplazamiento_matanza', 'observaciones'
    ];
}
