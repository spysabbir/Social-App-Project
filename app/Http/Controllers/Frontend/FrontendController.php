<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $allPost = Post::all();
        return view('frontend.index', compact('allPost'));
    }
}
