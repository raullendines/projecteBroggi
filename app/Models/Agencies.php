<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agencies extends Model
{
    use HasFactory;

    public $table = 'agencies';
    public $primaryKey = 'id'; //Por defecto es id
    public $incrementing = true; //Por defecto es true
    public $timestamps = false;

    public function Municipis()
    {
        return $this->belongsTo(Municipis::class, 'municipis_id');
    }

    public function CartesTrucadesHasAgencies()
    {
        return $this->hasMany(CartesTrucadesHasAgencies::class, 'agencies_id');
    }
}
