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
    	return $this->belongsTo(Category::class,'category_id');
    }

    public function getImage()
    {
        if (!is_null($this->image)) '<img src="/products/'.$this->image->filename.'" class="img-thumbnail" style="width:100px;height:100px" />';
        return '<img src="https://screenshotlayer.com/images/assets/placeholder.png" class="img-thumbnail" style="width:100px;height:100px" />';
    }

    public function getImagePath()
    {
        if (!is_null($this->image)) "/products/" . $this->image->filename;
        return "https://screenshotlayer.com/images/assets/placeholder.png";
    }
}
