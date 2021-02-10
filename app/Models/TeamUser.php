<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamUser extends Model
{

    protected $primaryKey = "id";
    protected $table = "team_user";


    protected $fillable = ['team_id', 'user_id', 'role'];
    public $timestamps = true;
    protected $hidden = ['id'];
}
