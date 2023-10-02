<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        return view('frontend.index');
    }

    public function profile(Request $request)
    {
        return view('frontend.profile.index', [
            'user' => $request->user(),
        ]);
    }
}
