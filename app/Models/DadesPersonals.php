<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DadesPersonals extends Model
{
    use HasFactory;

    public $table = 'dades_personals';
    public $primaryKey = 'id'; //Por defecto es id
    public $incrementing = true; //Por defecto es true
    public $timestamps = false;

    public function CartesTrucades()
    {
        return $this->hasMany(CartesTrucades::class, 'dades_personals_id');
    } 
}
