<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class BackendController extends Controller
{
    public function dashboard()
    {
        return view('backend.dashboard');
    }

    public function profile(Request $request)
    {
        return view('backend.profile.index', [
            'user' => $request->user(),
        ]);
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
