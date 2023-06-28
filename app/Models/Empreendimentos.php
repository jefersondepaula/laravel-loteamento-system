<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empreendimentos extends Model
{
    use HasFactory;

    protected $table = "empreendimentos";

    protected $fillable = [
        'name', 'quadras'
    ];

    public function quadras() {
        return $this->hasMany(Quadras::class);
    }

}
