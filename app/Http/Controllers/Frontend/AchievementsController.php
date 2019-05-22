<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\AchievementsRepository;
use App\Models\Achievements;

class AchievementsController extends Controller
{
    protected $achievements;

    public function __construct(AchievementsRepository $achievements)
    {
        $this->achievements = $achievements;
    }

    public function show($slug)
    {
        $data = Achievements::whereTranslation('slug', $slug)->first();

        if(!empty($data)) {
            return view('frontend.achievements.show', compact('data'));
        }

        abort(404);
    }
}
