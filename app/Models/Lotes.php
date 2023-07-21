<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lotes extends Model
{
    use HasFactory;

    protected $table = "lotes";

    protected $fillable = [
        'status','vendedor','comprador','status_date','quadra_id','empreendimento_id'
    ];

    public function quadras(){
        return $this->belongsTo(Quadras::class);
    }
}
