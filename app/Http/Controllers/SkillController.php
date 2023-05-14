<?php

namespace App\Http\Controllers;

use App\Http\Requests\SkillsCreateRequest;
use App\Models\Skill;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;


class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() : View
    {
        $skills = auth()->user()->skill;

        return view('skills.index',compact('skills'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() :View
    {
        return view('skills.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SkillsCreateRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $data['user_id'] = auth()->user()->id;
        Skill::create($data);
        return redirect()->route('skills.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Skill $skill)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Skill $skill): View
    {
        $skill = Skill::find($skill->id);
        return view('skills.edit', compact('skill'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Skill $skill): RedirectResponse
    {
        $skill->update($request->all());
        return redirect()->route('skills.index')->with('success', 'Skill record updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Skill $skill): RedirectResponse
    {
        $skill->delete();

        return redirect()->route('skills.index')->with('success', 'Skill record deleted successfully.');
    }
}
