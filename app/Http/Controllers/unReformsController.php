<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pages;
use App\Models\relasiContentPages;
use App\Models\relasiStoryPages;
use App\Models\relasiInfografisPages;
use App\Models\relasiReportPages;

class unReformsController extends Controller
{
    public function index()
    {
        $page = Pages::where('id', 7)->first();
        $content = relasiContentPages::with('Pages' , 'Content')->where('pages_id', $page->id)->first();
        $report = relasiReportPages::with('Pages' , 'Report')->where('pages_id', $page->id)->get();
        $reportHuman = relasiReportPages::with('Pages' , 'Report')->where('pages_id', 3)->get();
        $reportEconomic = relasiReportPages::with('Pages' , 'Report')->where('pages_id', 4)->get();
        $reportGreen = relasiReportPages::with('Pages' , 'Report')->where('pages_id', 5)->get();
        $reportInnovation = relasiReportPages::with('Pages' , 'Report')->where('pages_id', 6)->get();

        // ddd($content);

        return view('pages.unReforms',[
            'page' => $page,
            'content' => $content,
            'report' => $report,
            'reportHuman' => $reportHuman,
            'reportEconomic' => $reportEconomic,
            'reportGreen' => $reportGreen,
            'reportInnovation' => $reportInnovation
        ]);
    }
}
