<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    use HasFactory;

    public function photos()
    {
        return $this->hasMany(Photo::class, 'marca_id');
    }

    protected $fillable = [
        'name',
        'code',
        'description',
    ];
}
