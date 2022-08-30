<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\CloudinaryStorage;
use App\Models\Pages;
use App\Models\RelasiStoryPages;
use App\Models\Story;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StoryController extends Controller
{
    public function index()
    {
        $stories = RelasiStoryPages::with('Pages', 'Story')->get();

        return view('pages.admin.story.index', [
            'stories' => $stories
        ]);
    }

    public function create()
    {
        $pages = Pages::all();
        return view('pages.admin.story.create', [
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
        // $data['image_cover'] = $request->file('image_cover')->store('public/images/story');
        // $data['image_box'] = $request->file('image_box')->store('public/images/story');

        $story = Story::create($data);
        $validatedData1['story_id'] = $story->id;
        RelasiStoryPages::create($validatedData1);

        return redirect(route('story.index'));
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
        $story = RelasiStoryPages::with('Pages', 'Story')->findOrFail($id);
        $pages = Pages::all();

        return view('pages.admin.story.edit', [
            'story' => $story,
            'pages' => $pages
        ]);
    }

    public function update(Request $request, $id)
    {
        $relasiStory = RelasiStoryPages::with('Story')->findOrFail($id);
        $story = Story::findOrFail($relasiStory->Story->id);
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
            $fileCover = $request->file('image_cover');
            $data['image_cover'] = CloudinaryStorage::replace($story->image_cover, $fileCover->getRealPath(), $fileCover->getClientOriginalName());
            // Storage::delete($request->oldImageCover);
            // $data['image_cover'] = $request->file('image_cover')->store('public/images/story');
        }
        if ($request->file('image_box')) {
            $fileBox = $request->file('image_box');
            $data['image_box'] = CloudinaryStorage::replace($story->image_box, $fileBox->getRealPath(), $fileBox->getClientOriginalName());
            // Storage::delete($request->oldImageBox);
            // $data['image_box'] = $request->file('image_box')->store('public/images/story');
        }
        $relasiStory->update($validatedData1);
        $story->update($data);

        // $relasiStory->update($validatedData1);
        return redirect(route('story.index'));
    }

    public function destroy($id)
    {
        $relasiStory = RelasiStoryPages::findOrFail($id);
        $story = Story::findOrFail($id);

        CloudinaryStorage::delete($story->image_cover);
        CloudinaryStorage::delete($story->image_box);
        // Storage::disk('local')->delete($story->image_cover);
        // Storage::disk('local')->delete($story->image_box);

        Story::destroy($story->id);
        RelasiStoryPages::destroy($relasiStory->id);

        return redirect(route('story.index'));
    }
}
