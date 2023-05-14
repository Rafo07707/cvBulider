<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserDetailsCreateRequest;
use App\Models\UserDetail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;


class UserDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        $userDetail = UserDetail::where('user_id', auth()->user()->id)->first();

        if ($userDetail) {
            return view('user_detail.index', compact('userDetail'));
        } else {
            return redirect()->route('user-detail.create');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('user_detail.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserDetailsCreateRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $data['user_id'] = auth()->user()->id;
        UserDetail::updateOrCreate(['user_id' => auth()->user()->id], $data);
        return redirect()->route('user-detail.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(UserDetail $userDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserDetail $UserDetail): View
    {
        $userDetail = UserDetail::find($UserDetail->id);
        return view('user_detail.edit', compact('userDetail'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UserDetail $UserDetail): RedirectResponse
    {
        $UserDetail->update($request->all());
        return redirect()->route('user-detail.index')->with('success', 'UserDetail record updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserDetail $UserDetail): RedirectResponse
    {
        $UserDetail->delete();

        return redirect()->route('user-detail.index')->with('success', 'UserDetail record deleted successfully.');
    }
}
