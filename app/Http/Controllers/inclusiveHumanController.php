<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pages;
use App\Models\relasiContentPages;
use App\Models\relasiStoryUpPages;
use App\Models\relasiStoryMiddlePages;
use App\Models\relasiStoryDownPages;
use App\Models\relasiInfografisPages;
use App\Models\relasiReportPages;

class inclusiveHumanController extends Controller
{
    public function index()
    {
        $page = Pages::where('id', 3)->first();
        $content = relasiContentPages::with('Pages' , 'Content')->where('pages_id', $page->id)->first();
        $storyUp = relasiStoryUpPages::with('Pages' , 'StoryUp')->where('pages_id', $page->id)->get();
        $storyMiddle = relasiStoryMiddlePages::with('Pages' , 'StoryMiddle')->where('pages_id', $page->id)->get();
        $storyDown = relasiStoryDownPages::with('Pages' , 'StoryDown')->where('pages_id', $page->id)->get();
        $infografis = relasiInfografisPages::with('Pages' , 'Infografis')->where('pages_id', $page->id)->get();
        $report = relasiReportPages::with('Pages' , 'Report')->where('pages_id', $page->id)->get();
        $reportHuman = relasiReportPages::with('Pages' , 'Report')->where('pages_id', 3)->get();
        $reportEconomic = relasiReportPages::with('Pages' , 'Report')->where('pages_id', 4)->get();
        $reportGreen = relasiReportPages::with('Pages' , 'Report')->where('pages_id', 5)->get();
        $reportInnovation = relasiReportPages::with('Pages' , 'Report')->where('pages_id', 6)->get();

        // ddd($infografis);

        return view('pages.inclusiveHuman',[
            'page' => $page,
            'content' => $content,
            'storyUp' => $storyUp,
            'storyMiddle' => $storyMiddle,
            'storyDown' => $storyDown,
            'infografis' => $infografis,
            'report' => $report,
            'reportHuman' => $reportHuman,
            'reportEconomic' => $reportEconomic,
            'reportGreen' => $reportGreen,
            'reportInnovation' => $reportInnovation
        ]);
    }
}
