<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;

class reportController extends Controller
{
    public function index(Request $request, $id)
    {
        $report = Report::findOrFail($id);

        return view('pages.report',[
            'report' => $report
        ]);
    }
}
