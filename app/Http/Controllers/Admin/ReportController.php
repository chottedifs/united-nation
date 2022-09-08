<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\CloudinaryStorage;
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
        $imageCover = $request->file('image_cover');
        $image = $request->file('image');
        $data['image_cover'] = CloudinaryStorage::upload($imageCover->getRealPath(), $imageCover->getClientOriginalName());
        $data['image'] = CloudinaryStorage::upload($image->getRealPath(), $image->getClientOriginalName());
        // $data['image_cover'] = $request->file('image_cover')->store('public/images/report');
        // $data['image'] = $request->file('image')->store('public/images/report');

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

    public function update(Request $request, $id)
    {
        $relasiReport = RelasiReportPages::with('Report')->findOrFail($id);
        $report = Report::findOrFail($relasiReport->Report->id);

        $validatedData1 = $request->validate([
            'pages_id' => 'required',
        ]);
        $data = $request->validate([
            'title' => 'required|max:255',
            'image_cover' => 'nullable|mimes:jpg,jpeg,png,webp,svg|max:200',
            'image' => 'nullable|mimes:jpg,jpeg,png,webp,svg|max:200',
            'description' => 'required|min:100',
        ]);

        if ($request->file('image_cover')) {
            $fileCover = $request->file('image_cover');
            $data['image_cover'] = CloudinaryStorage::replace($report->image_cover, $fileCover->getRealPath(), $fileCover->getClientOriginalName());
            // Storage::delete($request->oldImageCover);
            // $data['image_cover'] = $request->file('image_cover')->store('public/images/report');
        }
        if ($request->file('image')) {
            $file = $request->file('image');
            $data['image'] = CloudinaryStorage::replace($report->image, $file->getRealPath(), $file->getClientOriginalName());
            // Storage::delete($request->oldImage);
            // $data['image'] = $request->file('image')->store('public/images/report');
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

        CloudinaryStorage::delete($report->image_cover);
        CloudinaryStorage::delete($report->image);
        // Storage::disk('local')->delete($report->image_cover);
        // Storage::disk('local')->delete($report->image);

        Report::destroy($report->id);
        RelasiReportPages::destroy($relasiReport->id);

        return redirect(route('report.index'));
    }
}
