<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pages;
use App\Models\RelasiContentPages;
use App\Models\RelasiStoryUpPages;
// use App\Models\RelasiStoryMiddlePages;
// use App\Models\RelasiInfografisPages;
use App\Models\RelasiReportPages;

class innovationAccelerateController extends Controller
{
    public function index()
    {
        $page = Pages::where('id', 6)->first();
        $content = RelasiContentPages::with('Pages' , 'Content')->where('pages_id', $page->id)->first();
        $storyUp = RelasiStoryUpPages::with('Pages' , 'StoryUp')->where('pages_id', $page->id)->get();
        $report = RelasiReportPages::with('Pages' , 'Report')->where('pages_id', $page->id)->get();
        $reportHuman = RelasiReportPages::with('Pages' , 'Report')->where('pages_id', 3)->get();
        $reportEconomic = RelasiReportPages::with('Pages' , 'Report')->where('pages_id', 4)->get();
        $reportGreen = RelasiReportPages::with('Pages' , 'Report')->where('pages_id', 5)->get();
        $reportInnovation = RelasiReportPages::with('Pages' , 'Report')->where('pages_id', 6)->get();

        // ddd($content);

        return view('pages.innovationAccelerate',[
            'page' => $page,
            'content' => $content,
            'storyUp' => $storyUp,
            'report' => $report,
            'reportHuman' => $reportHuman,
            'reportEconomic' => $reportEconomic,
            'reportGreen' => $reportGreen,
            'reportInnovation' => $reportInnovation
        ]);
    }
}
