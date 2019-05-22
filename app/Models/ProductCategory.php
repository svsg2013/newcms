<?php

namespace App\Models;

use App\Traits\CatalogueTrait;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class ProductCategory extends Model implements Transformable
{
    use \Dimsav\Translatable\Translatable, TransformableTrait, CatalogueTrait;

    protected $table = 'product_categories';

    protected $fillable = [
        'parent_id',
        'logo',
        'icon',
        'image',
        'level',
        'is_top',
        'slider_key',
        'active',
        'product_id',
        'position'
    ];

    public $translatedAttributes = [
        'name',
        'slug',
        'description'
    ];

    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }

    public function children()
    {
        return $this->hasMany(ProductCategory::class, 'parent_id', 'id')->orderBy('position', 'asc');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, "product_category", "category_id", "product_id");
    }

    public function parent()
    {
        return $this->belongsTo(ProductCategory::class, 'parent_id', 'id');
    }

    public function getImagePathAttribute()
    {
        if ($this->image) {
            $image = assetStorage($this->image);
        } else {
            $image = $this->product_photo_path;
        }
        return $image;
    }

    public function getProductPhotoPathAttribute()
    {
        $path = null;
        if ($this->product_id) {
            $product = $this->products()->where('product.id', $this->product_id)->with(['photo'])->first();
            $path = $product && $product->photo ? $product->photo->arrayPath()['medium'] : asset(NO_IMAGE_CATEGORY);
        }
        return $path;
    }

    public function getIconPathAttribute()
    {
        return $this->icon ? assetStorage($this->icon) : asset(NO_ICON_CATEGORY);
    }
}
