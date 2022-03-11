<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class EstatsAgencies extends Model
{
    use HasFactory;

    public $table = 'estats_agencies';
    public $primaryKey = 'id'; //Por defecto es id
    public $incrementing = true; //Por defecto es true
    public $timestamps = false;

    public function CartesTrucadesHasAgencies()
    {
        return $this->hasMany(CartesTrucadesHasAgencies::class, 'estats_agencies_id');
    }
}
