<?php

namespace App\Http\Web\UserWork\Controllers;

use App\Eloquents\UserWork;
use App\Http\Web\UserWork\Requests\UpdateUserWorkRequest;
use App\Http\Web\UserWork\Services\UpdateUserWorkService;
use App\Http\Web\Controller;

class UpdateUserWorkController extends Controller
{
    private $updateUserWorkService;

    public function __construct(UpdateUserWorkService $updateUserWorkService)
    {
        $this->updateUserWorkService = $updateUserWorkService;
    }

    public function __invoke(UpdateUserWorkRequest $request)
    {
        $response = $this->updateUserWorkService->execute($request->convert());
        
        return redirect('/userwork');
    }
}
