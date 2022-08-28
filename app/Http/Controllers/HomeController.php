<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\relasiContentPages;
use App\Models\relasiStoryPages;

class HomeController extends Controller
{
    public function index()
    {
        $content = relasiContentPages::with('Pages' , 'Content')->where('pages_id', 1)->get();
        $story = relasiStoryPages::with('Pages' , 'Story')->where('pages_id', 1)->get();

        // ddd($content);

        return view('pages.home',[
            'content' => $content,
            'story' => $story,
        ]);
    }
}
