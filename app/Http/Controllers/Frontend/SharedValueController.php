<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\SharedValueRepository;
use App\Models\SharedValue;

class SharedValueController extends Controller
{
    protected $shared_value;

    public function __construct(SharedValueRepository $shared_value)
    {
        $this->shared_value = $shared_value;
    }

    public function show($slug)
    {
        $data = SharedValue::whereTranslation('slug', $slug)->first();

        if(!empty($data)) {
            return view('frontend.shared_value.show', compact('data'));
        }

        abort(404);
    }
}
