<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class CartesTrucades extends Model
{

    /*
    public function CartesTrucades()
    {
        return $this->hasMany(CartesTrucades::class, 'incidents_id');
    }
    */
    use HasFactory;

    protected $fillable = [
        'codi_trucada',
        'data_hora',
        'temps_trucada',
        'dades_personals_id',
        'telefon',
        'procedencia_trucada',
        'origen_trucada',
        'nom_trucada',
        'municipis_id_trucada',
        'adreca_trucada',
        'fora_catalunya',
        'provincies_id',
        'municipis_id',
        'tipus_localitzacions_id',
        'descripcio_localitzacio',
        'detall_localitzacio',
        'altres_ref_localitzacio',
        'incidents_id',
        'nota_comuna',
        'expedients_id',
        'usuaris_id'
    ];

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

    public function MunicipiTrucada()
    {
        return $this->belongsTo(Municipis::class, 'municipi_id_trucada');
    }

    public function MunicipiIncident()
    {
        return $this->belongsTo(Municipis::class, 'municipi_id');
    }

    public function Usuaris()
    {
        return $this->belongsTo(Usuaris::class, 'usuaris_id');
    }

    public function Expedients()
    {
        return $this->belongsTo(Expedients::class, 'expedients_id');
    }

    public function TipusLocalitzacions()
    {
        return $this->belongsTo(TipusLocalitzacions::class, 'tipus_localitzacions_id');
    }

    public function DadesPersonals()
    {
        return $this->belongsTo(DadesPersonals::class, 'dades_personals_id');
    }

    public function CartesTrucadesHasAgencies()
    {
        return $this->hasMany(CartesTrucadesHasAgencies::class, 'cartes_trucades_id');
    }
}


