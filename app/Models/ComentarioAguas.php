<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComentarioAguas extends Model
{
    use HasFactory;
    protected $fillable = [
        'comentario',
    ];
}
