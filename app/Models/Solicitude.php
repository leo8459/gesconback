<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitude extends Model
{
    use HasFactory;
  
    public function sucursale()
    {
        return $this->belongsTo(Sucursale::class);
    }
    public function cartero(){
        return $this->belongsTo(cartero::class);
    }
}
