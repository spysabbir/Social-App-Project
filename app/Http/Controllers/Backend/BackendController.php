<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
}
