<?php

namespace App\Eloquents;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Log;

class UserWork extends Model
{
    protected $guarded = [
        'id'
    ];

    public function getUserWorks() {
        return $this->get();
    }

    public function findUserWorksByYearAndMonth($year, $month) {
        $matchWord = $year . '-0' . $month;
        Log::debug($matchWord);
        return $this->where('work_time', 'like', "%{$matchWord}%")
            ->get();
    }

    public function updateUserWork($userWorks)
    {
        for ($i = 0; $i < count($userWorks); $i++) {
            $this->where('id', $userWorks[$i]['id'])
                 ->update([
                    'start_time' => $userWorks[$i]['start_time'],
                    'end_time' => $userWorks[$i]['end_time'],
                    'break_time' => $userWorks[$i]['break_time'],
                    'over_time' => $userWorks[$i]['over_time']
                ]);
        }
    }

    public function createUserWork($time)
    {
        for ($i = 0; $i < count($time); $i++) {
            $this->create([
                'user_id' => 0,
                'work_time' => $time[$i]['work_time'],
                'start_time' => $time[$i]['start_time'],
                'end_time' => $time[$i]['end_time'],
                'break_time' => $time[$i]['break_time'],
                'over_time' => $time[$i]['over_time']
            ]);
        }
    }
}
