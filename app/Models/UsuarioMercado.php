<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsuarioMercado extends Model
{
    use HasFactory;
    protected $primaryKey="id" ;
    protected $table="usuarios_mercado" ;
    public $timestamps=true; 

    protected $fillable = ['tipo_usuario','cedula','nombres','apellidos','telefono','direccion','foto','estado','fototype'];

    protected $hidden = ['pivot'];
}
