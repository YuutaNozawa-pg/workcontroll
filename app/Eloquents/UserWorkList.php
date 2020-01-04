<?php

namespace App\Eloquents;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Log;

class UserWorkList extends Model
{
    protected $guarded = [
        'id'
    ];

    protected $dates = [
        'date'
    ];

    public function userWorks()
    {
        return $this->hasMany(UserWork::class, 'user_work_list_id', 'id');
    }
}
