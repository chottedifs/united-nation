<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Story;

class HomeController extends Controller
{
    public function index()
    {
        $story = Story::all();

        return view('pages.home',[
            'story' => $story
        ]);
    }
}
