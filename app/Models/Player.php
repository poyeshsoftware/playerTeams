<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'id', 'team_id'
    ];

    public function scopeWithFilters()
    {
        return Player::
        when(request()->filled('team_id'), function ($query) {
            $query->where('team_id', request()->input('team_id'));
        })
        ->with('team')->get();
    }

    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}
