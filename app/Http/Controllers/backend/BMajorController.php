<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Major;
use Illuminate\Http\Request;

class BMajorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $majors = Major::all();
        return view('backend.major.index')
        ->with('majors',$majors);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.major.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'major_type' => 'required|unique:majors|max:10',
            'major_Des' => 'required',
        ]);

        $input=$request->all();
        Major::create($input, $validated);
        return redirect('/major')->with('flash_message','Major Added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $majors=Major::find($id);
        return view('backend.major.edit')
        ->with('majors',$majors);;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'major_type' => 'required|unique:majors|max:10',
            'major_Des' => 'required',
        ]);

        $majors=Major::find($id);
        $input=$request->all();
        $majors->update($input, $validated);

        return redirect('/major')
        ->with('flash_message','Major Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Major::destroy($id);
        return redirect('/major')
        ->with('flash_message','Major Delete!');
    }
}
