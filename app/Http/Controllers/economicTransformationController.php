<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pages;
use App\Models\RelasiContentPages;
use App\Models\RelasiStoryUpPages;
use App\Models\RelasiStoryMiddlePages;
use App\Models\RelasiInfografisPages;
use App\Models\RelasiReportPages;

class economicTransformationController extends Controller
{
    public function index()
    {
        $page = Pages::where('id', 4)->first();
        $content = RelasiContentPages::with('Pages' , 'Content')->where('pages_id', $page->id)->first();
        $storyUp = RelasiStoryUpPages::with('Pages' , 'StoryUp')->where('pages_id', $page->id)->get();
        $storyMiddle = RelasiStoryMiddlePages::with('Pages' , 'StoryMiddle')->where('pages_id', $page->id)->get();
        $infografis = RelasiInfografisPages::with('Pages' , 'Infografis')->where('pages_id', $page->id)->get();
        $report = RelasiReportPages::with('Pages' , 'Report')->where('pages_id', $page->id)->get();
        $reportHuman = RelasiReportPages::with('Pages' , 'Report')->where('pages_id', 3)->get();
        $reportEconomic = RelasiReportPages::with('Pages' , 'Report')->where('pages_id', 4)->get();
        $reportGreen = RelasiReportPages::with('Pages' , 'Report')->where('pages_id', 5)->get();
        $reportInnovation = RelasiReportPages::with('Pages' , 'Report')->where('pages_id', 6)->get();

        // ddd($infografis);

        return view('pages.economicTransformation',[
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
