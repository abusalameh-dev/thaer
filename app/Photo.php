<?php

namespace App;

use App\Product;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
	protected $table = 'images';
    protected $guarded = [];

    public function product()
    {
    	return $this->belongsTo(Product::class);
    }
}
