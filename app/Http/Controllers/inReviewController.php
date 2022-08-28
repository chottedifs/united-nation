<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\relasiContentPages;
use App\Models\relasiStoryPages;

class inReviewController extends Controller
{
    public function index()
    {
        $page = Pages::where('id', 2)->first();
        $content = relasiContentPages::with('Pages' , 'Content')->where('pages_id', $page->id)->get();
        $story = relasiStoryPages::with('Pages' , 'Story')->where('pages_id', $page->id)->get();

        // ddd($content);

        return view('pages.inReview',[
            'content' => $content,
            'story' => $story,
        ]);
    }
}
