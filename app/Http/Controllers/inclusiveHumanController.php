<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\relasiContentPages;
use App\Models\relasiStoryPages;
use App\Models\relasiInfografisPages;
use App\Models\relasiReportPages;

class inclusiveHumanController extends Controller
{
    public function index()
    {
        $content = relasiContentPages::with('Pages' , 'Content')->where('pages_id', 2)->get();
        $story = relasiStoryPages::with('Pages' , 'Story')->where('pages_id', 2)->get();
        $infografis = relasiInfografisPages::with('Pages' , 'Infografis')->where('pages_id', 2)->get();
        $report = relasiReportPages::with('Pages' , 'Report')->where('pages_id', 2)->get();

        // ddd($report);

        return view('pages.inclusiveHuman',[
            'content' => $content,
            'story' => $story,
            'infografis' => $infografis,
            'report' => $report,
        ]);
    }
}
