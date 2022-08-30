<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use App\Models\Pages;
use App\Models\RelasiReportPages;
use App\Models\RelasiReportInfografis;

class reportController extends Controller
{
    public function index(Request $request, $slug)
    {
        $page = Pages::where('id', 3)->first();
        $report = Report::where('slug',$slug)->firstOrFail();
        $reportHuman = RelasiReportPages::with('Pages' , 'Report')->where('pages_id', 3)->get();
        $reportEconomic = RelasiReportPages::with('Pages' , 'Report')->where('pages_id', 4)->get();
        $reportGreen = RelasiReportPages::with('Pages' , 'Report')->where('pages_id', 5)->get();
        $reportInnovation = RelasiReportPages::with('Pages' , 'Report')->where('pages_id', 6)->get();
        $reportInfografis = RelasiReportInfografis::with('Report' , 'Infografis')->where('report_id', $report->id)->get();

        // ddd($reportInfografis);

        return view('pages.report',[
            'page' => $page,
            'report' => $report,
            'reportHuman' => $reportHuman,
            'reportEconomic' => $reportEconomic,
            'reportGreen' => $reportGreen,
            'reportInnovation' => $reportInnovation,
            'reportInfografis' => $reportInfografis
        ]);
    }
}
