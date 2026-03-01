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

        return view('resume', ['resume' => Resume::fromArray($resumeData), 'allowDownload' => true]);
    }


    /*
    public function __construct(private ResumeService $resumeService)
    {
    }

    public function index(Factory $view): View
    {
        return $view->make('resume', ['resume' => $this->resumeService->getResume(), 'allowDownload' => true]);
    }

    public function download(): Response
    {
        $resume = $this->resumeService->getResume();

        $pdf = Pdf::loadView('resume', ['resume' => $resume, 'allowDownload' => false]);

        return $pdf->download($resume->basics->name . ' Resume.pdf');
    }
    */


}
