<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Infografis;
use App\Models\Pages;
use App\Models\RelasiInfografisPages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InfografisController extends Controller
{
    public function index()
    {
        $infografis = RelasiInfografisPages::with('Pages', 'Infografis')->get();

        return view('pages.admin.infografis.index', [
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
        $pages = Pages::all();
        return view('pages.admin.infografis.create', [
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

        $validatedData2 = $request->validate([
            'image' => 'required|image|mimes:jpg,jpeg,png,webp,svg|file|max:1024',
        ]);

        $validatedData2['image'] = $request->file('image')->store('public/images/story');
        $infografis = Infografis::create($validatedData2);
        $validatedData1['infografis_id'] = $infografis->id;
        RelasiInfografisPages::create($validatedData1);
        return redirect(route('infografis.index'));
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
        $relasiInfografis = RelasiInfografisPages::with('Pages', 'Infografis')->findOrFail($id);
        $pages = Pages::all();

        return view('pages.admin.infografis.edit', [
            'relasiInfografis' => $relasiInfografis,
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
        $relasiInfografis = RelasiInfografisPages::with('Infografis')->findOrFail($id);
        $infografis = Infografis::findOrFail($relasiInfografis->Infografis->id);

        $validatedData1 = $request->validate([
            'pages_id' => 'required',
        ]);

        if ($request->file('image')) {
            $validatedData = $request->validate([
                'image' => 'image|mimes:jpg,jpeg,png,webp,svg|file|max:1024',
            ]);
            Storage::delete($infografis->image);
            $validatedData['image'] = $request->file('image')->store('public/images/story');
            $relasiInfografis->update($validatedData1);
            $infografis->update($validatedData);
        } else {
            $relasiInfografis->update($validatedData1);
        }

        return redirect(route('infografis.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $relasiInfografis = RelasiInfografisPages::findOrFail($id);
        $infografis = Infografis::findOrFail($relasiInfografis->infografis_id);
        Storage::delete($infografis->image);
        Infografis::destroy($infografis->id);
        RelasiInfografisPages::destroy($id);
        return redirect(route('infografis.index'));
    }
}
