<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Requests\ExperienceCreateRequest;


class ExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() : View
    {
        $experiences = auth()->user()->experience;
        return view('experience.index',compact('experiences'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() :View
    {
        return view('experience.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ExperienceCreateRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $data['user_id'] = auth()->user()->id;
        Experience::create($data);

        return redirect()->route('experience.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Experience $experience)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Experience $experience) : View
    {
        $experience = Experience::find($experience->id);
        return view('experience.edit', compact('experience'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Experience $experience): RedirectResponse
    {
        $experience->update($request->all());
        return redirect()->route('experience.index')->with('success', 'Experience record updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Experience $experience): RedirectResponse
    {
        $experience->delete();

        return redirect()->route('experience.index')->with('success', 'Experience record deleted successfully.');
    }
}
