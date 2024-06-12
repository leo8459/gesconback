<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

use Laravel\Sanctum\HasApiTokens;
class Sucursale extends Authenticatable
{
    use HasFactory;

    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
    ];

    /**
     * Get the authenticated client instance.
     *
     * @return \App\Models\empresa
     */    
   
    public function solicitudes()
    {
        return $this->hasMany(Solicitude::class);
    }
    public function empresa(){
        return $this->belongsTo(empresa::class);
    }
}
