<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matricula extends Model
{
    use HasFactory;
    protected $table = 'matriculas_camal';

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
    protected $fillable = ['fecha_matricula', 'costo_matricula','id_users','responsable_matricula'];
    //  protected $hidden = ['id'];
  
    public function users()
    {
        return $this->belongsTo('App\Models\User','id');
    }
}
