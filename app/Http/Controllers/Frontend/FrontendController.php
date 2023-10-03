<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Follower;
use App\Models\Post;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    public function index()
    {
        $allPost = Post::all();
        $followerIds = Follower::where('following_id', auth()->user()->id)->pluck('follower_id');
        $allUser = User::where('role', 'User')->where('id', '!=', auth()->user()->id)->whereNotIn('id', $followerIds)->inRandomOrder()->get();
        return view('frontend.index', compact('allUser', 'allPost'));
    }

    public function followerStatus($id)
    {
        $follower = Follower::where('follower_id', $id)->where('following_id', Auth::user()->id)->first();
        if(!$follower){
            Follower::insert([
                'follower_id' => $id,
                'following_id' => Auth::user()->id,
                'created_at' =>Carbon::now(),
            ]);
        }else{
            $follower->delete();
        }
    }
}
