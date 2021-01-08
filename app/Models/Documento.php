<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Photo;
use App\Models\Marca;

class Documento extends Model
{
    use HasFactory, SoftDeletes;

    public function photos()
    {
        return $this->hasMany(Photo::class, 'documento_id');
    }

    protected $fillable = [
        'title',
        'description',
        'url',
    ];

    protected $dates = ['deleted_at'];

}
