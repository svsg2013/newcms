<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ImageMap.
 *
 * @package namespace App\Models;
 */
class ImageMapTranslation extends Model
{
    protected $table = 'image_map_translation';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    public $timestamps = false;
}
