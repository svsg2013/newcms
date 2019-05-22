<?php

namespace App\Models;

use App\Traits\TranslatableExtendTrait;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Carbon\Carbon;

class Popup extends Model implements Transformable
{
    use \Dimsav\Translatable\Translatable, TranslatableExtendTrait, TransformableTrait;

    protected $table = 'popup';

    protected $fillable = [
        'code',
        'start',
        'end',
        'active'
    ];

    public $translatedAttributes = ['content'];

    public function getActivePopupAttribute()
    {
        $now = Carbon::now()->format('Y-m-d H:i:s');
        
        $activePopup = false;
        if($this->start <= $now && $this->end >= $now && $this->active == 1) {
            $activePopup = true;
        }

        return $activePopup;
    }
}
