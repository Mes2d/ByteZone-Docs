<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Space;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SpaceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $spaces = Space::all();
        return view('admin.spaces.index', compact('spaces'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $statuses = Status::all();
        $categories = Category::where('is_published', 1)->get();
        return view('admin.spaces.create',compact('categories','statuses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'name_ar' => 'required|string',
            'slug' => 'required|string|unique:spaces',
            'slug_ar' => 'required|string|unique:spaces',
            'detected_at' => 'nullable',
            'status_id' => 'required|exists:statuses,id',
            'image' => 'nullable|image',
            'category_id' => 'required|exists:categories,id',
            'is_published' => 'nullable',
        ]);



        $spaceData = $request->except('image');

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('spaces', 'public');
            $spaceData['image'] = $imagePath;
        }



        Space::create($spaceData);

        return redirect()->route('spaces.index')->with('success', 'Space created successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(Space $space)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Space $space)
    {
        $statuses = Status::all();
        $categories = Category::where('is_published', 1)->get();
        return view('admin.spaces.edit', compact('space', 'categories','statuses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Space $space)
    {
        $request->validate([
            'name' => 'required|string',
            'name_ar' => 'required|string',
            'slug' => 'required|string|unique:categories,slug,' . $space->id,
            'slug_ar' => 'required|string|unique:categories,slug_ar,' . $space->id,
            'detected_at' => 'nullable',
            'status_id' => 'required|exists:statuses,id',
            'image' => 'nullable|image',
            'category_id' => 'required|exists:categories,id',
            'is_published' => 'nullable',
        ]);

        $spaceData = $request->except('image');

        if ($request->hasFile('image')) {

            Storage::delete('public/'. $space->image);

            $imagePath = $request->file('image')->store('spaces', 'public');
            $spaceData['image'] = $imagePath;
        }

        $space->update($spaceData);

        return redirect()->route('spaces.index')->with('success', 'Space updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Space $space)
    {
        if($space->delete()) {
            Storage::delete('public/' . $space->image);
        }
        return redirect()->route('spaces.index')->with('success', 'Space deleted successfully');
    }
}
