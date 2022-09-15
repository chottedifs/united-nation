<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Content;
use App\Models\Pages;
use App\Models\RelasiContentPages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Admin\CloudinaryStorage;

class ContentController extends Controller
{
    public function index()
    {
        $contents = RelasiContentPages::with('Pages', 'Content')->get();
        // $contents = Content::all();

        return view('pages.admin.content.index', [
            'contents' => $contents
        ]);
    }

    public function create()
    {
        $pages = Pages::all();
        return view('pages.admin.content.create', [
            'pages' => $pages
        ]);
    }

    public function store(Request $request)
    {
        $validatedData1 = $request->validate([
            'pages_id' => 'required',
        ]);

        $data = $request->validate([
            'image_1' => 'mimes:jpg,jpeg,png,webp,svg|max:200',
            'image_2' => 'mimes:jpg,jpeg,png,webp,svg|max:200',
            'image_3' => 'mimes:jpg,jpeg,png,webp,svg|max:200',
            'image_4' => 'mimes:jpg,jpeg,png,webp,svg|max:200',
            'content_1' => 'required|min:100',
            'content_2' => 'nullable|min:100',
            'content_3' => 'nullable|min:100',
            'content_4' => 'nullable|min:100',
        ]);

        if ($request->file('image_1')) {
            $data['image_1'] = $request->file('image_1')->store('images/content', 'public');
        }
        if ($request->file('image_2')) {
            $data['image_2'] = $request->file('image_2')->store('images/content', 'public');
        }
        if ($request->file('image_3')) {
            $data['image_3'] = $request->file('image_3')->store('images/content', 'public');
        }
        if ($request->file('image_4')) {
            $data['image_4'] = $request->file('image_4')->store('images/content', 'public');
        }

        $content = Content::create($data);
        $validatedData1['content_id'] = $content->id;
        RelasiContentPages::create($validatedData1);

        return redirect(route('content.index'));
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
        $content = RelasiContentPages::with('Pages', 'Content')->findOrFail($id);
        $pages = Pages::all();

        return view('pages.admin.content.edit', [
            'content' => $content,
            'pages' => $pages
        ]);
    }

    public function update(Request $request, $id)
    {
        $relasiContent = RelasiContentPages::with('Content')->findOrFail($id);
        $content = Content::findOrFail($relasiContent->Content->id);

        $validatedData1 = $request->validate([
            'pages_id' => 'required',
        ]);

        $data = $request->validate([
            'content_1' => 'required|min:100',
            'image_1' => 'mimes:jpg,jpeg,png,webp,svg|max:200',
            'image_2' => 'mimes:jpg,jpeg,png,webp,svg|max:200',
            'image_3' => 'mimes:jpg,jpeg,png,webp,svg|max:200',
            'image_4' => 'mimes:jpg,jpeg,png,webp,svg|max:200',
            // 'content_1' => 'nullable|min:100',
            'content_2' => 'nullable|min:100',
            'content_3' => 'nullable|min:100',
            'content_4' => 'nullable|min:100',
        ]);
        if ($request->file('image_1')) {
            if($request->oldImage1){
                Storage::disk('public')->delete($request->oldImage1);
            }
            $data['image_1'] = $request->file('image_1')->store('images/content', 'public');
        }
        if ($request->file('image_2')) {
            if($request->oldImage2){
                Storage::disk('public')->delete($request->oldImage2);
            }
            $data['image_2'] = $request->file('image_2')->store('images/content', 'public');
        }
        if ($request->file('image_3')) {
            if($request->oldImage3){
                Storage::disk('public')->delete($request->oldImage3);
            }
            $data['image_3'] = $request->file('image_3')->store('images/content', 'public');
        }
        if ($request->file('image_4')) {
            if($request->oldImage4){
                Storage::disk('public')->delete($request->oldImage4);
            }
            $data['image_4'] = $request->file('image_4')->store('images/content', 'public');
        }

        $content->update($data);
        $relasiContent->update($validatedData1);
        return redirect(route('content.index'));
    }

    public function destroy($id)
    {
        $relasiContent = RelasiContentPages::findOrFail($id);
        $content = Content::findOrFail($id);

        Storage::disk('public')->delete($content->image_1);
        Storage::disk('public')->delete($content->image_2);
        Storage::disk('public')->delete($content->image_3);
        Storage::disk('public')->delete($content->image_4);

        RelasiContentPages::destroy($relasiContent->id);
        Content::destroy($content->id);

        return redirect(route('content.index'));
    }
}
