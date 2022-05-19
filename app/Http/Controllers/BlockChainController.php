<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\UserPlan;
use Illuminate\Http\Request;

class BlockChainController extends Controller
{
    public function index()
    {
        $plan = UserPlan::where('user_id', auth()->user()->id)->firstOrFail();
        $Perprofit = $plan->plan->profit / 25;
        // checking if this transaction alredy added
        $transaction = Transaction::where('user_id', auth()->user()->id)
            ->where('amount', $Perprofit)
            ->where('type', 'profit')
            ->where('sum', 'in')
            ->whereDate('created_at', now()->toDateString())
            ->get();
        if ($transaction->count() < 25) {
            // adding a profit transaction
            $transaction = new Transaction();
            $transaction->user_id = auth()->user()->id;
            $transaction->amount = $Perprofit;
            $transaction->type = 'profit';
            $transaction->status = 'approved';
            $transaction->sum = 'in';
            $transaction->save();
            return redirect()->back()->with('message', 'Profit Added Successfully');
        } else {
            return redirect()->back()->withErrors('Profit Already Added');
        }
    }
}
