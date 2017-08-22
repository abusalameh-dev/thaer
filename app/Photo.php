<?php

namespace App;

use App\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class Photo extends Model
{
	protected $table = 'images';
    protected $guarded = [];
    protected $path = 'products';

    public function product()
    {
    	return $this->belongsTo(Product::class);
    }

    public function deleteFile()
    {
    	$filename = $this->filename;
    	// dd($filename);
    	File::delete($this->path . '/' . $filename);
    }
}
