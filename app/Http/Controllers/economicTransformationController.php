<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pages;
use App\Models\relasiContentPages;
use App\Models\relasiInfografisPages;
use App\Models\relasiReportPages;

class economicTransformationController extends Controller
{
    public function index()
    {
        $page = Pages::where('id', 4)->first();
        $content = relasiContentPages::with('Pages' , 'Content')->where('pages_id', $page->id)->get();
        $infografis = relasiInfografisPages::with('Pages' , 'Infografis')->where('pages_id', $page->id)->get();
        $report = relasiReportPages::with('Pages' , 'Report')->where('pages_id', $page->id)->get();

        // ddd($report);

        return view('pages.economicTransformation',[
            'page' => $page,
            'content' => $content,
            // 'story' => $story,
            'infografis' => $infografis,
            'report' => $report,
        ]);
    }
}
