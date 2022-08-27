<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Story;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StoryController extends Controller
{
    public function index()
    {
        $story = Story::all();

        return view('pages.admin.story.index', [
            'story' => $story
        ]);
    }

    public function create()
    {
        return view('pages.admin.story.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|max:255',
            'position' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png,webp,svg|max:200'
        ]);

        $data['image_cover'] = $request->file('image_cover')->store('public/images/story');
        $data['image_box'] = $request->file('image_box')->store('public/images/story');

        Story::create($data);
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
        $story = Story::findOrFail($id);

        return view('pages.admin.story.edit', [
            'story' => $story
        ]);
    }

    public function update(Request $request, $id)
    {
        $story = Story::findOrFail($id);

        $data = $request->validate([
            'name' => 'required|max:255',
            'position' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png,webp,svg|max:200'
        ]);

        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $data['image_cover'] = $request->file('image_cover')->store('public/images/story');
            $data['image_box'] = $request->file('image_box')->store('public/images/story');
        }


        // $image = public_path('images/story'. $story->image);

        // if(Storage::exists($story->image)){
        //     Storage::delete($image);
        // }

        $story->update($data);
        return redirect(route('story.index'));
    }

    public function destroy($id)
    {
        $story = Story::findOrFail($id);
        Storage::disk('local')->delete($story->image_cover);
        Storage::disk('local')->delete($story->image_box);
        $story->delete();

        return redirect(route('story.index'));
    }
}
