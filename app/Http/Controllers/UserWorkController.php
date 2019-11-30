<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserWorkController extends Controller
{
    public function index()
    {
        return view('userwork.index');
    }
}
