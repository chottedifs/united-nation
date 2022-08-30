<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\CloudinaryStorage;
use App\Models\Pages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PagesController extends Controller
{
    public function index()
    {
        $page = Pages::all();

        return view('pages.admin.pages.index',[
            'pages' => $page
        ]);
    }

    public function create()
    {
        return view('pages.admin.pages.create');
    }

    public function store(Request $request)
    {
        // echo "yoloooo";
        $validatedData = $request->validate([
            'title' => 'required',
            'image_cover' => 'required|image|mimes:jpg,jpeg,png,webp,svg|file|max:1024',
        ]);

        $image = $request->file('image_cover');
        $validatedData['image_cover'] = CloudinaryStorage::upload($image->getRealPath(), $image->getClientOriginalName());
        // $validatedData['image_cover'] = $request->file('image_cover')->store('public/images/pages');

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

    public function edit($id)
    {
        $page = Pages::findOrFail($id);

        return view('pages.admin.pages.edit', [
            'page' => $page
        ]);
    }

    public function update(Request $request, $id)
    {
        $page = Pages::findOrFail($id);

        $validatedData = $request->validate([
            'title' => 'required|max:255',
        ]);

        if ($request->file('image_cover')) {
            $file = $request->file('image_cover');
            $validatedData['image_cover'] = CloudinaryStorage::replace($page->image_cover, $file->getRealPath(), $file->getClientOriginalName());
            // Storage::delete($page->image_cover);
            // $validatedData['image_cover'] = $request->file('image_cover')->store('public/images/pages');
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

        CloudinaryStorage::delete($pages->image_cover);
        // Storage::delete($pages->image_cover);

        Pages::destroy($id);
        return redirect(route('pages.index'));
    }
}
