<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Traits\TransformableTrait;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
/**
 * Class ElCompany.
 *
 * @package namespace App\Models;
 */
class ElCompany extends Authenticatable
{
    use Notifiable;

    protected $guard = 'e-link';

    protected $table = 'el_company';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [

    	'username',
    	'password',
    	'name',
    	'email',
    	'phone',
    	'address',
    	'logo',
    	'business_id',
    	'receive_news',
    	'status',
    	'decline_reason',

    ];

    protected $hidden = [
        "password",
    ];

    public function el_news()
    {
        return $this->hasMany(ElNews::class, 'el_company_id');
    }

}
