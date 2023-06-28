<?php

namespace App\Http\Controllers;

use App\Models\Roomrent;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class CalcController extends Controller
{
    public function viewCalc() {
        return view('roomrent/calc');
    }
}
    