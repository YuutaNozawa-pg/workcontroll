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
}
