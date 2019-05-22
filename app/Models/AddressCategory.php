<?php

namespace App\Models;

use App\Traits\SlugTranslationTrait;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use App\Traits\TranslatableExtendTrait;
use Prettus\Repository\Traits\TransformableTrait;

class AddressCategory extends Model implements Transformable
{
    use \Dimsav\Translatable\Translatable, TransformableTrait, SlugTranslationTrait,TranslatableExtendTrait;

    const GET_DISBURSEMENTS = 'GET_DISBURSEMENTS';
    const PAYMENT_METHOD = 'PAYMENT_METHOD';

    protected $table = 'address_category';

    protected $fillable = [
        'position',
        'type',
        'parent_id'
    ];

    public $translatedAttributes = ['slug', 'name'];

    public $slug_from_source = 'name'; // dung title để chuyển qua slug trong translation, default name

    public static function types($key = null)
    {
        $arr = [
            self::GET_DISBURSEMENTS => 'Nhận khoản giải ngân',
            self::PAYMENT_METHOD => 'Phương thức thanh toán'
        ];
        return $key ? $arr[$key] : $arr;
    }

    public function address()
    {
        return $this->hasMany(Address::class, "address_category_id");
    }
}
