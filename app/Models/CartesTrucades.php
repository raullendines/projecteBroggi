<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartesTrucades extends Model
{

    /* 
    public function CartesTrucades()
    {
        return $this->hasMany(CartesTrucades::class, 'incidents_id');
    } 
    */
    use HasFactory;

    public $table = 'cartes_trucades';
    public $primaryKey = 'id'; //Por defecto es id
    public $incrementing = true; //Por defecto es true
    public $timestamps = false;

    public function Incidents()
    {
        return $this->belongsTo(Incidents::class, 'incidents_id');
    }

    public function Provincies()
    {
        return $this->belongsTo(Provincies::class, 'provincies_id');
    }
}
