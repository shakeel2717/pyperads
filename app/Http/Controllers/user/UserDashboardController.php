<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserDashboardController extends Controller
{
    public function index()
    {
        $transactions = Transaction::where('user_id', auth()->user()->id)->limit(10)->orderBy('id', 'desc')->get();
        $refers = User::where('refer', auth()->user()->username)->get();
        return view('user.dashboard.index', compact('transactions', 'refers'));
    }


    public function history()
    {
        $transactions = Transaction::where('user_id', auth()->user()->id)->orderBy('id', 'desc')->get();
        return view('user.dashboard.history.index', compact('transactions'));
    }


    public function referHistory()
    {
        $refers = User::where('refer', auth()->user()->username)->get();
        return view('user.dashboard.refer.history',compact('refers'));
    }
}
