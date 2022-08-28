<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Content;
use App\Models\Pages;
use App\Models\RelasiContentPages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Path\To\DOMDocument;
use Intervention\Image\ImageManagerStatic as Image;

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
            'content_1' => 'required|min:100',
            'content_2' => '',
            'content_3' => '',
            'content_4' => '',
        ]);

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
            'content_2' => '',
            'content_3' => '',
            'content_4' => '',
        ]);

        $content->update($data);
        $relasiContent->update($validatedData1);
        return redirect(route('content.index'));
    }

    public function destroy($id)
    {
        $relasiContent = RelasiContentPages::findOrFail($id);
        $content = Content::findOrFail($id);

        RelasiContentPages::destroy($relasiContent->id);
        Content::destroy($content->id);

        return redirect(route('content.index'));
    }
}
