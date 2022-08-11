<?php

namespace App\Console\Commands;

use App\Models\admin;
use App\Models\Ads;
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


        $plan = new Plan();
        $plan->name = 'STATER';
        $plan->price = 1500;
        $plan->profit = 80;
        $plan->total = '3000';
        $plan->ads = 15;
        $plan->duration = 50;
        $plan->withdraw = 200;
        $plan->status = 1;
        $plan->save();

        $plan = new Plan();
        $plan->name = 'PREMIUM';
        $plan->price = 5000;
        $plan->profit = 100;
        $plan->total = '18000';
        $plan->ads = 15;
        $plan->duration = 180;
        $plan->withdraw = 1000;
        $plan->status = 1;
        $plan->save();

        $plan = new Plan();
        $plan->name = 'PRO';
        $plan->price = 10000;
        $plan->profit = 200;
        $plan->total = '36000';
        $plan->ads = 15;
        $plan->duration = 180;
        $plan->withdraw = 2000;
        $plan->status = 1;
        $plan->save();

        $plan = new Plan();
        $plan->name = 'ULTIMATE';
        $plan->price = 15000;
        $plan->profit = 300;
        $plan->total = '54000';
        $plan->ads = 15;
        $plan->duration = 180;
        $plan->withdraw = 3000;
        $plan->status = 1;
        $plan->save();

        $plan = new Plan();
        $plan->name = 'SUPER';
        $plan->price = 20000;
        $plan->profit = 400;
        $plan->total = '72000';
        $plan->ads = 15;
        $plan->duration = 180;
        $plan->withdraw = 4000;
        $plan->status = 1;
        $plan->save();

        $plan = new Plan();
        $plan->name = 'DIAMOND';
        $plan->price = 30000;
        $plan->profit = 600;
        $plan->total = '108000';
        $plan->ads = 15;
        $plan->duration = 180;
        $plan->withdraw = 8000;
        $plan->status = 1;
        $plan->save();

        $plan = new Plan();
        $plan->name = 'FUTURE';
        $plan->price = 40000;
        $plan->profit = 900;
        $plan->total = '168000';
        $plan->ads = 15;
        $plan->duration = 210;
        $plan->withdraw = 8000;
        $plan->status = 1;
        $plan->save();


        $plan = new Plan();
        $plan->name = 'LEGEND';
        $plan->price = 50000;
        $plan->profit = 10000;
        $plan->total = '240000';
        $plan->ads = 15;
        $plan->duration = 240;
        $plan->withdraw = 10000;
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
        $option->value = 10;
        $option->save();


        // inserting admin
        $admin = new admin();
        $admin->username = "test";
        $admin->password = "test";
        $admin->save();


        // generating Ads
        $ads = new Ads();
        $ads->title = "Tether";
        $ads->link = "https://tether.to";
        $ads->save();

        $ads = new Ads();
        $ads->title = "Bitcoin";
        $ads->link = "https://bitcoin.org";
        $ads->save();

        $ads = new Ads();
        $ads->title = "Ethereum";
        $ads->link = "https://ethereum.org";
        $ads->save();

        $ads = new Ads();
        $ads->title = "Litecoin";
        $ads->link = "https://litecoin.org";
        $ads->save();

        $ads = new Ads();
        $ads->title = "Bitcoin Cash";
        $ads->link = "https://bitcoincash.org";
        $ads->save();

        $ads = new Ads();
        $ads->title = "Dash";
        $ads->link = "https://dash.org";
        $ads->save();

        $ads = new Ads();
        $ads->title = "Monero";
        $ads->link = "https://getmonero.org";
        $ads->save();

        $ads = new Ads();
        $ads->title = "EOS";
        $ads->link = "https://eos.io";
        $ads->save();

        $ads = new Ads();
        $ads->title = "Stellar";
        $ads->link = "https://www.stellar.org";
        $ads->save();

        $ads = new Ads();
        $ads->title = "NEM";
        $ads->link = "https://www.nem.io";
        $ads->save();

        $ads = new Ads();
        $ads->title = "IOTA";
        $ads->link = "https://www.iota.org";
        $ads->save();

        $ads = new Ads();
        $ads->title = "Cardano";
        $ads->link = "https://www.cardano.org";
        $ads->save();

        $ads = new Ads();
        $ads->title = "TRON";
        $ads->link = "https://www.tron.network";
        $ads->save();

        $ads = new Ads();
        $ads->title = "NEO";
        $ads->link = "https://neo.org";
        $ads->save();

        $ads = new Ads();
        $ads->title = "Qtum";
        $ads->link = "https://qtum.org";
        $ads->save();

        return Command::SUCCESS;
    }
}
