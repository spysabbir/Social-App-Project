<?php

namespace App\Http\Controllers\Backend\Editor;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Follower;
use App\Models\Like;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class EditorController extends Controller
{
    public function allUser(Request $request)
    {
        if($request->ajax()){
            $all_user = "";
            $query = User::select('users.*');

            if($request->status){
                $query->where('users.status', $request->status);
            }

            $all_user = $query->get();

            return DataTables::of($all_user)
            ->addIndexColumn()
            ->editColumn('status', function($row){
                if($row->status == 'Active'){
                    $status = '
                    <span class="badge bg-success">'.$row->status.'</span>
                    <button type="button" data-id="'.$row->id.'" class="btn btn-warning btn-sm statusBtn">Inactive</button>
                    ';
                }else{
                    $status = '
                    <span class="badge bg-warning">'.$row->status.'</span>
                    <button type="button" data-id="'.$row->id.'" class="btn btn-success btn-sm statusBtn">Active</button>
                    ';
                };
                return $status;
            })
            ->editColumn('last_active', function($row){
                $last_active = '
                <span class="badge bg-primary">'.date('D d-F,Y h:m:s A', strtotime($row->last_active)).'</span>
                ';
                return $last_active;
            })
            ->addColumn('action', function ($row) {
                $btn = '
                    <button type="button" data-id="'.$row->id.'" class="btn btn-success btn-sm viewBtn" data-bs-toggle="modal" data-bs-target="#viewModal">View</button>
                    <a href="'.route('backend.user.activity', $row->id).'" class="btn btn-info btn-sm" >Activity</a>
                ';
                return $btn;
            })
            ->rawColumns(['status', 'last_active', 'action'])
            ->make(true);
        }
        return view('backend.editor.user.index');
    }

    public function userStatus($id)
    {
        $user = User::findOrFail($id);
        if($user->status == "Active"){
            $user->status = "Inactive";
        }else{
            $user->status = "Active";
        }
        $user->save();
    }

    public function userView($id)
    {
        $user = User::where('id', $id)->first();
        $followerCount = Follower::where('follower_id', $id)->count();
        $followingCount = Follower::where('following_id', $id)->count();
        $postCount = Post::where('user_id', $id)->count();
        return view('backend.editor.user.view', compact('user', 'followerCount', 'followingCount', 'postCount'));
    }

    public function userActivity($id)
    {
        $user = User::where('id', $id)->first();
        $followerDetails = Follower::where('follower_id', $id)->get();
        $followingDetails = Follower::where('following_id', $id)->get();
        $postDetails = Post::where('user_id', $id)->get();
        return view('backend.editor.user.activity', compact('user', 'followerDetails', 'followingDetails', 'postDetails'));
    }

    public function allPost(Request $request)
    {
        if($request->ajax()){
            $all_post = "";
            $query = Post::leftJoin('users', 'posts.user_id', '=', 'users.id');

            if($request->status){
                $query->where('posts.status', $request->status);
            }

            $all_post = $query->select('posts.*', 'users.name')->get();

            return DataTables::of($all_post)
            ->addIndexColumn()
            ->editColumn('status', function($row){
                if($row->status == 'Active'){
                    $status = '
                    <span class="badge bg-success">'.$row->status.'</span>
                    <button type="button" data-id="'.$row->id.'" class="btn btn-warning btn-sm statusBtn">Inactive</button>
                    ';
                }else{
                    $status = '
                    <span class="badge bg-warning">'.$row->status.'</span>
                    <button type="button" data-id="'.$row->id.'" class="btn btn-success btn-sm statusBtn">Active</button>
                    ';
                };
                return $status;
            })
            ->editColumn('created_at', function($row){
                $created_at = '
                <span class="badge bg-info">'.$row->created_at->format('D d-F-Y h:m:s A').'</span>
                ';
                return $created_at;
            })
            ->addColumn('action', function ($row) {
                $btn = '
                    <a href="'.route('backend.post.view' ,$row->id).'" class="btn btn-info btn-sm viewBtn">View</a>
                ';
                return $btn;
            })
            ->rawColumns(['status', 'created_at', 'action'])
            ->make(true);
        }
        return view('backend.editor.post.index');
    }

    public function postStatus($id)
    {
        $post = Post::findOrFail($id);
        if($post->status == "Active"){
            $post->status = "Inactive";
        }else{
            $post->status = "Active";
        }
        $post->save();
    }

    public function postView($id)
    {
        $post = Post::where('id', $id)->first();
        $allLike = Like::where('post_id', $post->id)->get();
        $allComment = Comment::where('post_id', $post->id)->get();
        return view('backend.editor.post.view', compact('post', 'allLike', 'allComment'));
    }
}
