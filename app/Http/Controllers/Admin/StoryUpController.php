<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pages;
use App\Models\RelasiStoryPages;
use App\Models\RelasiStoryUpPages;
use App\Models\StoryUp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StoryUpController extends Controller
{
    public function index()
    {
        $stories = RelasiStoryUpPages::with('Pages', 'StoryUp')->get();

        return view('pages.admin.storyUp.index', [
            'stories' => $stories
        ]);
    }

    public function create()
    {
        $pages = Pages::all();
        return view('pages.admin.storyUp.create', [
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

        $data['image_cover'] = $request->file('image_cover')->store('public/images/storyUp');
        $data['image_box'] = $request->file('image_box')->store('public/images/storyUp');

        $story = StoryUp::create($data);
        $validatedData1['story_up_id'] = $story->id;
        RelasiStoryUpPages::create($validatedData1);

        return redirect(route('storyUp.index'));
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
        $story = RelasiStoryUpPages::with('Pages', 'StoryUp')->findOrFail($id);
        $pages = Pages::all();

        return view('pages.admin.storyUp.edit', [
            'story' => $story,
            'pages' => $pages
        ]);
    }

    public function update(Request $request, $id)
    {
        $relasiStory = RelasiStoryUpPages::with('StoryUp')->findOrFail($id);
        $story = StoryUp::findOrFail($relasiStory->StoryUp->id);
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
            $data['image_cover'] = $request->file('image_cover')->store('public/images/storyUp');
        }
        if ($request->file('image_box')) {
            Storage::delete($request->oldImageBox);
            $data['image_box'] = $request->file('image_box')->store('public/images/storyUp');
        }
        $relasiStory->update($validatedData1);
        $story->update($data);

        // $relasiStory->update($validatedData1);
        return redirect(route('storyUp.index'));
    }

    public function destroy($id)
    {
        $relasiStory = RelasiStoryUpPages::findOrFail($id);
        $story = StoryUp::findOrFail($id);

        Storage::disk('local')->delete($story->image_cover);
        Storage::disk('local')->delete($story->image_box);

        StoryUp::destroy($story->id);
        RelasiStoryUpPages::destroy($relasiStory->id);

        return redirect(route('storyUp.index'));
    }
}
