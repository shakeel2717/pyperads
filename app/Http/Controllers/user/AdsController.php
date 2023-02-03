<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Ads;
use App\Models\Plan;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AdsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ads = Ads::whereNotIn('id',watchedAds(auth()->user()->id))->get();
        if (!planValidation(auth()->user()->id)) {
            return redirect()->route('user.dashboard')->withErrors('You are not allowed to access this page');
        }
        return view('user.dashboard.ads.index', compact('ads'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ad = Ads::find($id);
        return view('user.dashboard.ads.show', compact('ad'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ad = Ads::find($id);
        $plan = Plan::find(getPlan(auth()->user()->id));
        $calc = $plan->profit / $plan->ads;

        // checking if user already watch this ad
        $transactionSecurity = Transaction::where('user_id', auth()->user()->id)->where('type','daily ads')->where('sum','in')->where('ad_id',$id)->whereDate('created_at', Carbon::today())->count();
        if($transactionSecurity > 0){
            return redirect()->route('user.dashboard')->withErrors('This Ads Already Watched, If you try to cheat again, your account will be suspended.');
        }


        // inserting a deposit transaction
        $transaction = new Transaction();
        $transaction->user_id = auth()->user()->id;
        $transaction->type = 'daily ads';
        $transaction->status = 'approved';
        $transaction->sum = 'in';
        $transaction->ad_id = $id;
        $transaction->amount = $calc;
        $transaction->save();

        return redirect()->route('user.ads.index')->with('status', 'Ads Watched successfully');

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
