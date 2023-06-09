<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class ResumeController extends Controller
{
    public  function  index() : View
    {
        $user = auth()->user();

        return view('resume',compact('user'));
    }

    public function download()
    {
        $user = auth()->user();

        $pdf = \PDF::loadView('resume', compact('user'));
        return $pdf->download('resume.pdf');
    }
}
