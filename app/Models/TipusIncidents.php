<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class TipusIncidents extends Model
{
    use HasFactory;

    public $table = 'tipus_incidents';
    public $primaryKey = 'id'; //Por defecto es id
    public $incrementing = true; //Por defecto es true
    public $timestamps = false;

    public function Incidents()
    {
        return $this->hasMany(Incidents::class, 'classes_incidents_id');
    }
}