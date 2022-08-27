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
        $contents = Content::all();

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
            'content_2' => 'required|min:100',
            'content_3' => 'required|min:100',
            'content_4' => 'required|min:100',
        ]);

        $storage_description = 'storage/images/master-content';
        $dom1 = new \DOMDocument();
        libxml_use_internal_errors(true);
        $dom1->loadHTML($request->content_1, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NOIMPLIED);
        libxml_clear_errors();
        $image1 = $dom1->getElementsByTagName('img');
        foreach ($image1 as $img1) {
            $src1 = $img1->getAttribute('src');
            if (preg_match('/data:image/', $src)) {
                preg_match('/data:image\/(?<mime>.*?)\;/', $src, $groups);
                $mimetype1 = $groups['mime'];
                $fileNameContent1 = uniqid();
                $fileNameContentRand1 = substr(md5($fileNameContent), 6, 6) . '_' . time();
                $filepath1 = ("$storage_description/$fileNameContentRand.$mimetype");
                $images1 = Image::make($src)->resize(1200, 1200)->encode($mimetype, 100)->save(public_path($filepath));
                $new_src1 = asset($filepath);
                $img1->removeAttribute('src');
                $img1->setAttribute('src', $new_src);
                $img1->setAttribute('class', 'img-responsive');
            }
        }

        $data['content_1'] = $dom->saveHTML();
        $data['content_2'] = $dom->saveHTML();
        $data['content_3'] = $dom->saveHTML();
        $data['content_4'] = $dom->saveHTML();

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
        $content = Content::findOrFail($relasiContent->Report->id);

        $validatedData1 = $request->validate([
            'pages_id' => 'required',
        ]);

        $data = $request->validate([
            'content_1' => 'required|min:100',
            'content_2' => 'required|min:100',
            'content_3' => 'required|min:100',
            'content_4' => 'required|min:100',
        ]);

        if ($request->content_1) {
            $storage_description = 'storage/images/master-content';
            $dom = new \DOMDocument();
            libxml_use_internal_errors(true);
        }

        $dom->loadHTML($request->content_1, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NOIMPLIED);
        $dom->loadHTML($request->content_2, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NOIMPLIED);
        libxml_clear_errors();
        $image = $dom->getElementsByTagName('img');
        foreach ($image as $img) {
            $src = $img->getAttribute('src');
            if (preg_match('/data:image/', $src)) {
                preg_match('/data:image\/(?<mime>.*?)\;/', $src, $groups);
                $mimetype = $groups['mime'];
                $fileNameContent = uniqid();
                $fileNameContentRand = substr(md5($fileNameContent), 6, 6) . '_' . time();
                $filepath = ("$storage_description/$fileNameContentRand.$mimetype");
                $images = Image::make($src)->resize(1200, 1200)->encode($mimetype, 100)->save(public_path($filepath));
                $new_src = asset($filepath);
                $img->removeAttribute('src');
                $img->setAttribute('src', $new_src);
                $img->setAttribute('class', 'img-responsive');
            }
        }

        $data['content_1'] = $dom->saveHTML();
        $data['content_2'] = $dom->saveHTML();
        $data['content_3'] = $dom->saveHTML();
        $data['content_4'] = $dom->saveHTML();

        $content->update($data);
        $relasiContent->update($validatedData1);
        return redirect(route('content.index'));
    }

    public function destroy($id)
    {
        $relasiContent = RelasiContentPages::findOrFail($id);
        $content = Content::findOrFail($relasiContent->content_id);
        RelasiContentPages::destroy($relasiContent->id);
        Content::destroy($content);

        return redirect(route('content.index'));
    }
}
