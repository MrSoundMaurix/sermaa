<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MatriculasMercado extends Model
{
    use HasFactory;
    protected $primaryKey = "id";
    protected $table = "matriculas_mercado";

    protected $fillable = ['fecha_matricula', 'costo_matricula', 'id_users', 'multa', 'responsable_matricula'];
    public $timestamps = false;
    protected $hidden = ['id'];

   /*  public function User()
    {
        return $this->belongsTo(User::class,'id_users','id');
    } */
    public function puestos()
    {
        return $this->belongsTo(PuestosMercado::class,'id_puestos_mercado','id');
    }
    public function responsableMatricula(){
        return $this->belongsTo(User::class,'responsable_matricula');
    }


}