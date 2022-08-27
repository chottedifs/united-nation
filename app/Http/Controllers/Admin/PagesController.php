<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PagesController extends Controller
{
    public function index()
    {
        $pages = Pages::all();
        return view('pages.admin.pages.index', [
            'pages' => $pages
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // echo "yoloooo";
        $validatedData = $request->validate([
            'title' => 'required',
            'image_cover' => 'image|required|mimes:jpg,jpeg,png,webp,svg|file|max:1024',
        ]);

        $validatedData['image_cover'] = $request->file('image_cover')->store('public/images/story');
        Pages::create($validatedData);
        return redirect(route('pages.index'));
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
        $page = Pages::findOrFail($id);

        return view('pages.admin.pages.edit', [
            'page' => $page
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
        $page = Pages::findOrFail($id);

        $validatedData = $request->validate([
            'title' => 'required|max:255',
        ]);

        if ($request->file('image_cover')) {
            Storage::delete($page->image_cover);
            $validatedData['image_cover'] = $request->file('image_cover')->store('public/images/story');
            $page->update($validatedData);
        } else {
            $validatedData['image_cover'] = $page->image_cover;
            $page->update($validatedData);
        }

        return redirect(route('pages.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pages = Pages::findOrFail($id);
        Storage::delete($pages->image_cover);
        Pages::destroy($id);
        return redirect(route('pages.index'));
    }
}
