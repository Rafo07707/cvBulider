<?php

namespace App\Http\Controllers;

use App\Http\Requests\EducationCreateRequest;
use App\Models\Education;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;


class EducationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() : View
    {
        $educations = auth()->user()->education;
        return view('education.index',compact('educations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('education.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EducationCreateRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $data['user_id'] = auth()->user()->id;
        Education::create($data);
        return redirect()->route('education.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Education $education)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Education $education): View
    {
        $education = Education::find($education->id);
        return view('education.edit', compact('education'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Education $education): RedirectResponse
    {
        $education->update($request->all());
        return redirect()->route('education.index')->with('success', 'Education record updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Education $education): RedirectResponse
    {
        $education->delete();

        return redirect()->route('education.index')->with('success', 'Education record deleted successfully.');
    }
}
