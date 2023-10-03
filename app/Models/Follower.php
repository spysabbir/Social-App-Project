<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Follower extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function relationTofollowing ()
    {
        return $this->belongsTo(User::class, 'follower_id', 'id');
    }

    public function relationToFollower ()
    {
        return $this->belongsTo(User::class, 'following_id', 'id');
    }
}
