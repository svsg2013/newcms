<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ElNews extends Model
{

    protected $table = 'el_news';

    protected $fillable = [
        'el_company_id',
        'url',
    	'title',
    	'slug',
    	'image',
    	'banner',
    	'active',
    	'is_top',
    	'publish_at'
    ];

    public function el_company()
    {
        return $this->belongsTo(ElCompany::class, 'el_company_id');
    }
    
}
