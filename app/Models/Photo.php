<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Catalogo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Photo extends Model
{
    use HasFactory, SoftDeletes;

    // Determines which database table to use
//    protected $table = 'catalogos';

   protected $fillable = [
       'url',
       'type',
   ];

   public function catalogo() 
   {
      return $this->belongsTo('Catalogo');
   }

   protected $dates = ['deleted_at'];

}
