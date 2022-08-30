<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pages;
use App\Models\RelasiStoryMiddlePages;
use App\Models\StoryMiddle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StoryMiddleController extends Controller
{
    public function index()
    {
        $stories = RelasiStoryMiddlePages::with('Pages', 'StoryMiddle')->get();

        return view('pages.admin.storyMiddle.index', [
            'stories' => $stories
        ]);
    }

    public function create()
    {
        $pages = Pages::all();
        return view('pages.admin.storyMiddle.create', [
            'pages' => $pages
        ]);
    }

    public function store(Request $request)
    {
        $validatedData1 = $request->validate([
            'pages_id' => 'required',
        ]);

        $data = $request->validate([
            'name' => 'required|max:255',
            'position' => 'required',
            'description' => 'required',
            'image_cover' => 'required|mimes:jpg,jpeg,png,webp,svg|max:200',
            'image_box' => 'required|mimes:jpg,jpeg,png,webp,svg|max:200'
        ]);
        // ddd('yoloooo');

        $data['image_cover'] = $request->file('image_cover')->store('public/images/storyMiddle');
        $data['image_box'] = $request->file('image_box')->store('public/images/storyMiddle');

        $story = StoryMiddle::create($data);
        $validatedData1['story_middle_id'] = $story->id;
        RelasiStoryMiddlePages::create($validatedData1);

        return redirect(route('storyMiddle.index'));
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
        $story = RelasiStoryMiddlePages::with('Pages', 'StoryMiddle')->findOrFail($id);
        $pages = Pages::all();

        return view('pages.admin.storyMiddle.edit', [
            'story' => $story,
            'pages' => $pages
        ]);
    }

    public function update(Request $request, $id)
    {
        $relasiStory = RelasiStoryMiddlePages::with('StoryMiddle')->findOrFail($id);
        $story = StoryMiddle::findOrFail($relasiStory->StoryMiddle->id);
        $validatedData1 = $request->validate([
            'pages_id' => 'required',
        ]);

        $data = $request->validate([
            'name' => 'required|max:255',
            'position' => 'required',
            'description' => 'required',
            'image_cover' => 'mimes:jpg,jpeg,png,webp,svg|max:200',
            'image_box' => 'mimes:jpg,jpeg,png,webp,svg|max:200'
        ]);

        if ($request->file('image_cover')) {
            Storage::delete($request->oldImageCover);
            $data['image_cover'] = $request->file('image_cover')->store('public/images/storyMiddle');
        }
        if ($request->file('image_box')) {
            Storage::delete($request->oldImageBox);
            $data['image_box'] = $request->file('image_box')->store('public/images/storyMiddle');
        }
        $relasiStory->update($validatedData1);
        $story->update($data);

        // $relasiStory->update($validatedData1);
        return redirect(route('storyMiddle.index'));
    }

    public function destroy($id)
    {
        $relasiStory = RelasiStoryMiddlePages::findOrFail($id);
        $story = StoryMiddle::findOrFail($id);

        Storage::disk('local')->delete($story->image_cover);
        Storage::disk('local')->delete($story->image_box);

        StoryMiddle::destroy($story->id);
        RelasiStoryMiddlePages::destroy($relasiStory->id);

        return redirect(route('storyMiddle.index'));
    }
}