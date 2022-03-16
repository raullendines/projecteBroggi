<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Perfils extends Model
{
    use HasFactory;
   
    public $table = 'perfils';
    public $primaryKey = 'id'; //Por defecto es id
    public $incrementing = true; //Por defecto es true
    public $timestamps = false;

    public function Usuaris()
    {
        return $this->hasMany(Usuaris::class, 'perfils_id');
    }
}
