<?php
// generating 6 digit unique user code

use App\Models\Transaction;
use App\Models\User;
use App\Models\UserPlan;

function generate_user_code($userType)
{
    $rand = rand(10000000, 99999999);
    $code = $userType . $rand;
    $user = User::where('code', $code)->first();
    if ($user) {
        generate_user_code($userType);
    } else {
        return $code;
    }
}


function custom_number_format($n, $precision = 3)
{
    if ($n < 1000000) {
        // Anything less than a million
        $n_format = number_format($n);
    } else if ($n < 1000000000) {
        // Anything less than a billion
        $n_format = number_format($n / 1000000, $precision) . 'M';
    } else {
        // At least a billion
        $n_format = number_format($n / 1000000000, $precision) . 'B';
    }

    return $n_format;
}


function balance($id)
{
    // getting this user
    $in = Transaction::where('user_id', $id)->where('sum', 'in')->sum('amount');
    $out = Transaction::where('user_id', $id)->where('sum', 'out')->sum('amount');
    $balance = $in - $out;
    return $balance;
}


function totalWithdraw($id)
{
    // getting this user
    $out = Transaction::where('user_id', $id)->where('type', 'withdraw')->where('sum', 'out')->sum('amount');
    return $out;
}


function totalApproveWithdraw($id)
{
    // getting this user
    $out = Transaction::where('user_id', $id)->where('type', 'withdraw')->where('status', 'approved')->where('sum', 'out')->sum('amount');
    return $out;
}


function totalCommission($id)
{
    // getting this user
    $in = Transaction::where('user_id', $id)->where('type', 'commission')->where('sum', 'in')->sum('amount');
    return $in;
}


// checking if this user already added a profit
function profitBlockchainAlready()
{
    $plan = UserPlan::where('user_id', auth()->user()->id)->first();
    if ($plan != '') {
        // checking if this transaction alredy added
        $transaction = Transaction::where('user_id', auth()->user()->id)
            ->where('type', 'profit')
            ->whereDate('created_at', now()->toDateString())
            ->get();
        if ($transaction->count() < 25) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}
