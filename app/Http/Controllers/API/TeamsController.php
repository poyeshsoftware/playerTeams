<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\TeamRequest;
use App\Http\Resources\TeamJsonResource;
use App\Models\Team;

class TeamsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return TeamJsonResource::collection(Team::All());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TeamRequest $request)
    {
        return Team::create($request->validated());
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(TeamRequest $request, Team $team)
    {
        return $team->update($request->validated());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Team $team)
    {
        return $team->delete();
    }
}
