<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Story;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $story = Stor::all();

        return view('pages.home',[
            'story' => $story
        ]);
    }
}
