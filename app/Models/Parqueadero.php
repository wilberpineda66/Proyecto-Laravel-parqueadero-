<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Parqueadero extends Model
{
    protected $table = 'parqueaderos';

    protected $fillable = [
        'nombre',
        'direccion',
        'descripcion',
        'espacios_disponibles',
        'latitud',
        'longitud',
    ];

    // Relación: un parqueadero tiene muchos espacios
    public function espacios()
    {
        return $this->hasMany(EspacioParqueadero::class, 'parqueadero_id');
    }
}
