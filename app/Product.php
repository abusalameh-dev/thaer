<?php

namespace App;

use App\Category;
use App\Photo;
use App\Provider;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];

    public function image()
    {
    	return $this->hasOne(Photo::class);
    }

    public function provider()
    {
    	return $this->belongsTo(Provider::class,'provider_id');
    }

    public function category()
    {
    	return $this->belongsTo(Category::class,'provider_id');
    }
}
