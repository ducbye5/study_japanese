<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Hiragana extends Model
{
   /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'characters', 'pronunciation',
    ];

    
}
