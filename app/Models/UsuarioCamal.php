<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UsuarioCamal extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'usuarios_camal';

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
    protected $fillable = ['nombres', 'apellidos','cedula','telefono','direccion','guia','estado'];

    
    protected $hidden = ['id'];

    public function ingresos()
    {
        return $this->hasMany('App\Models\IngresoCamal','id');
    }
}
