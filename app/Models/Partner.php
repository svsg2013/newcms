<?php

namespace App\Models;

use App\Traits\TranslatableExtendTrait;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Partner extends Model implements Transformable
{
    use \Dimsav\Translatable\Translatable, TranslatableExtendTrait, TransformableTrait;

    protected $table = 'partner';

    protected $fillable = [
        'photo',
        'logo',
        'position',
        'business_id',
        'country_id'
    ];

    public $translatedAttributes = ['name', 'content'];

    public function business()
    {
        return $this->belongsTo(Business::class, "business_id");
    }

    public function country()
    {
        return $this->belongsTo(Country::class, "country_id");
    }

    public function scopeOrderByTranslation($query, $name, $type = 'ASC')
    {
        return $query->join('partner_translation', function ($join) {
            $locale = \App::getLocale();
            $join->on('partner.id', '=', 'partner_translation.partner_id')
                ->where('partner_translation.locale', '=', $locale);
        })->orderBy("partner_translation.{$name}", $type);
    }
}
