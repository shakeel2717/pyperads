<?php

namespace App\Console\Commands;

use App\Models\admin;
use App\Models\Method;
use App\Models\Option;
use App\Models\Plan;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Hash;

class clean extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:clean';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Starting kit ready';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        Artisan::call('migrate:fresh');
        Artisan::call('cache:clear');
        Artisan::call('config:clear');
        Artisan::call('view:clear');
        Artisan::call('route:clear');

        $user = new User();
        $user->name = 'Shakeel Ahmad';
        $user->username = 'shakeel2717';
        $user->email = 'shakeel2717@gmail.com';
        $user->password = Hash::make('asdfasdf');
        $user->role = 'user';
        $user->save();


        $user = new User();
        $user->name = 'Basharat Ali';
        $user->username = 'basharat604';
        $user->email = 'basharat604@gmail.com';
        $user->refer = 'shakeel2717';
        $user->password = Hash::make('asdfasdf');
        $user->role = 'user';
        $user->save();


        $plan = new Plan();
        $plan->name = 'STATER';
        $plan->price = 10;
        $plan->profit = 25;
        $plan->total = '500';
        $plan->duration = '360';
        $plan->withdraw = '600';
        $plan->direct = '70';
        $plan->indirect = '30';
        $plan->status = 1;
        $plan->save();

        $plan = new Plan();
        $plan->name = 'PREMIUM';
        $plan->price = 20;
        $plan->profit = 50;
        $plan->total = '1000';
        $plan->duration = '360';
        $plan->withdraw = '600';
        $plan->direct = '150';
        $plan->indirect = '70';
        $plan->status = 1;
        $plan->save();

        $plan = new Plan();
        $plan->name = 'PRO';
        $plan->price = 50;
        $plan->profit = 120;
        $plan->total = '2000';
        $plan->duration = 360;
        $plan->withdraw = '600';
        $plan->direct = '200';
        $plan->indirect = '70';
        $plan->status = 1;
        $plan->save();

        $plan = new Plan();
        $plan->name = 'ULTIMATE';
        $plan->price = 100;
        $plan->profit = 270;
        $plan->total = '5400';
        $plan->duration = '360';
        $plan->withdraw = '600';
        $plan->direct = '210';
        $plan->indirect = '70';
        $plan->status = 1;
        $plan->save();

        $plan = new Plan();
        $plan->name = 'SUPER';
        $plan->price = 250;
        $plan->profit = 1300;
        $plan->total = '26000';
        $plan->duration = '360';
        $plan->withdraw = '600';
        $plan->direct = '900';
        $plan->indirect = '900';
        $plan->status = 1;
        $plan->save();

        $plan = new Plan();
        $plan->name = 'DIAMOND';
        $plan->price = 500;
        $plan->profit = 2500;
        $plan->total = '50000';
        $plan->duration = '360';
        $plan->withdraw = '600';
        $plan->direct = '1500';
        $plan->indirect = '1500';
        $plan->indirect1 = '1500';
        $plan->status = 1;
        $plan->save();



        $method = new Method();
        $method->method = 'USDT (TRC20)';
        $method->name = 'Tether';
        $method->number = 'TKp46nrnZJq2DfnXBSQbtJBJxpsDJzfeu1';
        $method->title = 'Tether';
        $method->status = 1;
        $method->save();

        // inserting website options
        $option = new Option();
        $option->type = 'commission';
        $option->value = 18;
        $option->save();


        // inserting admin
        $admin = new admin();
        $admin->username = "umar";
        $admin->password = "snapdragon720";
        $admin->save();

        return Command::SUCCESS;
    }
}
