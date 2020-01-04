<?php

namespace App\Http\Web\UserWork\Controllers;

use App\Eloquents\UserWork;
use App\Http\Web\UserWork\Requests\DownloadUserWorkRequest;
use App\Http\Web\UserWork\Services\DownloadUserWorkService;
use App\Http\Web\Controller;
use Illuminate\Support\Facades\Storage;
use Log;

class DownloadUserWorkController extends Controller
{
    public function __construct()
    {
    }

    public function __invoke(DownloadUserWorkRequest $request)
    {
        $fileName = 'sample.csv';
        $filePath = config('filesystems.disks.public.root') . '/' . $fileName;
        
        //TODO: レスポンスが?
        return response()->download($filePath, $fileName);
    }
}
