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
            'content_2' => 'required|min:100',
            // 'content_3' => 'required|min:100',
            // 'content_4' => 'required|min:100',
        ]);

        $storage_description = 'storage/images/master-content';

        if($request->content_1 && $request->content_2){
            $dom1 = new \DOMDocument();
            $dom2 = new \DOMDocument();
            libxml_use_internal_errors(true);
            $dom1->loadHTML($request->content_1, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NOIMPLIED);
            $dom2->loadHTML($request->content_2, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NOIMPLIED);
            // $dom3->loadHTML($request->content_3, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NOIMPLIED);
            // $dom4->loadHTML($request->content_4, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NOIMPLIED);
            libxml_clear_errors();
            $image1 = $dom1->getElementsByTagName('img');
            $image2 = $dom2->getElementsByTagName('img');
            foreach ($image1 as $img1) {
                $src1 = $img1->getAttribute('src');
                if (preg_match('/data:image/', $src1)) {
                    preg_match('/data:image\/(?<mime>.*?)\;/', $src1, $groups);
                    $mimetype1 = $groups['mime'];
                    $fileNameContent1 = uniqid();
                    $fileNameContentRand1 = substr(md5($fileNameContent1), 6, 6) . '_' . time();
                    $filepath1 = ("$storage_description/$fileNameContentRand1.$mimetype1");
                    $images1 = Image::make($src1)->resize(1200, 1200)->encode($mimetype1, 100)->save(public_path($filepath1));
                    $new_src1 = asset($filepath);
                    $img1->removeAttribute('src');
                    $img1->setAttribute('src', $new_src1);
                    $img1->setAttribute('class', 'img-responsive');
                }
            }
            foreach ($image2 as $img2) {
                $src2 = $img2->getAttribute('src');
                if (preg_match('/data:image/', $src2)) {
                    preg_match('/data:image\/(?<mime>.*?)\;/', $src2, $groups);
                    $mimetype2 = $groups['mime'];
                    $fileNameContent2 = uniqid();
                    $fileNameContentRand2 = substr(md5($fileNameContent2), 6, 6) . '_' . time();
                    $filepath2 = ("$storage_description/$fileNameContentRand2.$mimetype2");
                    $images2 = Image::make($src2)->resize(1200, 1200)->encode($mimetype2, 100)->save(public_path($filepath2));
                    $new_src2 = asset($filepath2);
                    $img2->removeAttribute('src');
                    $img2->setAttribute('src', $new_src2);
                    $img2->setAttribute('class', 'img-responsive');
                }
            }
            $data['content_1'] = $dom1->saveHTML();
            $data['content_2'] = $dom2->saveHTML();
            $data['content_3'] = $request->content_3;
            $data['content_4'] = $request->content_4;
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
            'content_2' => 'required|min:100',
            // 'content_3' => 'required|min:100',
            // 'content_4' => 'required|min:100',
        ]);

        $storage_description = 'storage/images/master-content';

        if($request->content_1 && $request->content_2){
            $dom1 = new \DOMDocument();
            $dom2 = new \DOMDocument();
            libxml_use_internal_errors(true);
            $dom1->loadHTML($request->content_1, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NOIMPLIED);
            $dom2->loadHTML($request->content_2, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NOIMPLIED);
            libxml_clear_errors();
            $image1 = $dom1->getElementsByTagName('img');
            $image2 = $dom2->getElementsByTagName('img');
            foreach ($image1 as $img1) {
                $src1 = $img1->getAttribute('src');
                if (preg_match('/data:image/', $src1)) {
                    preg_match('/data:image\/(?<mime>.*?)\;/', $src1, $groups);
                    $mimetype1 = $groups['mime'];
                    $fileNameContent1 = uniqid();
                    $fileNameContentRand1 = substr(md5($fileNameContent1), 6, 6) . '_' . time();
                    $filepath1 = ("$storage_description/$fileNameContentRand1.$mimetype1");
                    $images1 = Image::make($src1)->resize(1200, 1200)->encode($mimetype1, 100)->save(public_path($filepath1));
                    $new_src1 = asset($filepath);
                    $img1->removeAttribute('src');
                    $img1->setAttribute('src', $new_src1);
                    $img1->setAttribute('class', 'img-responsive');
                }
            }
            foreach ($image2 as $img2) {
                $src2 = $img2->getAttribute('src');
                if (preg_match('/data:image/', $src2)) {
                    preg_match('/data:image\/(?<mime>.*?)\;/', $src2, $groups);
                    $mimetype2 = $groups['mime'];
                    $fileNameContent2 = uniqid();
                    $fileNameContentRand2 = substr(md5($fileNameContent2), 6, 6) . '_' . time();
                    $filepath2 = ("$storage_description/$fileNameContentRand2.$mimetype2");
                    $images2 = Image::make($src2)->resize(1200, 1200)->encode($mimetype2, 100)->save(public_path($filepath2));
                    $new_src2 = asset($filepath2);
                    $img2->removeAttribute('src');
                    $img2->setAttribute('src', $new_src2);
                    $img2->setAttribute('class', 'img-responsive');
                }
            }
            $data['content_1'] = $dom1->saveHTML();
            $data['content_2'] = $dom2->saveHTML();
            $data['content_3'] = $request->content_3;
            $data['content_4'] = $request->content_4;
        }

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
