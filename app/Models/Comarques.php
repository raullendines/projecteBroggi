<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comarques extends Model
{
    use HasFactory;

    public $table = 'comarques';
    public $primaryKey = 'id'; //Por defecto es id
    public $incrementing = true; //Por defecto es true
    public $timestamps = false;

    public function Provincies()
    {
        return $this->belongsTo(Provincies::class, 'provincies_id');
    }

    public function Municipis()
    {
        return $this->hasMany(Municipis::class, 'comarques_id');
    }
}
