<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Eloquents\UserWork;
use App\Http\Requests\UserWorkRequest;
use Carbon\Carbon;
use App\Utility\Convert;
use Log;

class UserWorkController extends Controller
{
    private $userWork;
    public function __construct()
    {
        $this->userWork = new UserWork();
    }

    public function index(UserWorkRequest $request)
    {
        
        $current = new Carbon();
        $current->month = $request->month;
        
        $userWorks = $this->userWork->findUserWorksByYearAndMonth($current->year, $current->month);

        foreach ($userWorks as $time) {
            $startTime = new Carbon($time->start_time);
            $endTime = new Carbon($time->end_time);
            $overTime = new Carbon($time->over_time);
            $breakTime = new Carbon($time->break_time);
            $workTime = new Carbon($time->work_time);

            $time->start_time = Convert::getHourJoinMinute($startTime->hour, $startTime->minute);
            $time->end_time = Convert::getHourJoinMinute($endTime->hour, $endTime->minute);
            $time->over_time = Convert::getHourJoinMinute($overTime->hour, $overTime->minute);
            $time->break_time = Convert::getHourJoinMinute($breakTime->hour, $breakTime->minute);

        }

        return view('userwork.index', compact('userWorks', 'current'));
    }

    public function update(Request $request)
    {
        $convertTime = new Carbon('today');
        $year = $request->year;
        $month = $request->month;

        
        $userWorks = $this->userWork->findUserWorksByYearAndMonth($year, $month);

        if (count($userWorks) == 0) {
            return redirect('/userwork/index');
        }
        
        $time = [];

        for ($i = 0; $i < count($request->start_time); $i++) {
            $time[$i]["id"] = $request->id[$i];
            $time[$i]["work_time"] = $year . '/' . $month . '/' . $request->day[$i];
            $time[$i]["start_time"] = $convertTime->toDateString() . ' ' . $request->start_time[$i] . ':00';
            $time[$i]["end_time"] = $convertTime->toDateString() . ' ' . $request->end_time[$i] . ':00';
            $time[$i]["break_time"] = $convertTime->toDateString() . ' ' . $request->break_time[$i] . ':00';
            $time[$i]["over_time"] = $convertTime->toDateString() . ' ' . $request->over_time[$i] . ':00';
        }

        $this->userWork->updateUserWork($time);

        return redirect('userwork/index');
    }

    public function create(Request $request)
    {
        $convertTime = new Carbon('today');
        $year = $request->year;
        $month = $request->month;

        $userWorks = $this->userWork->findUserWorksByYearAndMonth($year, $month);

        //year、monthに該当するレコードが見つかったらindexにリダイレクト
        if (count($userWorks) != 0) {
            return redirect('/userwork/index');
        }

        $time = [];

        for ($i = 0; $i < count($request->start_time); $i++) {
            $time[$i]["work_time"] = $year . '/' . $month . '/' . $request->day[$i];
            $time[$i]["start_time"] = $convertTime->toDateString() . ' ' . $request->start_time[$i] . ':00';
            $time[$i]["end_time"] = $convertTime->toDateString() . ' ' . $request->end_time[$i] . ':00';
            $time[$i]["break_time"] = $convertTime->toDateString() . ' ' . $request->break_time[$i] . ':00';
            $time[$i]["over_time"] = $convertTime->toDateString() . ' ' . $request->over_time[$i] . ':00';
        }

        $this->userWork->createUserWork($time);


        return redirect('/userwork/index');
    }

    public function list()
    {
        $currentYear = new Carbon();

        //今年の取得
        $year = $currentYear->year;

        return view('userwork.list', compact('year'));
    }
}
