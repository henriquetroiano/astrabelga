<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Catalogo;


class Photo extends Model
{
    use HasFactory;

    // Determines which database table to use
//    protected $table = 'catalogos';

   protected $fillable = [
       'url',
   ];

   public function catalogo() 
   {
      return $this->belongsTo('Catalogo');
   }

}
