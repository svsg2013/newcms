<?php

namespace App\Http\Controllers\Frontend;

use App\Repositories\TeamRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TeamController extends Controller
{
    protected $team;
    public function __construct(TeamRepository $team)
    {
        $this->team = $team;
    }

    public function getTeamInfo(Request $request)
    {
        $team = $this->team->find($request->get('id'));
        $team = [
            'id'=>$team->id,
            'avatar'=>$team->avatar,
            'avatar_large'=>$team->avatar_large,
            'join_at'=>$team->join_at,
            'name'=>$team->name,
            'position'=>$team->position,
            'description'=>$team->description,
            'job_value'=>$team->job_value,
            'favorite'=>$team->favorite,
            'content'=>$team->content
        ];
        return ['success'=>true,'data'=>$team];
    }
}
