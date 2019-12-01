<?php

namespace App\Utility;

class Convert {

    //時と分を結合した文字列を返すメソッド
    static public function getHourJoinMinute($hour, $minute) {
    
        //02:02 みたいな時間はCarbonで作れないので自作
        $zeroHour = $hour <= 9 ? '0' : '';
        $zeroMinute = $minute <= 9 ? '0' : '';

        return $zeroHour . $hour . ':' . $zeroMinute . $minute;
    }
}