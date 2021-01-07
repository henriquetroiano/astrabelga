<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Photo;
use App\Models\Marca;

class Catalogo extends Model
{
    use HasFactory, SoftDeletes;

    public function photos()
    {
        return $this->hasMany(Photo::class, 'catalogo_id');
    }

    public function marcas()
    {
        return $this->hasMany(Marca::class, 'catalogo_id');
    }

    protected $fillable = [
        'name',
    ];

    protected $dates = ['deleted_at'];
}
