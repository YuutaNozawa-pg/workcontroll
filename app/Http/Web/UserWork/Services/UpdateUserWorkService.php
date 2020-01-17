<?php

namespace App\Http\Web\UserWork\Services;

use App\Eloquents\UserWorkList;
use Illuminate\Support\Collection;

class UpdateUserWorkService
{
    public function execute(Collection $request)
    {
        $userWorkListId = $request->get('user_work_list_id');
        $ids = $request->get('id');
        $startTime = $request->get('start_time');
        $endTime = $request->get('end_time');
        $breakTime = $request->get('break_time');
        $overTime = $request->get('over_time');

        $userWorkList = (new UserWorkList())->newQuery()
            ->with('userWorks')
            ->find($userWorkListId);

        foreach ($ids as $key => $value) {
            $userWorkList->userWorks()
                ->where('id', $value)
                ->update([
                    'start_time' => $startTime[$key],
                    'end_time' => $endTime[$key],
                    'break_time' => $breakTime[$key],
                    'over_time' => $overTime[$key]
                ]);
        }
    }
}