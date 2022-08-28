<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;

class reportController extends Controller
{
    public function index(Request $request, $slug)
    {
        $report = Report::where('slug',$slug)->firstOrFail();

        return view('pages.report',[
            'report' => $report
        ]);
    }
}
