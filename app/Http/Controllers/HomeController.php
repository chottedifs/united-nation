<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\relasiContentPages;
use App\Models\relasiStoryPages;
use App\Models\relasiReportPages;

class HomeController extends Controller
{
    public function index()
    {
        $content = relasiContentPages::with('Pages' , 'Content')->where('pages_id', 1)->get();
        $story = relasiStoryPages::with('Pages' , 'Story')->where('pages_id', 1)->get();
        $reportHuman = relasiReportPages::with('Pages' , 'Report')->where('pages_id', 3)->get();
        $reportEconomic = relasiReportPages::with('Pages' , 'Report')->where('pages_id', 4)->get();
        $reportGreen = relasiReportPages::with('Pages' , 'Report')->where('pages_id', 5)->get();
        $reportInnovation = relasiReportPages::with('Pages' , 'Report')->where('pages_id', 6)->get();

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
