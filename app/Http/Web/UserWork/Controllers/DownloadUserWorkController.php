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

        //カンマ区切りでキーを登録
        Storage::put($fileName, implode(',', array_keys($csvData)));

        $data = '';

        //idの数だけ回す(28~31回分)
        foreach ($csvData['id'] as $arrayKey => $arrayValue) {
            //5回回す
            foreach ($csvData as $key => $value) {
                $conma = ',';
                //最後の要素にカンマは付けないで\nを入れる
                if ($key === array_key_last($csvData)) {
                    $conma = "\n";
                }

                if (!preg_match('/[0-9]{2}:[0-9]{2}/', $csvData[$key][$arrayKey]) || $csvData[$key][$arrayKey] === null) {
                    $csvData[$key][$arrayKey] = "00:00";
                }

                $data .= $csvData[$key][$arrayKey] . $conma;
            }
        }

        Storage::append($fileName, $data);

        return Storage::disk('local')->download($fileName);
    }
}
