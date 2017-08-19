<?php

namespace App;

use App\Photo;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];

    public function image()
    {
    	return $this->hasOne(Photo::class);
    }
}
