<?php

namespace App\Http\Web\UserWork\Controllers;

use App\Eloquents\UserWork;
use App\Http\Web\UserWork\Requests\DownloadUserWorkRequest;
use App\Http\Web\UserWork\Services\DownloadUserWorkService;
use App\Http\Web\Controller;
use Illuminate\Support\Facades\Storage;
use Log;
use Illuminate\Support\Carbon;

class DownloadUserWorkController extends Controller
{
    public function __construct()
    {
    }

    public function __invoke(DownloadUserWorkRequest $request)
    {
        $fileName = Carbon::now();
        $fileName = str_replace(['-', ':', ' '], ['', '', ''], $fileName) . '.csv';

        $csvData = [
            'id' => $request->input('id'),
            'start_time' => $request->input('start_time'),
            'end_time' => $request->input('end_time'),
            'break_time' => $request->input('break_time'),
            'over_time' => $request->input('over_time')
        ];

        Storage::put($fileName, implode(',', array_keys($csvData)));

        $data = '';
        foreach ($csvData['id'] as $arrayKey => $arrayValue) {
            foreach ($csvData as $key => $value) {
                $conma = ',';
                if ($key == 'over_time') {
                    $conma = '';
                }
                $data .= $csvData[$key][$arrayKey] . $conma;
            }
            Storage::append($fileName, $data);
            $data = '';
        }

        return Storage::disk('local')->download($fileName);
    }
}
