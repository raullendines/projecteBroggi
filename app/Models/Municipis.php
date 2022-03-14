<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipis extends Model
{
    use HasFactory;

    public $table = 'municipis';
    public $primaryKey = 'id'; //Por defecto es id
    public $incrementing = true; //Por defecto es true
    public $timestamps = false;

    public function Comarques()
    {
        return $this->belongsTo(Comarques::class, 'comarques_id');
    }
    
    public function Agencies()
    {
        return $this->hasMany(Agencies::class, 'municipis_id');
    }

    public function CartesTrucadesTrucada()
    {
        return $this->hasMany(CartesTrucades::class, 'municipi_id_trucada');
    } 

    public function CartesTrucadesIncident()
    {
        return $this->hasMany(CartesTrucades::class, 'municipi_id');
    } 
}
