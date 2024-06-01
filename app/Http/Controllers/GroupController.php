<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Space;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $groups = Group::all();
        return view('admin.groups.index', compact('groups'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $spaces = Space::where('is_published', 1)->get();
        return view('admin.groups.create', compact('spaces'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'title_ar' => 'required|string',
            'space_id' => 'required|integer',
            'slug' => 'required|string|unique:groups,slug,NULL,id,space_id,' . $request->get('space_id'),
            'slug_ar' => 'required|string|unique:groups,slug_ar,NULL,id,space_id,' . $request->get('space_id'),
            'is_published' => 'nullable',
        ]);

        $groupData= $request->all();

        Group::create($groupData);

        return redirect()->route('groups.index')->with('success', 'Group created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Group $group)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Group $group)
    {
        $spaces = Space::where('is_published', 1)->get();
        return view('admin.groups.edit', compact('spaces','group'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Group $group)
    {
        $request->validate([
            'title' => 'required|string',
            'title_ar' => 'required|string',
            'slug' => 'required|string|unique:groups,slug,space_id' . $group->id,
            'slug_ar' => 'required|string|unique:groups,slug_ar,space_id' . $group->id,
            'space_id' => 'required|exists:spaces,id',
            'is_published' => 'nullable',
        ]);

        $groupData = $request->all();

        $group->update($groupData);

        return redirect()->route('groups.index')->with('success', 'Group updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Group $group)
    {
        $group->delete();
        return redirect()->route('groups.index')->with('success', 'Group deleted successfully');
    }
}
