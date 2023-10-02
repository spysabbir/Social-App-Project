<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Image;

class PostController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required',
            'image_path' => 'required|image|mimes:png,jpg,jpeg,webp',
        ]);

        $post_photo_name = "Post-Photo".Str::random(10).".". $request->file('image_path')->getClientOriginalExtension();
        $upload_link = base_path("public/uploads/post_photo/").$post_photo_name;
        Image::make($request->file('image_path'))->resize(120, 120)->save($upload_link);

        Post::create([
            'user_id' => Auth::user()->id,
            'content' => $request->content,
            'image_path' => $post_photo_name,
            'created_at' =>Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Post create successfully.',
            'alert-type' => 'success'
        );

        return back()->with($notification);
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
