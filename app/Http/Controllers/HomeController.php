<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $currentUser = auth()->guard()->user();

        $cards = $currentUser->cards;

        return view('home', compact(
            'currentUser',
            'cards',
        ));
    }
}
