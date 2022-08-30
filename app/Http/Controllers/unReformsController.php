<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pages;
use App\Models\RelasiContentPages;
use App\Models\RelasiStoryPages;
use App\Models\RelasiInfografisPages;
use App\Models\RelasiReportPages;
use App\Models\RelasiUnReportPages;
use App\Models\ReportUn;

class unReformsController extends Controller
{
    public function index()
    {
        $page = Pages::where('id', 7)->first();
        $content = RelasiContentPages::with('Pages', 'Content')->where('pages_id', $page->id)->first();
        $report = RelasiReportPages::with('Pages', 'Report')->where('pages_id', $page->id)->get();
        $reportHuman = RelasiReportPages::with('Pages', 'Report')->where('pages_id', 3)->get();
        $reportEconomic = RelasiReportPages::with('Pages', 'Report')->where('pages_id', 4)->get();
        $reportGreen = RelasiReportPages::with('Pages', 'Report')->where('pages_id', 5)->get();
        $reportInnovation = RelasiReportPages::with('Pages', 'Report')->where('pages_id', 6)->get();
        $reportUn = RelasiUnReportPages::all();

        // ddd($content);

        return view('pages.unReforms', [
            'page' => $page,
            'content' => $content,
            'report' => $report,
            'reportHuman' => $reportHuman,
            'reportEconomic' => $reportEconomic,
            'reportGreen' => $reportGreen,
            'reportInnovation' => $reportInnovation,
            'reportUns' => $reportUn
        ]);
    }

    public function detailReport($slug)
    {
        $page = Pages::where('id', 7)->first();
        $content = RelasiContentPages::with('Pages', 'Content')->where('pages_id', $page->id)->first();
        $report = RelasiReportPages::with('Pages', 'Report')->where('pages_id', $page->id)->get();
        $reportHuman = RelasiReportPages::with('Pages', 'Report')->where('pages_id', 3)->get();
        $reportEconomic = RelasiReportPages::with('Pages', 'Report')->where('pages_id', 4)->get();
        $reportGreen = RelasiReportPages::with('Pages', 'Report')->where('pages_id', 5)->get();
        $reportInnovation = RelasiReportPages::with('Pages', 'Report')->where('pages_id', 6)->get();

        $unReport = ReportUn::where('slug', $slug)->first();
        return view('pages.detailReportUnReforms', [
            'page' => $page,
            'content' => $content,
            'report' => $report,
            'reportHuman' => $reportHuman,
            'reportEconomic' => $reportEconomic,
            'reportGreen' => $reportGreen,
            'reportInnovation' => $reportInnovation,
            'unReports' => $unReport
        ]);
    }
}
