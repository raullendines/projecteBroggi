<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expedients extends Model
{
    use HasFactory;

    public $table = 'expedients';
    public $primaryKey = 'id'; //Por defecto es id
    public $incrementing = true; //Por defecto es true
    public $timestamps = false;

    public function EstatsExpedients()
    {
        return $this->belongsTo(EstatsExpedients::class, 'estats_expedients_id');
    }

    public function CartesTrucades()
    {
        return $this->hasMany(CartesTrucades::class, 'expedients_id');
    } 
}

