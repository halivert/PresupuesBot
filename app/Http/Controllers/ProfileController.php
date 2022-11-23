<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Fortify\Fortify;

class ProfileController extends Controller
{
    public function view(Request $request)
    {
        $currentUser = auth()->guard()->user();

        return view('profile', compact('currentUser'));
    }

    public function edit(Request $request)
    {
        if (session('status') === Fortify::PROFILE_INFORMATION_UPDATED)
            return to_route('profile');

        $currentUser = auth()->guard()->user();

        $this->authorize('update', $currentUser);

        return view('profile.edit', compact('currentUser'));
    }
}
