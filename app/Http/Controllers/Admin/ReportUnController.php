<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pages;
use App\Models\RelasiUnReportPages;
use App\Models\ReportUn;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ReportUnController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contents = RelasiUnReportPages::with('Pages', 'ReportUn')->get();
        // $contents = Content::all();

        return view('pages.admin.reportUn.index', [
            'contents' => $contents
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pages = Pages::all();
        return view('pages.admin.reportUn.create', [
            'pages' => $pages
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData1 = $request->validate([
            'pages_id' => 'required',
        ]);

        $data = $request->validate([
            'image_1' => 'nullable|mimes:jpg,jpeg,png,webp,svg|max:200',
            'image_2' => 'nullable|mimes:jpg,jpeg,png,webp,svg|max:200',
            'image_3' => 'nullable|mimes:jpg,jpeg,png,webp,svg|max:200',
            'image_4' => 'nullable|mimes:jpg,jpeg,png,webp,svg|max:200',
            'content_1' => 'required|min:100',
            'content_2' => 'nullable|min:100',
            'content_3' => 'nullable|min:100',
            'content_4' => 'nullable|min:100',
            'content_5' => 'nullable|min:100',
            'content_6' => 'nullable|min:100',
        ]);

        if ($request->file('image_1')) {
            $data['image_1'] = $request->file('image_1')->store('public/images/reportUn');
        }
        if ($request->file('image_2')) {
            $data['image_2'] = $request->file('image_2')->store('public/images/reportUn');
        }
        if ($request->file('image_3')) {
            $data['image_3'] = $request->file('image_3')->store('public/images/reportUn');
        }
        if ($request->file('image_4')) {
            $data['image_4'] = $request->file('image_4')->store('public/images/reportUn');
        }
        $reportUn = ReportUn::create($data);
        $validatedData1['reportun_id'] = $reportUn->id;
        RelasiUnReportPages::create($validatedData1);
        return redirect(route('reportUn.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ReportUn  $reportUn
     * @return \Illuminate\Http\Response
     */
    public function show(ReportUn $reportUn)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ReportUn  $reportUn
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $content = RelasiUnReportPages::with('Pages', 'ReportUn')->findOrFail($id);
        $pages = Pages::all();

        return view('pages.admin.reportUn.edit', [
            'content' => $content,
            'pages' => $pages
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ReportUn  $reportUn
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $relasiReportUn = RelasiUnReportPages::with('ReportUn')->findOrFail($id);
        $content = ReportUn::findOrFail($relasiReportUn->ReportUn->id);

        $validatedData1 = $request->validate([
            'pages_id' => 'required',
        ]);

        $data = $request->validate([
            'content_1' => 'required|min:100',
            'image_1' => 'nullable|mimes:jpg,jpeg,png,webp,svg|max:200',
            'image_2' => 'nullable|mimes:jpg,jpeg,png,webp,svg|max:200',
            'image_3' => 'nullable|mimes:jpg,jpeg,png,webp,svg|max:200',
            'image_4' => 'nullable|mimes:jpg,jpeg,png,webp,svg|max:200',
            'content_2' => 'nullable|min:100',
            'content_3' => 'nullable|min:100',
            'content_4' => 'nullable|min:100',
            'content_5' => 'nullable|min:100',
            'content_6' => 'nullable|min:100',
        ]);
        if ($request->file('image_1')) {
            Storage::delete($request->oldImage1);
            $data['image_1'] = $request->file('image_1')->store('public/images/reportUn');
        }
        if ($request->file('image_2')) {
            Storage::delete($request->oldImage2);
            $data['image_2'] = $request->file('image_2')->store('public/images/reportUn');
        }
        if ($request->file('image_3')) {
            Storage::delete($request->oldImage3);
            $data['image_3'] = $request->file('image_3')->store('public/images/reportUn');
        }
        if ($request->file('image_4')) {
            Storage::delete($request->oldImage4);
            $data['image_4'] = $request->file('image_4')->store('public/images/reportUn');
        }

        $content->update($data);
        $relasiReportUn->update($validatedData1);
        return redirect(route('reportUn.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ReportUn  $reportUn
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $relasiContent = RelasiUnReportPages::findOrFail($id);
        $content = ReportUn::findOrFail($id);

        Storage::disk('local')->delete($content->image_1);
        Storage::disk('local')->delete($content->image_2);
        Storage::disk('local')->delete($content->image_3);
        Storage::disk('local')->delete($content->image_4);

        RelasiUnReportPages::destroy($relasiContent->id);
        ReportUn::destroy($content->id);

        return redirect(route('reportUn.index'));
    }
}
