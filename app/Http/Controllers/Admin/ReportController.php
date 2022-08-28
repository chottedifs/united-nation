<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pages;
use App\Models\RelasiReportPages;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
// use Path\To\DOMDocument;
// use Intervention\Image\ImageManagerStatic as Image;

class ReportController extends Controller
{
    public function index()
    {
        $reports = RelasiReportPages::with('Pages', 'Report')->get();

        return view('pages.admin.report.index', [
            'reports' => $reports
        ]);
    }

    public function create()
    {
        $pages = Pages::all();
        return view('pages.admin.report.create', [
            'pages' => $pages
        ]);
    }

    public function store(Request $request)
    {
        $validatedData1 = $request->validate([
            'pages_id' => 'required',
        ]);

        $data = $request->validate([
            'title' => 'required|max:255',
            // 'slug' => 'required|max:255',
            'image_cover' => 'required|mimes:jpg,jpeg,png,webp,svg|max:200',
            'image' => 'required|mimes:jpg,jpeg,png,webp,svg|max:200',
            'description' => 'required|min:100',
        ]);

        $data['slug'] = Str::slug($request->title);
        $data['image_cover'] = $request->file('image_cover')->store('public/images/report');
        $data['image'] = $request->file('image')->store('public/images/report');

        $report = Report::create($data);
        $validatedData1['report_id'] = $report->id;
        RelasiReportPages::create($validatedData1);

        return redirect(route('report.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $report = RelasiReportPages::with('Pages', 'Report')->findOrFail($id);
        $pages = Pages::all();

        return view('pages.admin.report.edit', [
            'report' => $report,
            'pages' => $pages
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $relasiReport = RelasiReportPages::with('Report')->findOrFail($id);
        $report = Report::findOrFail($relasiReport->Report->id);

        $validatedData1 = $request->validate([
            'pages_id' => 'required',
        ]);
        $data = $request->validate([
            'title' => 'required|max:255',
            // 'slug' => 'required|max:255',
            'image_cover' => 'required|mimes:jpg,jpeg,png,webp,svg|max:200',
            'image' => 'mimes:jpg,jpeg,png,webp,svg|max:200',
            'description' => 'required|min:100',
        ]);


        if ($request->file('image_cover')) {
            Storage::delete($request->oldImageCover);
            $data['image_cover'] = $request->file('image_cover')->store('public/images/report');
        }
        if ($request->file('image')) {
            Storage::delete($request->oldImage);
            $data['image'] = $request->file('image')->store('public/images/report');
        }

        // $data['image_cover'] = $request->file('image_cover')->store('public/images/report');
        $data['slug'] = Str::slug($request->title);
        $report->update($data);
        $relasiReport->update($validatedData1);
        return redirect(route('report.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $relasiReport = RelasiReportPages::findOrFail($id);
        $report = Report::findOrFail($relasiReport->report_id);
        Storage::disk('local')->delete($report->image_cover);
        Storage::disk('local')->delete($report->image);
        Report::destroy($report->id);
        RelasiReportPages::destroy($relasiReport->id);

        return redirect(route('report.index'));
    }
}
