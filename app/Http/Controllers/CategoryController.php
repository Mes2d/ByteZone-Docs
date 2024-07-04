<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'name_ar' => 'required|string',
            'slug' => 'required|string|unique:categories',
            'slug_ar' => 'required|string|unique:categories',
            'description' => 'nullable|string',
            'description_ar' => 'nullable|string',
            'image' => 'nullable|image', // png,gif,jpeg,
            'is_published' => 'nullable',
        ]);

        $categoryData = $request->except('image');

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('categories', 'public');
            $categoryData['image'] = $imagePath;
        }

        Category::create($categoryData);
        return redirect()->route('categories.index')->with('success', 'Category created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string',
            'name_ar' => 'required|string',
            'slug' => 'required|string|unique:categories,slug,' . $category->id,
            'slug_ar' => 'required|string|unique:categories,slug_ar,' . $category->id,
            'description' => 'nullable|string',
            'description_ar' => 'nullable|string',
            'image' => 'nullable|image',
            'is_published' => 'nullable',
        ]);

        $categoryData = $request->except('image');

        if ($request->hasFile('image')) {

            Storage::delete('public/'. $category->image);

            $imagePath = $request->file('image')->store('categories', 'public');
            $categoryData['image'] = $imagePath;
        }

        $category->update($categoryData);

        return redirect()->route('categories.index')->with('success', 'Category updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        if($category->delete()) {
            Storage::delete('public/' . $category->image);
        }
        return redirect()->route('categories.index')->with('success', 'Category deleted successfully');
    }
}
