<?php

namespace App\Http\Controllers;

use App\Models\Status;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $statuses = Status::all();
        return view('admin.status.index',compact('statuses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.status.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name'=> 'required',
            'name_ar'=> 'required',
            'color'=> 'required',
            'active'=> 'nullable',
        ]);

        if(Status::create($validatedData)){
            return redirect()->to('admin/statuses');
        }

        abort(500);

    }

    /**
     * Display the specified resource.
     */
    public function show(Status $status)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Status $status)
    {
        return view('admin.status.edit',compact('status'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Status $status)
    {
        $validatedData = $request->validate([
            'name'=> 'required',
            'name_ar'=> 'required',
            'color'=> 'required',
            'active'=> 'nullable',
        ]);

        if($status->update($validatedData)){
            return redirect()->to('admin/statuses');
        }

        abort(500);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Status $status)
    {
        if($status->delete()) {
            return redirect()->to('admin/statuses');
        }

        abort(500);
    }
}
