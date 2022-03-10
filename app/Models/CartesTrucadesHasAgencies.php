<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartesTrucadesHasAgencies extends Model
{
    use HasFactory;

    public $table = 'cartes_trucades_has_agencies';
    public $primaryKey = ['cartes_trucades_id', 'agencies_id', 'estats_agencies_id']; //Por defecto es id
    public $incrementing = false; //Por defecto es true
    public $timestamps = false;

    public function Agencies()
    {
        return $this->belongsTo(Agencies::class, 'agencies_id');
    }

    public function EstatsAgencies()
    {
        return $this->belongsTo(EstatsAgencies::class, 'estats_agencies_id');
    }

    public function CartesTrucades()
    {
        return $this->belongsTo(CartesTrucades::class, 'cartes_trucades_id');
    }
}
