<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Page;
use App\Models\Space;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pages = Page::all();
        return view('admin.pages.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $spaces = Space::where('is_published', 1)->get();
        return view('admin.pages.create', compact('spaces'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'title_ar' => 'required|string',
            'slug' => 'required|string|unique:pages,slug,NULL,id,group_id,' . $request->get('group_id'),
            'slug_ar' => 'required|string|unique:pages,slug_ar,NULL,id,group_id,' . $request->get('group_id'),
            'description' => 'nullable|string',
            'content' => 'required|string',
            'content_ar' => 'required|string',
            'group_id' => 'required|exists:groups,id',
            'description_ar' => 'nullable|string',
            'cover' => 'nullable|image',
            'is_published' => 'nullable',
        ]);

        $pageData = $request->except('cover');

        if ($request->hasFile('cover')) {
            $imagePath = $request->file('cover')->store('pages', 'public');
            $pageData['cover'] = $imagePath;
        }

        Page::create($pageData);
        return redirect()->route('pages.index')->with('success', 'Page created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Page $page)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Page $page)
    {
        $groups = Group::where('is_published', 1)->get();
        return view('admin.pages.edit', compact('page', 'groups'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Page $page)
    {
        $request->validate([
            'title' => 'required|string',
            'title_ar' => 'required|string',
            'slug' => 'required|string|unique:pages,slug,NULL,id,group_id,' . $request->get('group_id'),
            'slug_ar' => 'required|string|unique:pages,slug_ar,NULL,id,group_id,' . $request->get('group_id'),
            'description' => 'nullable|string',
            'content' => 'required|string',
            'content_ar' => 'required|string',
            'group_id' => 'required|exists:groups,id',
            'description_ar' => 'nullable|string',
            'cover' => 'nullable|image',
            'is_published' => 'nullable',
        ]);

        $pageData = $request->except('cover');

        if ($request->hasFile('cover')) {

            Storage::delete('public/'. $page->cover);

            $imagePath = $request->file('cover')->store('pages', 'public');
            $pageData['cover'] = $imagePath;
        }

        Page::update($pageData);
        return redirect()->route('pages.index')->with('success', 'Page updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Page $page)
    {
        if($page->delete()) {
            Storage::delete('public/' . $page->cover);
        }
        return redirect()->route('pages.index')->with('success', 'Page deleted successfully');
    }
}
