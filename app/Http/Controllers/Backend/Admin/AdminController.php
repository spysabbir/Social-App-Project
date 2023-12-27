<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class AdminController extends Controller
{
    public function allEditor(Request $request)
    {
        if($request->ajax()){
            $all_editor = "";
            $query = Admin::where('role', 'Editor')->select('admins.*');

            if($request->status){
                $query->where('admins.status', $request->status);
            }

            $all_editor = $query->get();

            return DataTables::of($all_editor)
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
        return view('backend.admin.all-editor.index');
    }

    public function editorStatus($id)
    {
        $editor = Admin::findOrFail($id);
        if($editor->status == "Active"){
            $editor->status = "Inactive";
        }else{
            $editor->status = "Active";
        }
        $editor->save();
    }

    public function editorView($id)
    {
        $editor = Admin::where('id', $id)->first();
        return view('backend.admin.all-editor.view', compact('editor'));
    }
}
