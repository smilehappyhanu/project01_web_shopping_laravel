<?php

namespace App;

use App\ProductImage;
use App\Category;
use App\Tag;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    protected $fillable = ['name','price','feature_image_name','feature_image_path','content','user_id','category_id'];
    // protected $guarded = [];
    public function productImages () {
        return $this->hasMany('App\ProductImage','product_id');
    }
    // set relationship between product and tags
    public function productTags () {
        return $this->belongsToMany('App\Tag','product_tags','product_id','tag_id')->withTimestamps();
    }
    // set relationship between product and category
    public function category() {
        return $this->belongsTo(Category::class,'category_id');
    }
    // set relationship between product and product_images
    public function productImagesDetail() {
        return $this->hasMany(ProductImage::class,'product_id');
    }
}
