<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComentarioElectromecanica extends Model
{
    use HasFactory;
    protected $fillable = [
        'comentario',
    ];
}
