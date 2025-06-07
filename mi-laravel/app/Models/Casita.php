<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Casita extends Model
{
    use HasFactory;

    // Estos son los campos que se pueden guardar
    protected $fillable = ['nombre', 'tamaño'];
}
