<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Follower;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    public function profile(Request $request)
    {
        $allFollower = Follower::where('follower_id', auth()->user()->id)->get();
        $allFollowing = Follower::where('following_id', auth()->user()->id)->get();

        $allPost = Post::where('user_id', auth()->user()->id)->get();

        return view('frontend.profile.index', [
            'user' => $request->user(),
            'allFollower' => $allFollower,
            'allFollowing' => $allFollowing,
            'follower_count' => $allFollower->count(),
            'following_count' => $allFollowing->count(),
            'allPost' => $allPost,
        ]);
    }

    public function profilePostData()
    {
        $allPost = Post::where('user_id', auth()->user()->id)->get();

        return view('frontend.post.index', compact('allPost'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'nullable|string|max:255|unique:users,username,'.auth()->user()->id,
            'phone_number' => 'nullable|min:11|max:14',
            'profile_photo' => 'nullable|image|mimes:png,jpg,jpeg,webp',
        ]);

        Auth::user()->update($request->except('profile_photo'));

        // Profile Photo Upload
        if($request->hasFile('profile_photo')){
            if(Auth::user()->profile_photo != 'default_profile_photo.png'){
                unlink(base_path("public/uploads/profile_photo/").Auth::user()->profile_photo);
            }
            $profile_photo_name = Auth::user()->id."-Profile-Photo".".". $request->file('profile_photo')->getClientOriginalExtension();
            $upload_link = base_path("public/uploads/profile_photo/").$profile_photo_name;
            Image::make($request->file('profile_photo'))->resize(120, 120)->save($upload_link);
            Auth::user()->update([
                'profile_photo' => $profile_photo_name
            ]);
        }

        $notification = array(
            'message' => 'Profile updated successfully.',
            'alert-type' => 'success'
        );

        return back()->with($notification);

    }

    public function destroy(Request $request)
    {
        $request->validate([
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/login')->with('info', 'Profile Delete successfully.');
    }
}
