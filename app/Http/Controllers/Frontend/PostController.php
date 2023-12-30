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
            'post_content' => 'required',
            'post_photo' => 'nullable|image|mimes:png,jpg,jpeg',
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => 400,
                'error'=> $validator->errors()->toArray()
            ]);
        }else{
            if($request->hasFile('post_photo')){
                $post_photo_name = "Post-Photo-".Str::random(10).".". $request->file('post_photo')->getClientOriginalExtension();
                $upload_link = base_path("public/uploads/post_photo/").$post_photo_name;
                Image::make($request->file('post_photo'))->resize(120, 120)->save($upload_link);
            }else{
                $post_photo_name = null;
            }

            Post::insert([
                'user_id' => Auth::user()->id,
                'post_content' => $request->post_content,
                'post_photo' => $post_photo_name,
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
            'post_content' => 'required',
            'post_photo' => 'nullable|image|mimes:png,jpg,jpeg',
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => 400,
                'error'=> $validator->errors()->toArray()
            ]);
        }else{
            $post->update([
                'post_content' => $request->post_content,
            ]);

            if($request->hasFile('post_photo')){
                unlink(base_path("public/uploads/post_photo/").$post->post_photo);
                $post_photo_name = "Post-Photo-".Str::random(10).".". $request->file('post_photo')->getClientOriginalExtension();
                $upload_link = base_path("public/uploads/post_photo/").$post_photo_name;
                Image::make($request->file('post_photo'))->resize(120, 120)->save($upload_link);
                $post->update([
                    'post_photo' => $post_photo_name,
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
        unlink(base_path("public/uploads/post_photo/").$post->post_photo);
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
            'comment_content' => 'required',
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
                'comment_content' => $request->comment_content,
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
    }

    public function postLikeList($id)
    {
        $allLike = Like::where('post_id', $id)->get();
        return view('frontend.post.like-list', compact('allLike'));
    }

    public function postCommentList($id)
    {
        $allComment = Comment::where('post_id', $id)->get();
        return view('frontend.post.comment-list', compact('allComment'));
    }
}
