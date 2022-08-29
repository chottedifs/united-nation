<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pages;
use App\Models\relasiContentPages;

class inReviewController extends Controller
{
    public function index()
    {
        $page = Pages::where('id', 2)->first();
        $content = relasiContentPages::with('Pages' , 'Content')->where('pages_id', $page->id)->first();

        // ddd($infografis);

        return view('pages.inReview',[
            'page' => $page,
            'content' => $content,
        ]);
    }
}
