<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Like;
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
            $post_photo_name = "Post-Photo-".Str::random(10).".". $request->file('image_path')->getClientOriginalExtension();
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
        $post = Post::where('id', $id)->first();
        return response()->json($post);
    }

    public function update(Request $request, string $id)
    {
        $post = Post::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'content' => 'required',
            'image_path' => 'nullable|image|mimes:png,jpg,jpeg,webp',
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => 400,
                'error'=> $validator->errors()->toArray()
            ]);
        }else{
            $post->update([
                'content' => $request->content,
            ]);

            if($request->hasFile('image_path')){
                unlink(base_path("public/uploads/post_photo/").$post->image_path);
                $post_photo_name = "Post-Photo-".Str::random(10).".". $request->file('image_path')->getClientOriginalExtension();
                $upload_link = base_path("public/uploads/post_photo/").$post_photo_name;
                Image::make($request->file('image_path'))->resize(120, 120)->save($upload_link);
                $post->update([
                    'image_path' => $post_photo_name,
                ]);
            }

            return response()->json([
                'status' => 200,
                'message'=> "Post update successfully."
            ]);
        }
    }

    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);
        unlink(base_path("public/uploads/post_photo/").$post->image_path);
        $post->delete();
    }

    public function postLike(string $id)
    {
        $likeStatus = Like::where('post_id', $id)->where('user_id', Auth::user()->id)->first();
        if(!$likeStatus){
            Like::insert([
                'post_id' => $id,
                'user_id' => Auth::user()->id,
                'created_at' =>Carbon::now(),
            ]);
        }else{
            $likeStatus->delete();
        }
    }

    public function insertComment(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'post_id' => 'required',
            'content' => 'required',
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => 400,
                'error'=> $validator->errors()->toArray()
            ]);
        }else{
            Comment::create([
                'user_id' => Auth::user()->id,
                'post_id' => $request->post_id,
                'content' => $request->content,
                'created_at' =>Carbon::now(),
            ]);
            return response()->json([
                'status' => 200,
            ]);
        }
    }

    public function postCommentDelete(string $id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();

        return back();
    }

    public function postLikeList($id)
    {
        $allLike = Like::where('post_id', $id)->get();
        return view('frontend.layouts.like-list', compact('allLike'));
    }

    public function postCommentList($id)
    {
        $allComment = Comment::where('post_id', $id)->get();
        return view('frontend.layouts.comment-list', compact('allComment'));
    }
}
