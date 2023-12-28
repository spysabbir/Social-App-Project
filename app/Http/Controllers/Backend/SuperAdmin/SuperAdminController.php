<?php

namespace App\Http\Controllers\Backend\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class SuperAdminController extends Controller
{
    public function allStaff(Request $request)
    {
        if($request->ajax()){
            $all_staff = "";
            $query = Admin::where('role', '!=', 'Super Admin')->select('admins.*');

            if($request->role){
                $query->where('admins.role', $request->role);
            }
            if($request->status){
                $query->where('admins.status', $request->status);
            }

            $all_staff = $query->get();

            return DataTables::of($all_staff)
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
        return view('backend.super-admin.all-staff.index');
    }

    public function staffStatus($id)
    {
        $staff = Admin::findOrFail($id);
        if($staff->status == "Active"){
            $staff->status = "Inactive";
        }else{
            $staff->status = "Active";
        }
        $staff->save();
    }

    public function staffView($id)
    {
        $staff = Admin::where('id', $id)->first();
        return view('backend.super-admin.all-staff.view', compact('staff'));
    }
}
