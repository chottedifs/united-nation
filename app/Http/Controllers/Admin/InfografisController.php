<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\CloudinaryStorage;
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

    public function create()
    {
        $pages = Pages::all();
        return view('pages.admin.infografis.create', [
            'pages' => $pages
        ]);
    }

    public function store(Request $request)
    {
        $validatedData1 = $request->validate([
            'pages_id' => 'required',
        ]);

        $validatedData2 = $request->validate([
            'image' => 'required|image|mimes:jpg,jpeg,png,webp,svg|file|max:200',
        ]);

        $image = $request->file('image');
        $data['image'] = CloudinaryStorage::upload($image->getRealPath(), $image->getClientOriginalName());
        // $validatedData2['image'] = $request->file('image')->store('public/images/infografis');
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

    public function edit($id)
    {
        $relasiInfografis = RelasiInfografisPages::with('Pages', 'Infografis')->findOrFail($id);
        $pages = Pages::all();

        return view('pages.admin.infografis.edit', [
            'relasiInfografis' => $relasiInfografis,
            'pages' => $pages
        ]);
    }


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

            $file = $request->file('image');
            $data['image'] = CloudinaryStorage::replace($infografis->image, $file->getRealPath(), $file->getClientOriginalName());
            // Storage::delete($infografis->image);
            // $validatedData['image'] = $request->file('image')->store('public/images/infografis');
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

        CloudinaryStorage::delete($infografis->image);
        // Storage::delete($infografis->image);

        Infografis::destroy($infografis->id);
        RelasiInfografisPages::destroy($id);

        return redirect(route('infografis.index'));
    }
}
