<?php

namespace App\Http\Web\UserWork\Controllers;

use App\Eloquents\UserWork;
use App\Http\Web\UserWork\Requests\IndexUserWorkRequest;
use App\Http\Web\UserWork\Services\IndexUserWorkService;
use App\Http\Web\Controller;
use Log;

class IndexUserWorkController extends Controller
{
    private $indexUserWorkService;

    public function __construct(IndexUserWorkService $indexUserWorkService)
    {
        $this->indexUserWorkService = $indexUserWorkService;
    }

    public function __invoke($id)
    {
        $response = $this->indexUserWorkService->execute($id);
        
        return view('userwork.index', [
            'userWorkList' => $response['userWorkList'],
            'userWorks' => $response['userWorks']
        ]);
    }
}
