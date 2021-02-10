<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MatriculaCamal extends Model
{
    use HasFactory;
    protected $primaryKey = "id";
    protected $table = "matriculas_camal";

    protected $fillable = ['fecha_matricula', 'costo_matricula', 'id_users','responsable_matricula'];
    public $timestamps = false;
    protected $hidden = ['id'];

    public function User()
    {
        return $this->belongsTo(User::class,'id_users','id');
    }


}