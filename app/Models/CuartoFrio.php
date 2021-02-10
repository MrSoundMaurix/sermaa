<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CuartoFrio extends Model
{
  use HasFactory;
  protected $table = 'cuarto_frio';

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
  protected $fillable = ['fecha_actual', 'fecha_modificacion', 'total_piezas', 'pieza', 'especie', 'id_ingresos'];
  //  protected $hidden = ['id'];

  public function ingresos_detalle()
  {
    return $this->belongsTo('App\Models\IngresoCamal');
  }
}
