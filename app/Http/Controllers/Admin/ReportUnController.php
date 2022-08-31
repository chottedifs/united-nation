<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pages;
use App\Models\RelasiUnReportPages;
use App\Http\Controllers\Admin\CloudinaryStorage;
use App\Models\ReportUn;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ReportUnController extends Controller
{
    public function index()
    {
        $contents = RelasiUnReportPages::with('Pages', 'ReportUn')->get();
        // $contents = Content::all();

        return view('pages.admin.reportUn.index', [
            'contents' => $contents
        ]);
    }

    public function create()
    {
        $pages = Pages::all()->last();
        return view('pages.admin.reportUn.create', [
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
            'image_1' => 'nullable|mimes:jpg,jpeg,png,webp,svg|max:200',
            'image_2' => 'nullable|mimes:jpg,jpeg,png,webp,svg|max:200',
            'image_3' => 'nullable|mimes:jpg,jpeg,png,webp,svg|max:200',
            'image_4' => 'nullable|mimes:jpg,jpeg,png,webp,svg|max:200',
            'image_5' => 'nullable|mimes:jpg,jpeg,png,webp,svg|max:200',
            'content_1' => 'required|min:50',
            'content_2' => 'nullable|min:50',
            'content_3' => 'nullable|min:50',
            'content_4' => 'nullable|min:50',
            'content_5' => 'nullable|min:50',
            'content_6' => 'nullable|min:50',
        ]);
        $data['slug'] = Str::slug($request->title);
        if ($request->file('image_1')) {
            $image = $request->file('image_1');
            $data['image'] = CloudinaryStorage::upload($image->getRealPath(), $image->getClientOriginalName());
            // $data['image_1'] = $request->file('image_1')->store('public/images/reportUn');
        }
        if ($request->file('image_2')) {
            $image = $request->file('image_2');
            $data['image_2'] = CloudinaryStorage::upload($image->getRealPath(), $image->getClientOriginalName());
            // $data['image_2'] = $request->file('image_2')->store('public/images/reportUn');
        }
        if ($request->file('image_3')) {
            $image = $request->file('image_3');
            $data['image_3'] = CloudinaryStorage::upload($image->getRealPath(), $image->getClientOriginalName());
            // $data['image_3'] = $request->file('image_3')->store('public/images/reportUn');
        }
        if ($request->file('image_4')) {
            $image = $request->file('image_4');
            $data['image_4'] = CloudinaryStorage::upload($image->getRealPath(), $image->getClientOriginalName());
            // $data['image_4'] = $request->file('image_4')->store('public/images/reportUn');
        }
        if ($request->file('image_5')) {
            $image = $request->file('image_5');
            $data['image_5'] = CloudinaryStorage::upload($image->getRealPath(), $image->getClientOriginalName());
            // $data['image_5'] = $request->file('image_5')->store('public/images/reportUn');
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

    public function edit($id)
    {
        $content = RelasiUnReportPages::with('Pages', 'ReportUn')->findOrFail($id);
        $pages = Pages::all();

        return view('pages.admin.reportUn.edit', [
            'content' => $content,
            'pages' => $pages
        ]);
    }


    public function update(Request $request, $id)
    {
        $relasiReportUn = RelasiUnReportPages::with('ReportUn')->findOrFail($id);
        $content = ReportUn::findOrFail($relasiReportUn->ReportUn->id);

        $validatedData1 = $request->validate([
            'pages_id' => 'required',
        ]);

        $data = $request->validate([
            'title' => 'required|max:255',
            'content_1' => 'required|min:50',
            'image_1' => 'nullable|mimes:jpg,jpeg,png,webp,svg|max:200',
            'image_2' => 'nullable|mimes:jpg,jpeg,png,webp,svg|max:200',
            'image_3' => 'nullable|mimes:jpg,jpeg,png,webp,svg|max:200',
            'image_4' => 'nullable|mimes:jpg,jpeg,png,webp,svg|max:200',
            'image_5' => 'nullable|mimes:jpg,jpeg,png,webp,svg|max:200',
            'content_2' => 'nullable|min:50',
            'content_3' => 'nullable|min:50',
            'content_4' => 'nullable|min:50',
            'content_5' => 'nullable|min:50',
            'content_6' => 'nullable|min:50',
        ]);
        if ($request->file('image_1')) {
            $fileCover = $request->file('image_1');
            $data['image_1'] = CloudinaryStorage::replace($content->image_1, $fileCover->getRealPath(), $fileCover->getClientOriginalName());
            // Storage::delete($request->oldImage1);
            // $data['image_1'] = $request->file('image_1')->store('public/images/reportUn');
        }
        if ($request->file('image_2')) {
            $fileCover = $request->file('image_2');
            $data['image_2'] = CloudinaryStorage::replace($content->image_2, $fileCover->getRealPath(), $fileCover->getClientOriginalName());
            // Storage::delete($request->oldImage2);
            // $data['image_2'] = $request->file('image_2')->store('public/images/reportUn');
        }
        if ($request->file('image_3')) {
            $fileCover = $request->file('image_3');
            $data['image_3'] = CloudinaryStorage::replace($content->image_3, $fileCover->getRealPath(), $fileCover->getClientOriginalName());
            // Storage::delete($request->oldImage3);
            // $data['image_3'] = $request->file('image_3')->store('public/images/reportUn');
        }
        if ($request->file('image_4')) {
            $fileCover = $request->file('image_4');
            $data['image_4'] = CloudinaryStorage::replace($content->image_4, $fileCover->getRealPath(), $fileCover->getClientOriginalName());
            // Storage::delete($request->oldImage4);
            // $data['image_4'] = $request->file('image_4')->store('public/images/reportUn');
        }
        if ($request->file('image_5')) {
            $fileCover = $request->file('image_5');
            $data['image_5'] = CloudinaryStorage::replace($content->image_5, $fileCover->getRealPath(), $fileCover->getClientOriginalName());
            // Storage::delete($request->oldImage5);
            // $data['image_5'] = $request->file('image_5')->store('public/images/reportUn');
        }

        $data['slug'] = Str::slug($request->title);
        $content->update($data);
        $relasiReportUn->update($validatedData1);
        return redirect(route('reportUn.index'));
    }


    public function destroy($id)
    {
        $relasiContent = RelasiUnReportPages::findOrFail($id);
        $content = ReportUn::findOrFail($id);

        CloudinaryStorage::delete($ontent->image_1);
        CloudinaryStorage::delete($ontent->image_2);
        CloudinaryStorage::delete($ontent->image_3);
        CloudinaryStorage::delete($ontent->image_4);
        // Storage::disk('local')->delete($content->image_1);
        // Storage::disk('local')->delete($content->image_2);
        // Storage::disk('local')->delete($content->image_3);
        // Storage::disk('local')->delete($content->image_4);
        // Storage::disk('local')->delete($content->image_5);

        RelasiUnReportPages::destroy($relasiContent->id);
        ReportUn::destroy($content->id);

        return redirect(route('reportUn.index'));
    }
}
