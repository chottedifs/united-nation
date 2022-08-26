<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pages;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        return view('pages.admin.pages.index');
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
            'image_cover' => 'image|required|mimes:jpg,jpeg,png|file|max:1024',
        ]);

        $validatedData['image_cover'] = $request->file('image_cover')->store(
            'images',
            'public'
        );
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
