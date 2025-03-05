<?php

namespace App;

use App\ProductImage;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name','price','feature_image_name','feature_image_path','content','user_id','category_id'];
    // protected $guarded = [];
    public function productImages () {
        return $this->hasMany('App\ProductImage','product_id');
    }
    // set relationship between product and tags
    public function productTags () {
        return $this->belongsToMany('App\Tag','product_tags','product_id','tag_id')->withTimestamps();
    }
}
