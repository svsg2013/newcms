<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class NewsAndTag extends Model
{
    protected $table = 'news_category_translation';

    protected $fillable = [
        'news_id',
        'news_tag_id'
    ];

    public function newsTagtoTag(){
        return $this->belongsTo(NewsTag::class,'news_tag_id');
    }
    public function newsTagToNews(){
        return $this->belongsTo(News::class,'news_id');
    }
}
