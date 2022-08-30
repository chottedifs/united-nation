<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use App\Models\RelasiReportPages;

class reportController extends Controller
{
    public function index(Request $request, $slug)
    {
        $report = Report::where('slug',$slug)->firstOrFail();
        $subReports = Report::inRandomOrder()->take(3)->get();
        $reportHuman = RelasiReportPages::with('Pages' , 'Report')->where('pages_id', 3)->get();
        $reportEconomic = RelasiReportPages::with('Pages' , 'Report')->where('pages_id', 4)->get();
        $reportGreen = RelasiReportPages::with('Pages' , 'Report')->where('pages_id', 5)->get();
        $reportInnovation = RelasiReportPages::with('Pages' , 'Report')->where('pages_id', 6)->get();

        // ddd($subReports);

        return view('pages.report',[
            'report' => $report,
            'subReport' => $subReports,
            'reportHuman' => $reportHuman,
            'reportEconomic' => $reportEconomic,
            'reportGreen' => $reportGreen,
            'reportInnovation' => $reportInnovation
        ]);
    }
}
