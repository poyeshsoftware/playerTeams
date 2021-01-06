<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\GetPlayersRequest;
use App\Http\Requests\PlayerRequest;
use App\Http\Resources\PlayerJsonResource;
use App\Models\Player;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(GetPlayersRequest $request)
    {
        return PlayerJsonResource::collection(Player::withFilters());
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(PlayerRequest $request)
    {
        return Player::create($request->validated());
    }


    /**
     * Update the specified resource in storage.
     *
     */
    public function update(PlayerRequest $request, Player $player)
    {
        return $player->update($request->validated());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Player $player)
    {
        $player->delete();
    }
}
