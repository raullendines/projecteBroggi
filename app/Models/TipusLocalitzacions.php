<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class TipusLocalitzacions extends Model
{
    use HasFactory;


    public $table = 'tipus_localitzacions';
    public $primaryKey = 'id'; //Por defecto es id
    public $incrementing = true; //Por defecto es true
    public $timestamps = false;

    public function CartesTrucades()
    {
        return $this->hasMany(CartesTrucades::class, 'tipus_localitzacions_id');
    }
}
