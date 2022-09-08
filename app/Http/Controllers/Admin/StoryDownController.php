<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\CloudinaryStorage;
use Illuminate\Http\Request;
use App\Models\Pages;
use App\Models\StoryDown;
use App\Models\RelasiStoryDownPages;
use App\Models\RelasiStoryUpPages;
use App\Models\StoryUp;
use Illuminate\Support\Facades\Storage;

class StoryDownController extends Controller
{
    public function index()
    {
        $stories = RelasiStoryDownPages::with('Pages', 'StoryDown')->get();

        return view('pages.admin.storyDown.index', [
            'stories' => $stories
        ]);
    }

    public function create()
    {
        $pages = Pages::all();
        return view('pages.admin.storyDown.create', [
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

        $imageCover = $request->file('image_cover');
        $imageBox = $request->file('image_box');
        $data['image_cover'] = CloudinaryStorage::upload($imageCover->getRealPath(), $imageCover->getClientOriginalName());
        $data['image_box'] = CloudinaryStorage::upload($imageBox->getRealPath(), $imageBox->getClientOriginalName());
        // $data['image_cover'] = $request->file('image_cover')->store('public/images/storyDown');
        // $data['image_box'] = $request->file('image_box')->store('public/images/storyDown');

        $story = StoryDown::create($data);
        $validatedData1['story_down_id'] = $story->id;
        RelasiStoryDownPages::create($validatedData1);

        return redirect(route('storyDown.index'));
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
        $story = RelasiStoryDownPages::with('Pages', 'StoryDown')->findOrFail($id);
        $pages = Pages::all();

        return view('pages.admin.storyDown.edit', [
            'story' => $story,
            'pages' => $pages
        ]);
    }

    public function update(Request $request, $id)
    {
        $relasiStory = RelasiStoryDownPages::with('StoryDown')->findOrFail($id);
        $story = StoryDown::findOrFail($relasiStory->StoryDown->id);
        $validatedData1 = $request->validate([
            'pages_id' => 'required',
        ]);

        $data = $request->validate([
            'name' => 'required|max:255',
            'position' => 'required',
            'description' => 'required',
            'image_cover' => 'nullable|mimes:jpg,jpeg,png,webp,svg|max:200',
            'image_box' => 'nullable|mimes:jpg,jpeg,png,webp,svg|max:200'
        ]);

        if ($request->file('image_cover')) {
            $fileCover = $request->file('image_cover');
            $data['image_cover'] = CloudinaryStorage::replace($story->image_cover, $fileCover->getRealPath(), $fileCover->getClientOriginalName());
            // Storage::delete($request->oldImageCover);
            // $data['image_cover'] = $request->file('image_cover')->store('public/images/storyUp');
        }
        if ($request->file('image_box')) {
            $fileBox = $request->file('image_box');
            $data['image_box'] = CloudinaryStorage::replace($story->image_box, $fileBox->getRealPath(), $fileBox->getClientOriginalName());
            // Storage::delete($request->oldImageBox);
            // $data['image_box'] = $request->file('image_box')->store('public/images/storyUp');
        }
        $relasiStory->update($validatedData1);
        $story->update($data);

        // $relasiStory->update($validatedData1);
        return redirect(route('storyDown.index'));
    }

    public function destroy($id)
    {
        $relasiStory = RelasiStoryDownPages::findOrFail($id);
        $story = StoryDown::findOrFail($id);

        CloudinaryStorage::delete($story->image_cover);
        CloudinaryStorage::delete($story->image_box);
        // Storage::disk('local')->delete($story->image_cover);
        // Storage::disk('local')->delete($story->image_box);

        StoryUp::destroy($story->id);
        RelasiStoryUpPages::destroy($relasiStory->id);

        return redirect(route('storyDown.index'));
    }
}
