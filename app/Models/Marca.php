<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Marca extends Model
{
    use HasFactory, SoftDeletes;

    public function photos()
    {
        return $this->hasMany(Photo::class, 'marca_id');
    }

    protected $fillable = [
        'name',
        'code',
        'description',
    ];
    
    protected $dates = ['deleted_at'];
}
