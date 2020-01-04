<?php

namespace App\Http\Web\UserWork\Services;

use App\Eloquents\UserWorkList;

class ListUserWorkService
{
    public function execute()
    {
        return (new UserWorkList())->newQuery()
            ->get();
    }
}