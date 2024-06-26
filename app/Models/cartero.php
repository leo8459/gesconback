<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Contracts\Auth\MustVerifyEmail;
class cartero extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    
    public function solicitudesRecogidas()
    {
        return $this->hasMany(Solicitude::class, 'cartero_recogida_id');
    }

    public function solicitudesEntregadas()
    {
        return $this->hasMany(Solicitude::class, 'cartero_entrega_id');
    }
  
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nombre',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
       
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [

    ];}
