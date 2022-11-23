<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function view(Request $request)
    {
        $currentUser = auth()->guard()->user();

        return view('profile', compact('currentUser'));
    }

    public function edit(Request $request)
    {
        $currentUser = auth()->guard()->user();

        $this->authorize('update', $currentUser);

        return view('profile.edit', compact('currentUser'));
    }
}
