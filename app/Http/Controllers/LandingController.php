<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        $plans = Plan::where('status',1)->get();
        return view('landing.index',compact('plans'));
    }

    public function pricing()
    {
        $plans = Plan::all();
        return view('landing.pricing',compact('plans'));
    }
}
