<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pages;
use App\Models\RelasiContentPages;
use App\Models\RelasiStoryPages;
use App\Models\RelasiReportPages;

class HomeController extends Controller
{
    public function index()
    {
        $page = Pages::where('id', 1)->first();
        $content = RelasiContentPages::with('Pages' , 'Content')->where('pages_id', $page->id)->first();
        $story = RelasiStoryPages::with('Pages' , 'Story')->where('pages_id', $page->id)->get();
        $reportHuman = RelasiReportPages::with('Pages' , 'Report')->where('pages_id', 3)->get();
        $reportEconomic = RelasiReportPages::with('Pages' , 'Report')->where('pages_id', 4)->get();
        $reportGreen = RelasiReportPages::with('Pages' , 'Report')->where('pages_id', 5)->get();
        $reportInnovation = RelasiReportPages::with('Pages' , 'Report')->where('pages_id', 6)->get();

        // ddd($content);

        return view('pages.home',[
            'content' => $content,
            'story' => $story,
            'reportHuman' => $reportHuman,
            'reportEconomic' => $reportEconomic,
            'reportGreen' => $reportGreen,
            'reportInnovation' => $reportInnovation
        ]);
    }
}
