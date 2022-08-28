<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Infografis;
use App\Models\RelasiReportInfografis;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RelasiReportInfografisController extends Controller
{
    public function index()
    {
        $infografis = RelasiReportInfografis::with('Report', 'Infografis')->get();

        return view('pages.admin.reportInfografis.index', [
            'infografis' => $infografis
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $reports = Report::all();
        return view('pages.admin.reportInfografis.create', [
            'reports' => $reports
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
            'report_id' => 'required',
        ]);

        $validatedData2 = $request->validate([
            'image' => 'required|image|mimes:jpg,jpeg,png,webp,svg|file|max:200',
        ]);

        $validatedData2['image'] = $request->file('image')->store('public/images/reportInfografis');
        $infografis = Infografis::create($validatedData2);
        $validatedData1['infografis_id'] = $infografis->id;
        RelasiReportInfografis::create($validatedData1);
        return redirect(route('reportInfografis.index'));
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $relasiInfografis = RelasiReportInfografis::with('Report', 'Infografis')->findOrFail($id);
        $reports = Report::all();

        return view('pages.admin.reportInfografis.edit', [
            'relasiInfografis' => $relasiInfografis,
            'reports' => $reports
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
        $relasiInfografis = RelasiReportInfografis::with('Infografis')->findOrFail($id);
        $infografis = Infografis::findOrFail($relasiInfografis->Infografis->id);

        $validatedData1 = $request->validate([
            'report_id' => 'required',
        ]);

        if ($request->file('image')) {
            $validatedData = $request->validate([
                'image' => 'image|mimes:jpg,jpeg,png,webp,svg|file|max:200',
            ]);
            Storage::delete($infografis->image);
            $validatedData['image'] = $request->file('image')->store('public/images/reportInfografis');
            $relasiInfografis->update($validatedData1);
            $infografis->update($validatedData);
        } else {
            $relasiInfografis->update($validatedData1);
        }

        return redirect(route('reportInfografis.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $relasiInfografis = RelasiReportInfografis::findOrFail($id);
        $infografis = Infografis::findOrFail($relasiInfografis->infografis_id);
        Storage::delete($infografis->image);
        Infografis::destroy($infografis->id);
        RelasiReportInfografis::destroy($id);
        return redirect(route('reportInfografis.index'));
    }
}
