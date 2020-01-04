<?php

namespace App\Http\Web\UserWork\Controllers;

use App\Eloquents\UserWork;
use App\Http\Web\UserWork\Requests\CreateUserWorkRequest;
use App\Http\Web\UserWork\Services\CreateUserWorkService;
use App\Http\Web\Controller;

class CreateUserWorkController extends Controller
{
    private $createUserWorkService;

    public function __construct(CreateUserWorkService $createUserWorkService)
    {
        $this->createUserWorkService = $createUserWorkService;
    }

    public function __invoke(CreateUserWorkRequest $request)
    {
        $this->createUserWorkService->execute();

        return redirect('/userwork');
    }
}
