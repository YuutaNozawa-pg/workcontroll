<?php

namespace App\Http\Web\UserWork\Controllers;

use App\Eloquents\UserWork;
use App\Http\Web\UserWork\Requests\ListUserWorkRequest;
use App\Http\Web\UserWork\Services\ListUserWorkService;
use App\Http\Web\Controller;

class ListUserWorkController extends Controller
{
    private $listUserWorkService;

    public function __construct(ListUserWorkService $listUserWorkService)
    {
        $this->listUserWorkService = $listUserWorkService;
    }

    public function __invoke(ListUserWorkRequest $request)
    {
        $response = $this->listUserWorkService->execute();
        
        return view('userwork.list', ['userWorkList' => $response]);
    }
}
