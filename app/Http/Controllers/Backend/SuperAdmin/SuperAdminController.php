<?php

namespace App\Http\Controllers\Backend\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class SuperAdminController extends Controller
{
    public function allAdmin(Request $request)
    {
        if($request->ajax()){
            $all_admin = "";
            $query = Admin::where('role', 'Admin')->select('admins.*');

            if($request->role){
                $query->where('admins.role', $request->role);
            }
            if($request->status){
                $query->where('admins.status', $request->status);
            }

            $all_admin = $query->get();

            return DataTables::of($all_admin)
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
            ->editColumn('role', function($row){
                if($row->role == 'Admin'){
                    $role = '
                    <span class="badge bg-success">'.$row->role.'</span>
                    ';
                }else{
                    $role = '
                    <span class="badge bg-warning">'.$row->role.'</span>
                    ';
                };
                return $role;
            })
            ->addColumn('action', function ($row) {
                $btn = '
                    <button type="button" data-id="'.$row->id.'" class="btn btn-success btn-sm viewBtn" data-bs-toggle="modal" data-bs-target="#viewModal">View</button>
                ';
                return $btn;
            })
            ->rawColumns(['status', 'role', 'action'])
            ->make(true);
        }
        return view('backend.super-admin.admin.index');
    }

    public function adminStatus($id)
    {
        $admin = Admin::findOrFail($id);
        if($admin->status == "Active"){
            $admin->status = "Inactive";
        }else{
            $admin->status = "Active";
        }
        $admin->save();
    }

    public function adminView($id)
    {
        $admin = Admin::where('id', $id)->first();
        return view('backend.super-admin.admin.view', compact('admin'));
    }
}
