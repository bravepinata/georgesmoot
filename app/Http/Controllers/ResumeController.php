<?php

namespace App\Http\Controllers;

use App\Services\ResumeService;
use Barryvdh\DomPDF\Facade\Pdf;
use App\DataObjects\Resume;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ResumeController extends Controller
{
    public function __construct(private ResumeService $resumeService)
    {
    }

    public function index()
    {
        $resume = Storage::disk('local')->get('resume.json');
        $resumeData = json_decode($resume, true);

        return view('resume', ['resume' => Resume::fromArray($resumeData), 'allowDownload' => true]);
    }

    public function download()
    {
        $resume = $this->resumeService->getResume();

        $pdf = Pdf::loadView('resume', ['resume' => $resume, 'allowDownload' => false]);

        return $pdf->download($resume->basics->name . ' Resume.pdf');
    }
}
