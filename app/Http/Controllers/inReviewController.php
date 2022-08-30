<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pages;
use App\Models\RelasiContentPages;
use App\Models\RelasiReportPages;

class inReviewController extends Controller
{
    public function index()
    {
        $page = Pages::where('id', 2)->first();
        $content = RelasiContentPages::with('Pages' , 'Content')->where('pages_id', $page->id)->first();
        $reportHuman = RelasiReportPages::with('Pages' , 'Report')->where('pages_id', 3)->get();
        $reportEconomic = RelasiReportPages::with('Pages' , 'Report')->where('pages_id', 4)->get();
        $reportGreen = RelasiReportPages::with('Pages' , 'Report')->where('pages_id', 5)->get();
        $reportInnovation = RelasiReportPages::with('Pages' , 'Report')->where('pages_id', 6)->get();

        // ddd($infografis);

        return view('pages.inReview',[
            'page' => $page,
            'content' => $content,
            'reportHuman' => $reportHuman,
            'reportEconomic' => $reportEconomic,
            'reportGreen' => $reportGreen,
            'reportInnovation' => $reportInnovation
        ]);
    }
}
