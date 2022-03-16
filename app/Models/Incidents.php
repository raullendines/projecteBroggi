<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Incidents extends Model
{
    use HasFactory;

    public $table = 'incidents';
    public $primaryKey = 'id'; //Por defecto es id
    public $incrementing = true; //Por defecto es true
    public $timestamps = false;

    public function TipusIncidents()
    {
        return $this->belongsTo(TipusIncidents::class, 'classes_incidents_id');
    }

    public function CartesTrucades()
    {
        return $this->hasMany(CartesTrucades::class, 'incidents_id');
    }

    
}
