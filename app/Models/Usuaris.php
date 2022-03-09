<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuaris extends Model
{
    use HasFactory;

    public $table = 'usuaris';
    public $primaryKey = 'id'; //Por defecto es id
    public $incrementing = true; //Por defecto es true
    public $timestamps = false;

    public function Perfils()
    {
        return $this->belongsTo(Perfils::class, 'perfils_id');
    }

    public function CartesTrucades()
    {
        return $this->hasMany(CartesTrucades::class, 'usuaris_id');
    } 
}
