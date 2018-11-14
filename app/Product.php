<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable = [
        'id',
        'name',
        'description',
        'price',
        'created_at',
        'updated_at',
      ];
}
