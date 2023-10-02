<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'content' => 'required',
            'image_path' => 'required|image|mimes:png,jpg,jpeg,webp',
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => 400,
                'error'=> $validator->errors()->toArray()
            ]);
        }else{
            $post_photo_name = "Post-Photo".Str::random(10).".". $request->file('image_path')->getClientOriginalExtension();
            $upload_link = base_path("public/uploads/post_photo/").$post_photo_name;
            Image::make($request->file('image_path'))->resize(120, 120)->save($upload_link);

            Post::insert([
                'user_id' => Auth::user()->id,
                'content' => $request->content,
                'image_path' => $post_photo_name,
                'created_at' =>Carbon::now(),
            ]);

            return response()->json([
                'status' => 200,
                'message'=> "Post create successfully."
            ]);
        };
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
        $post = Post::findOrFail($id);
        unlink(base_path("public/uploads/post_photo/").$post->image_path);
        $post->delete();
    }
}