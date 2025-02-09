<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Chollos extends Model
{
    use HasFactory;
    protected $table = 'chollos';

    protected function descripcion(): Attribute
    {
        return Attribute::make(
            set: fn($value) => strtolower($value)
        );
        return Attribute::make(
            get: fn($value) => strtolower($value)
        );
    }
}
