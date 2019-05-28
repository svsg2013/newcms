<?php

namespace App\Models;

use App\Traits\SlugTranslationTrait;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use App\Traits\TranslatableExtendTrait;
use Prettus\Repository\Traits\TransformableTrait;

class NewsTag extends Model
{
    protected $table = 'news_tag';
}
