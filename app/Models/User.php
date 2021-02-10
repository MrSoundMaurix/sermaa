<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Jetstream\HasTeams;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use HasTeams;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'cedula', 'nombres', 'apellidos', 'telefono', 'direccion', 'foto', 'fototype', 'current_team_id', 'estado', 'codigo', 'matricula'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function ingresos()
    {
        return $this->hasMany('App\Models\IngresoCamal', 'id');
    }
    public function matriculas()
    {
        return $this->hasMany(Matricula::class, 'id_users');
    }

    public function matriculasMercado()
    {
        return $this->hasMany(MatriculasMercado::class,'id_users');
    }
    public function matriculasCamal()
    {
        return $this->hasMany(MatriculaCamal::class,'id_users');
    }


    public static function estado($estado)
    {
        if ($estado == 0) {
            return 'Activo';
        }
        return 'Inactivo';
    }

    public static function tipoUsuario($tipo)
    {
        if ($tipo == 0) {
            return 'Usuario';
        }
        return 'Personal';
    }
}
