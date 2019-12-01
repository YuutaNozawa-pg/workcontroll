<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserWork extends Model
{
    protected $table = 'user_works';
    //
    public $fillable = [
        'user_id',
        'work_time',
        'start_time',
        'end_time',
        'over_time',
        'break_time'
    ];

    public function getUserWorks() {
        return $this->get();
    }
}
