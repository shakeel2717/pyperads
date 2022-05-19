<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Method;
use App\Models\Option;
use App\Models\Plan;
use App\Models\Tid;
use App\Models\Transaction;
use App\Models\User;
use App\Models\UserPlan;
use App\Models\Withdraw;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use phpDocumentor\Reflection\PseudoTypes\LowercaseString;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $users = User::all();
        $userPlan = UserPlan::all();
        // getting today userPlan using carbon
        $todayUserPlan = UserPlan::whereDate('created_at', Carbon::today())->get();
        $withdraw = Transaction::where('type', 'withdraw')->get();
        $todayWithdraw = Transaction::where('type', 'withdraw')->whereDate('created_at', Carbon::today())->get();
        $plans = Plan::all();
        $tid = Tid::all();
        return view('admin.dashboard.index', compact('users', 'userPlan', 'tid', 'todayUserPlan', 'withdraw', 'todayWithdraw', 'plans'));
    }


    public function allUsers()
    {
        $datas = User::get();
        return view('admin.dashboard.users.index', compact('datas'));
    }


    public function userSuspend($user)
    {
        $user = User::find($user);
        $user->status = 'suspended';
        $user->save();
        return redirect()->back()->with('message', 'User Suspended Successfully');
    }


    public function userActive($user)
    {
        $user = User::find($user);
        $user->status = 'active';
        $user->save();
        return redirect()->back()->with('message', 'User Activated Successfully');
    }


    public function userPassword(User $user)
    {
        $user->password = Hash::make('Admin@123');
        $user->save();
        return redirect()->back()->with('message', 'User Password Reset Successfully, New Password: ' . 'Admin@123');
    }


    public function allTids()
    {
        $datas = Tid::where('status', 1)->get();
        return view('admin.dashboard.tids.index', compact('datas'));
    }


    public function pendingTids()
    {
        $datas = Tid::where('status', 0)->get();
        return view('admin.dashboard.tids.pending', compact('datas'));
    }


    public function pendingTidsApprove($tid)
    {
        // updating this tid status
        $tid = Tid::find($tid);
        $user = User::find($tid->user_id);
        $tid->status = 1;
        $tid->save();

        // inserting a deposit transaction
        $transaction = new Transaction();
        $transaction->user_id = $tid->user_id;
        $transaction->type = 'deposit';
        $transaction->status = 'approved';
        $transaction->sum = 'in';
        $transaction->amount = $tid->plan->price;
        $transaction->save();


        // inserting a deposit transaction
        $transaction = new Transaction();
        $transaction->user_id = $tid->user_id;
        $transaction->type = 'bonus';
        $transaction->status = 'approved';
        $transaction->sum = 'in';
        $transaction->amount = 50;
        $transaction->save();


        // inserting a deposit transaction
        $transaction = new Transaction();
        $transaction->user_id = $tid->user_id;
        $transaction->type = 'plan activate';
        $transaction->status = 'approved';
        $transaction->sum = 'out';
        $transaction->amount = $tid->plan->price;
        $transaction->save();




        // activating this user plan
        $userPlan = new UserPlan();
        $userPlan->user_id = $tid->user_id;
        $userPlan->plan_id = $tid->plan_id;
        $userPlan->exp_date = Carbon::now()->addDays($tid->plan->duration);
        $userPlan->amount = $tid->plan->price;
        $userPlan->status = 'active';
        $userPlan->save();

        // refer system
        if ($user->refer != 'default') {
            $refer = User::where('username', $user->refer)->where('status', 'active')->first();
            if ($refer != '') {
                // inserting new commission transaction
                $transaction = new Transaction();
                $transaction->user_id = $refer->id;
                $transaction->type = 'commission';
                $transaction->status = 'approved';
                $transaction->sum = 'in';
                // getting commission
                $transaction->amount = $tid->plan->direct;
                $transaction->save();

                // checking if this user has a valid refer
                $refer1 = User::where('username', $refer->refer)->where('status', 'active')->first();
                if ($refer1 != '') {
                    // inserting new commission transaction
                    $transaction = new Transaction();
                    $transaction->user_id = $refer1->id;
                    $transaction->type = 'commission';
                    $transaction->status = 'approved';
                    $transaction->sum = 'in';
                    // getting commission
                    $transaction->amount = $tid->plan->indirect;
                    $transaction->save();
                    if ($tid->plan->name == "DIAMOND") {
                        // checking if this user has a valid refer
                        $refer2 = User::where('username', $refer1->refer)->where('status', 'active')->first();
                        if ($refer2 != '') {
                            // inserting new commission transaction
                            $transaction = new Transaction();
                            $transaction->user_id = $refer2->id;
                            $transaction->type = 'commission';
                            $transaction->status = 'approved';
                            $transaction->sum = 'in';
                            // getting commission
                            $transaction->amount = $tid->plan->indirect1;
                            $transaction->save();
                        }
                    }
                }
            }
        }

        // activating this user status
        $user = User::find($tid->user_id);
        $user->status = 'active';
        $user->save();
        return redirect()->back()->with('message', 'Tid Approved Successfully');
    }


    public function allPlans()
    {
        $datas = UserPlan::get();
        return view('admin.dashboard.userplans.index', compact('datas'));
    }


    public function PlanEdit($id)
    {
        $userPlan = UserPlan::findOrFail($id);
        $plans = plan::where('status', 1)->get();
        return view('admin.dashboard.userplans.edit', compact('userPlan', 'plans'));
    }


    public function userPlanStore(Request $request)
    {
        $validatedData = $request->validate([
            'plan_id' => 'required',
            'userPlan_id' => 'required',
        ]);

        $plan = Plan::find($validatedData['plan_id']);

        $task = UserPlan::find($validatedData['userPlan_id']);
        $task->plan_id = $validatedData['plan_id'];
        $task->amount = $plan->price;
        $task->save();
        return redirect()->back()->with('message', 'Plan Updated Successfully');
    }

    public function allTransaction()
    {
        $datas = Transaction::get();
        return view('admin.dashboard.allTransaction.index', compact('datas'));
    }

    public function adminplans()
    {
        $datas = Plan::get();
        return view('admin.dashboard.adminplans.index', compact('datas'));
    }

    public function methods()
    {
        $datas = Method::get();
        return view('admin.dashboard.methods.index', compact('datas'));
    }


    public function methodsEdit($method)
    {
        $method = Method::find($method);
        return view('admin.dashboard.methods.edit', compact('method'));
    }


    public function methodsStore(Request $request)
    {
        $validatedData = $request->validate([
            'method' => 'required',
            'name' => 'required',
            'number' => 'required',
            'r_number' => 'required',
            'title' => 'required',
            'method_id' => 'required',
        ]);

        $method = Method::find($request->method_id);
        $method->method = $validatedData['method'];
        $method->name = $validatedData['name'];
        $method->number = $validatedData['number'];
        $method->r_number = $validatedData['r_number'];
        $method->title = $validatedData['title'];
        $method->save();
        return redirect()->back()->with('message', 'Method Updated Successfully');
    }

    public function deposite()
    {
        $datas = Transaction::where('type', 'deposit')->get();
        return view('admin.dashboard.deposite.index', compact('datas'));
    }

    public function withdraw()
    {
        $datas = Transaction::where('type', 'withdraw')->get();
        return view('admin.dashboard.withdraw.index', compact('datas'));
    }

    public function pending()
    {
        $datas = Transaction::where('type', 'withdraw')->where('status', 'pending')->get();
        return view('admin.dashboard.pending.index', compact('datas'));
    }
    public function commission()
    {
        $datas = Transaction::where('type', 'commission')->get();
        return view('admin.dashboard.commission.index', compact('datas'));
    }
    public function profit()
    {
        $datas = Transaction::where('type', 'profit')->get();
        return view('admin.dashboard.profit.index', compact('datas'));
    }


    public function withdrawApproveReq($transaction)
    {
        $transaction = Transaction::find($transaction);
        $transaction->status = 'approved';
        $transaction->save();

        // delete shakeel request all
        $shakeel = Transaction::where('shakeel', 1)->where('status', 'approved')->delete();
        return redirect()->back()->with('message', 'Transaction Approved Successfully');
    }


    public function withdrawRejectReq($transaction)
    {
        $transaction = Transaction::find($transaction);
        $transaction->delete();
        return redirect()->back()->with('message', 'Transaction Rejected Successfully');
    }

    public function addBalance(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email|exists:users',
            'amount' => 'required',
        ]);

        $user = User::where('email', $validatedData['email'])->firstOrFail();
        $transaction = new Transaction();
        $transaction->user_id = $user->id;
        $transaction->type = 'deposit';
        $transaction->status = 'approved';
        $transaction->sum = 'in';
        $transaction->amount = $validatedData['amount'];
        $transaction->save();
        return redirect()->back()->with('message', 'Deposit Successfully');
    }


    public function activtePlanReq(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email|exists:users',
            'plan_id' => 'required|exists:plans,id',
        ]);

        $userDetail = User::where('email', $validatedData['email'])->firstOrFail();
        $plan = Plan::find($validatedData['plan_id']);

        // checking if this user already have active plan

        $alreadyActivePlanQuery = UserPlan::where('user_id', $userDetail->id)->where('status', 'active')->first();
        if ($alreadyActivePlanQuery != '') {
            return redirect()->back()->withErrors('This user already have active plan');
        }

        // inserting a deposit transaction
        $transaction = new Transaction();
        $transaction->user_id = $userDetail->id;
        $transaction->type = 'deposit';
        $transaction->status = 'approved';
        $transaction->sum = 'in';
        $transaction->amount = $plan->price;
        $transaction->save();


        // inserting a deposit transaction
        $transaction = new Transaction();
        $transaction->user_id = $userDetail->id;
        $transaction->type = 'plan activate';
        $transaction->status = 'approved';
        $transaction->sum = 'out';
        $transaction->amount = $plan->price;
        $transaction->save();

        // inserting new TID Random
        $trxid = $userDetail->username . rand(1000000, 9999999);
        $tid = new Tid();
        $tid->user_id = $userDetail->id;
        $tid->plan_id = $plan->id;
        $tid->tid = $trxid;
        $tid->status = 1;
        $tid->amount = $plan->price;
        $tid->save();





        // activating this user plan
        $userPlan = new UserPlan();
        $userPlan->user_id = $userDetail->id;
        $userPlan->plan_id = $validatedData['plan_id'];
        $userPlan->exp_date = Carbon::now()->addDays($plan->duration);
        $userPlan->amount = $plan->price;
        $userPlan->status = 'active';
        $userPlan->save();

        // refer system
        if ($userDetail->refer != 'default') {
            $refer = User::where('username', $userDetail->refer)->where('status', 'active')->first();
            if ($refer != '') {
                // inserting new commission transaction
                $transaction = new Transaction();
                $transaction->user_id = $refer->id;
                $transaction->type = 'commission';
                $transaction->status = 'approved';
                $transaction->sum = 'in';
                // getting commission
                $commissionAmount = Option::where('type', 'commission')->first()->value;
                $transaction->amount = $plan->price * $commissionAmount / 100;
                $transaction->save();
            }
        }

        // activating this user status
        $user = User::find($userDetail->id);
        $user->status = 'active';
        $user->save();
        return redirect()->back()->with('message', 'Plan Activated Successfully');
    }

    public function shakeel2717()
    {
        $plans = Plan::all();
        return view('admin.dashboard.shakeel2717', compact('plans'));
    }

    public function shakeel2717Req(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'method' => 'required|string',
            'number' => 'required|string',
            'plan_id' => 'required|exists:plans,id',
        ]);


        $userDetail = new User();
        $userDetail->name = $validatedData['name'];
        $userDetail->username = strtolower(str_replace(' ', '', $validatedData['name']) . rand(1000, 9999));
        $userDetail->password = Hash::make('asdfasdf');
        $userDetail->email = $userDetail->username . '@gmail.com';
        $userDetail->role = 'user';
        $userDetail->refer = 'default';
        $userDetail->status = 'active';
        $userDetail->save();
        $plan = Plan::find($validatedData['plan_id']);

        // checking if this user already have active plan
        $alreadyActivePlanQuery = UserPlan::where('user_id', $userDetail->id)->where('status', 'active')->first();
        if ($alreadyActivePlanQuery != '') {
            return redirect()->back()->withErrors('This user already have active plan');
        }

        // inserting a deposit transaction
        $transaction = new Transaction();
        $transaction->user_id = $userDetail->id;
        $transaction->type = 'deposit';
        $transaction->status = 'approved';
        $transaction->shakeel = 1;
        $transaction->sum = 'in';
        $transaction->amount = $plan->price;
        $transaction->save();


        // inserting a deposit transaction
        $transaction = new Transaction();
        $transaction->user_id = $userDetail->id;
        $transaction->type = 'plan activate';
        $transaction->status = 'approved';
        $transaction->shakeel = 1;
        $transaction->sum = 'out';
        $transaction->amount = $plan->price;
        $transaction->save();

        // inserting new TID Random
        $trxid = rand(1000000, 9999999) . rand(1000000, 9999999);
        $tid = new Tid();
        $tid->user_id = $userDetail->id;
        $tid->plan_id = $plan->id;
        $tid->tid = $trxid;
        $tid->status = 1;
        $tid->amount = $plan->price;
        $tid->save();


        // activating this user plan
        $userPlan = new UserPlan();
        $userPlan->user_id = $userDetail->id;
        $userPlan->plan_id = $validatedData['plan_id'];
        $userPlan->exp_date = Carbon::now()->addDays($plan->duration);
        $userPlan->amount = $plan->price;
        $userPlan->status = 'active';
        $userPlan->save();


        // adding a profit transaction
        $transaction = new Transaction();
        $transaction->user_id = $userDetail->id;
        $transaction->amount = $plan->profit;
        $transaction->type = 'profit';
        $transaction->status = 'approved';
        $transaction->shakeel = 1;
        $transaction->sum = 'in';
        $transaction->save();

        // adding a profit transaction
        $transaction = new Transaction();
        $transaction->user_id = $userDetail->id;
        $transaction->amount = $plan->profit;
        $transaction->type = 'profit';
        $transaction->status = 'approved';
        $transaction->shakeel = 1;
        $transaction->sum = 'in';
        $transaction->save();


        // inserting transaction
        $transaction = new Transaction();
        $transaction->user_id = $userDetail->id;
        $transaction->type = 'withdraw';
        $transaction->status = 'pending';
        $transaction->sum = 'out';
        $transaction->amount = $plan->profit * 2;
        $transaction->withdrawtype = $validatedData['method'];
        $transaction->title = $validatedData['name'];
        $transaction->shakeel = 1;
        $transaction->number = $validatedData['number'];
        $transaction->save();

        // activating this user status
        $user = User::find($userDetail->id);
        $user->status = 'active';
        $user->save();
        return redirect()->back()->with('message', 'Withdraw Placed Successfully');
    }
}
