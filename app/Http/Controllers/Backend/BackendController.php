<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Like;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class BackendController extends Controller
{
    public function dashboard()
    {
        $allUser = User::where('role', 'User')->count();
        $allPost = Post::count();
        $allComment = Comment::count();
        $allLike = Like::count();
        return view('backend.dashboard', compact('allUser', 'allPost', 'allComment', 'allLike'));
    }

    public function profile(Request $request)
    {
        return view('backend.profile.index', [
            'user' => $request->user(),
        ]);
    }

    public function profileUpdate(Request $request)
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

    public function allUser(Request $request)
    {
        if($request->ajax()){
            $all_user = "";
            $query = User::where('role', 'User');

            if($request->status){
                $query->where('users.status', $request->status);
            }

            $all_user = $query->select('users.*')->get();

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
            ->addColumn('action', function ($row) {
                $btn = '
                    <button type="button" data-id="'.$row->id.'" class="btn btn-success btn-sm viewBtn" data-bs-toggle="modal" data-bs-target="#viewModal">View</button>
                ';
                return $btn;
            })
            ->rawColumns(['status', 'action'])
            ->make(true);
        }
        return view('backend.all-user.index');
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
        return view('backend.all-user.view', compact('user'));
    }
}
