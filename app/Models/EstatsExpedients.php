<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstatsExpedients extends Model
{
    use HasFactory;
    
    public $table = 'estats_expedients';
    public $primaryKey = 'id'; //Por defecto es id
    public $incrementing = true; //Por defecto es true
    public $timestamps = false;

    public function Expedients()
    {
        return $this->hasMany(Expedients::class, 'estats_expedients_id');
    }
}
