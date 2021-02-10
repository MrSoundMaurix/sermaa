<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CostoCamal extends Model
{
  use HasFactory;

  protected $table = 'costo_camal';

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
  protected $fillable = ['descripcion', 'valor', 'categoria'];
  //  protected $hidden = ['id'];

  /*  public function users()
  {
    return $this->hasMany('App\Models\User', 'id_user');
  } */
}
