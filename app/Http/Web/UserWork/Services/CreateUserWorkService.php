<?php

namespace App\Http\Web\UserWork\Services;

use App\Eloquents\UserWorkList;
use App\Eloquents\UserWork;
use Carbon\Carbon;

class CreateUserWorkService
{
    public function execute()
    {
        //取得
        $userWorkLists = (new UserWorkList())
            ->get();

        $now = Carbon::now();

        if ($userWorkLists->isNotEmpty()) {
            foreach ($userWorkLists as $userWorkList) {
                $comparison = new Carbon($userWorkList->date);

                if ($now->year == $comparison->year && 
                    $now->month == $comparison->month) {
                        $now->addMonthsNoOverflow(1);
                    }
            }
        }

        //作成
        $userWorkList = (new UserWorkList())->newQuery()
            ->create([
                'user_id' => 0,
                'date' => $now
                ])
            ->get()
            ->last();

        for ($i = 1; $i <= $now->endOfMonth()->day; $i++) {
            (new UserWork())->newQuery()
                ->create([
                    'user_work_list_id' => $userWorkList->id,
                    'start_time' => null,
                    'end_time' => null,
                    'break_time' => null,
                    'over_time' => null,
                    'year' => $now->year,
                    'month' => $now->month,
                    'day' => $i
                ]);
        }
    }
}
