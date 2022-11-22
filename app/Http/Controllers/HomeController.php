<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $currentUser = auth()->guard()->user();

        return view('home', compact('currentUser'));
    }

    public function profile(Request $request)
    {
        $currentUser = auth()->guard()->user();

        return view('profile', compact('currentUser'));
    }
}
