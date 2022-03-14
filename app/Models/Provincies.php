<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provincies extends Model
{
    use HasFactory;

    public $table = 'provincies';
    public $primaryKey = 'id'; //Por defecto es id
    public $incrementing = true; //Por defecto es true
    public $timestamps = false;

    public function Comarques()
    {
        return $this->hasMany(Comarques::class, 'provincies_id');
    }

    public function CartesTrucades()
    {
        return $this->hasMany(CartesTrucades::class, 'provincies_id');
    }
}
