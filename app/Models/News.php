<?php

namespace App\Models;

use App\Traits\MetadataTrait;
use App\Traits\SlugTranslationTrait;
use App\Traits\TranslatableExtendTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class News extends Model implements Transformable
{
    use \Dimsav\Translatable\Translatable, TranslatableExtendTrait,  TransformableTrait, MetadataTrait, SlugTranslationTrait;

    protected $table = 'news';

    protected $fillable = [
        'image',
        'banner',
        'news_category_id',
        'active',
        'is_top',
        'publish_at',
        'code'
    ];

    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }

    public function scopeTopNews($query)
    {
        return $query->where('is_top', 1);
    }

    public $translatedAttributes = [
        'title',
        'slug',
        'description',
        'content',
        'video'
    ];

    public $slug_from_source = 'title'; // dung title để chuyển qua slug trong translation, default name

    public function category()
    {
        return $this->belongsTo(NewsCategory::class, 'news_category_id');
    }

    public function getLabelActiveAttribute()
    {
        return $this->active ? trans('admin_news.attr.active') : trans('admin_news.attr.un_active');
    }

    public function getPublishAtFormatAttribute()
    {
        return cvDbTime($this->publish_at);
    }

    public function getContentAttribute()
    {
        $array_view = [];
        if(view()->exists('themes._slider1_shortcode'))
            $array_view['SLIDER1'] = view('themes._slider1_shortcode')->render();
        if(view()->exists('themes._slider2_shortcode'))
            $array_view['SLIDER2'] = view('themes._slider2_shortcode')->render();

        return replacement($this->attributes['content'],$array_view);
    }

    public function getUrlAttribute()
    {
        return route('news.show', [
            'category' => $this->category->slug,
            'slug' => $this->slug
        ]);
    }

    public function newsToTag(){
        return $this->belongsToMany(NewsAndTag::class,'news_and_tags','news_id','news_tag_id');
    }
}
