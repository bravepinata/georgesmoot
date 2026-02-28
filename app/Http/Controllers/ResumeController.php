<?php

namespace App\Http\Controllers;

use App\DataObjects\Resume;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ResumeController extends Controller
{
    public function index()
    {
        $resume = Storage::disk('local')->get('resume.json');
        // $resume = Storage::get('resume.json');
        $resumeData = json_decode($resume, true);
        // dd($resumeData); // Debug the retrieved resume data

        return view('resume.index', ['resume' => Resume::fromArray($resumeData)]);
    }
}
