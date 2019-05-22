<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class ElCompanyMenu.
 *
 * @package namespace App\Models;
 */
class ElCompanyMenu extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'el_company_menu';

    protected $fillable = [
        'el_company_id',
        'parent_id',
        'code',
        'url',
        'name',
        'status',
        'position'
    ];

    public function company()
    {
        return $this->belongsTo(ElCompany::class, 'el_company_id');
    }

    public function parent()
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(self::class, 'parent_id');
    }
}
