<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    protected $table = 'sessions';

    protected $fillable = [
        'user_id',
        'ip_address',
        'user_agent',
        'payload',
        'last_activity'
    ];

    // Si quieres la relación con el usuario
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'user_id');
    }
}
