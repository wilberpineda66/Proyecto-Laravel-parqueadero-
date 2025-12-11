<?php


namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable
{
    use Notifiable;

    protected $table = 'usuarios';
    protected $primaryKey = 'id'; // Asegúrate de que coincida con tu base de datos

    protected $fillable = [
        'username', 'email', 'password', 'rol'
    ];

    public $timestamps = true;

    // Redirige la autenticación al campo correcto si no es 'password'
    public function getAuthPassword()
    {
        return $this->password;
    }
}
