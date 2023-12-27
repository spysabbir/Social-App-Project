<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Like;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class BackendController extends Controller
{
    public function dashboard()
    {
        $allUser = User::count();
        $allPost = Post::count();
        $allComment = Comment::count();
        $allLike = Like::count();
        return view('backend.dashboard', compact('allUser', 'allPost', 'allComment', 'allLike'));
    }

    public function profile()
    {
        return view('backend.profile.index', [
            'user' => auth('backend')->user(),
        ]);
    }

    public function profileUpdate(Request $request)
    {
        $user = auth('backend')->user();

        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'nullable|string|max:255|unique:users,username,'.$user->id,
            'phone_number' => 'nullable|min:11|max:14',
            'profile_photo' => 'nullable|image|mimes:png,jpg,jpeg,webp',
        ]);

        $user->update($request->except('profile_photo'));

        // Profile Photo Upload
        if($request->hasFile('profile_photo')){
            if($user->profile_photo != 'default_profile_photo.png'){
                unlink(base_path("public/uploads/profile_photo/").$user->profile_photo);
            }
            $profile_photo_name = $user->id."-".$user->role."-Profile-Photo".".". $request->file('profile_photo')->getClientOriginalExtension();
            $upload_link = base_path("public/uploads/profile_photo/").$profile_photo_name;
            Image::make($request->file('profile_photo'))->resize(120, 120)->save($upload_link);
            $user->update([
                'profile_photo' => $profile_photo_name
            ]);
        }

        $notification = array(
            'message' => 'Profile updated successfully.',
            'alert-type' => 'success'
        );

        return back()->with($notification);

    }
}
