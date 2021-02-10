<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CostoFaenamiento extends Model
{
  use HasFactory;

  protected $table = 'costo_faenamiento';

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
  public $timestamps = true;
  protected $fillable = ['especie', 'valor'];
  //  protected $hidden = ['id'];

  public function animales()
  {
    return $this->hasMany('App\Models\IngresoDetalle', 'id');
  }
}
