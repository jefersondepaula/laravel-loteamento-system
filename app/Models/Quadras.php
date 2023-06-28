<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quadras extends Model
{
    use HasFactory;

    protected $table = "quadras";

    public function empreendimentos(){
        return $this->belongsTo(Empreendimentos::class);
    }

    public function lotes()
    {
        return $this->hasMany(Lotes::class);
    }

}
