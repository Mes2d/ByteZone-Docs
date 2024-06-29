<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $faqs = Faq::all();
        return view('admin.faqs.index',compact('faqs'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.faqs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validatedData = $request -> validate([
            'question' => 'required|min:5',
            'question_ar' => 'required|min:5',
            'answer' => 'required|min:10',
            'answer_ar' => 'required|min:10',
        ]);

        $validatedData['published'] = $request->published;

        $created = Faq::create($validatedData);

        if($created) {
            return redirect()->to('admin/faqs')->with([
                'success' => 'Faq Created Successfully'
            ]);
        }

        abort(500);

    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Faq $faq)
    {
        return view('admin.faqs.edit',compact('faq'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Faq $faq)
    {


        $validatedData = $request -> validate([
            'question' => 'required|min:5',
            'question_ar' => 'required|min:5',
            'answer' => 'required|min:10',
            'answer_ar' => 'required|min:10',
        ]);

        $validatedData['published'] = $request->published;


        if($faq->update($validatedData)) {
            return redirect()->to('admin/faqs')->with([
                'success' => 'Faq Updated Successfully'
            ]);

        }

        abort(500);

    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Faq $faq)
    {
        if($faq->delete()) {
            return redirect()->to('admin/faqs')->with([
                'success' => 'Faq Deleted Successfully'
            ]);
        }
    }


}
