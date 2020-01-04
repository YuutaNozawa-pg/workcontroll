<?php

namespace App\Http\Web\UserWork\Services;

use App\Eloquents\UserWork;
use App\Eloquents\UserWorkList;

class IndexUserWorkService
{
    public function execute($id)
    {
        $userWorkList = (new UserWorkList())->newQuery()
            ->with('userWorks')
            ->find($id);

        $userWorks = $userWorkList
            ->userWorks()
            ->get();

        return [
            'userWorkList' => $userWorkList,
            'userWorks' => $userWorks
        ];
    }
}