<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;

class reportController extends Controller
{
    public function index(Request $request, $slug)
    {
        $report = Report::where('slug',$slug)->firstOrFail();
        $subReports = Report::inRandomOrder()->take(3)->get();
        // $report = $dataReports->take(3);

        // ddd($subReports);

        return view('pages.report',[
            'report' => $report,
            'subReport' => $subReports,
        ]);
    }
}
