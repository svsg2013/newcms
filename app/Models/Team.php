<?php

namespace App\Models;

use App\Traits\TranslatableExtendTrait;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Team extends Model implements Transformable
{
    use \Dimsav\Translatable\Translatable, TranslatableExtendTrait, TransformableTrait;

    protected $table = 'team';

    protected $fillable = [
        'avatar',
        'avatar_large',
        'order',
        'team_category',
        'join_at',
        'link_twitter',
        'link_facebook',
        'link_google_plus',
        'link_linkin'
    ];

    public $translatedAttributes = ['name', 'position', 'description','job_value','favorite','content'];

    public function scopeOrderByTranslation($query, $name, $type = 'ASC')
    {
        return $query->join('partner_translation', function ($join) {
            $locale = \App::getLocale();
            $join->on('partner.id', '=', 'partner_translation.partner_id')
                ->where('partner_translation.locale', '=', $locale);
        })->orderBy("partner_translation.{$name}", $type);
    }
}
