<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserWork;
use Carbon\Carbon;
use App\Utility\Convert;

class UserWorkController extends Controller
{
    private $userWork;
    public function __construct()
    {
        $this->userWork = new UserWork();
    }

    public function index()
    {
        $userWorks = $this->userWork->getUserWorks();

        foreach ($userWorks as $time) {
            $startTime = new Carbon($time->start_time);
            $endTime = new Carbon($time->end_time);
            $overTime = new Carbon($time->over_time);
            $breakTime = new Carbon($time->break_time);
            $workTime = new Carbon($time->work_time);

            $time->work_time = $workTime->month;
            $time->start_time = Convert::getHourJoinMinute($startTime->hour, $startTime->minute);
            $time->end_time = Convert::getHourJoinMinute($endTime->hour, $endTime->minute);
            $time->over_time = Convert::getHourJoinMinute($overTime->hour, $overTime->minute);
            $time->break_time = Convert::getHourJoinMinute($breakTime->hour, $breakTime->minute);

        }

        return view('userwork.index', compact('userWorks'));
    }
}
