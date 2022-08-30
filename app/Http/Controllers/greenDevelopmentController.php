<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pages;
use App\Models\relasiContentPages;
use App\Models\relasiStoryUpPages;
use App\Models\relasiStoryMiddlePages;
use App\Models\relasiInfografisPages;
use App\Models\relasiReportPages;

class greenDevelopmentController extends Controller
{
    public function index()
    {
        $page = Pages::where('id', 5)->first();
        $content = relasiContentPages::with('Pages' , 'Content')->where('pages_id', $page->id)->first();
        $storyUp = relasiStoryUpPages::with('Pages' , 'StoryUp')->where('pages_id', $page->id)->get();
        $storyMiddle = relasiStoryMiddlePages::with('Pages' , 'StoryMiddle')->where('pages_id', $page->id)->get();
        $infografis = relasiInfografisPages::with('Pages' , 'Infografis')->where('pages_id', $page->id)->get();
        $report = relasiReportPages::with('Pages' , 'Report')->where('pages_id', $page->id)->get();
        $reportHuman = relasiReportPages::with('Pages' , 'Report')->where('pages_id', 3)->get();
        $reportEconomic = relasiReportPages::with('Pages' , 'Report')->where('pages_id', 4)->get();
        $reportGreen = relasiReportPages::with('Pages' , 'Report')->where('pages_id', 5)->get();
        $reportInnovation = relasiReportPages::with('Pages' , 'Report')->where('pages_id', 6)->get();

        // ddd($content);

        return view('pages.greenDevelopment',[
            'page' => $page,
            'content' => $content,
            'storyUp' => $storyUp,
            'storyMiddle' => $storyMiddle,
            'infografis' => $infografis,
            'report' => $report,
            'reportHuman' => $reportHuman,
            'reportEconomic' => $reportEconomic,
            'reportGreen' => $reportGreen,
            'reportInnovation' => $reportInnovation
        ]);
    }
}