<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WithdrawController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $wallets = Wallet::where('user_id', auth()->user()->id)->get();
        if ($wallets->count() < 1) {
            return redirect()->back()->withErrors('Please add your wallet first');
        }
        return view('user.dashboard.withdraw.index', compact('wallets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'wallet' => 'required',
            'amount' => 'required',
        ]);


        // checking if limit reached
        if ($validatedData['amount'] < 100) {
            return redirect()->back()->withErrors('Minimum withdrawal amount is 100');
        }

        $wallet = Wallet::find($validatedData['wallet']);
        if (balance(Auth::user()->id) < $validatedData['amount']) {
            return redirect()->back()->withErrors('Insufficient balance');
        }

        // inserting transaction
        $transaction = new Transaction();
        $transaction->user_id = Auth::user()->id;
        $transaction->type = 'withdraw';
        $transaction->status = 'pending';
        $transaction->sum = 'out';
        $transaction->amount = $validatedData['amount'];
        $transaction->withdrawtype = $wallet->type;
        $transaction->name = $wallet->name;
        $transaction->title = $wallet->title;
        $transaction->number = $wallet->number;
        $transaction->r_number = $wallet->r_number;
        $transaction->save();
        return redirect()->back()->with('message', 'Withdraw request has been sent');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
