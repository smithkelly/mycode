<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\SingleSms;
use infobip\api\client\GetAccountBalance;
use infobip\api\configuration\BasicAuthConfiguration;
use App\Models\Purchase;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
        // $client = new GetAccountBalance(new BasicAuthConfiguration('lanre_emplug', 'Olanrwaju@1'));
        // // Executing request
        // $response = $client->execute();

        // echo 'accountBalance = ' . $response->getBalance() . ' ' . $response->getCurrency();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sent = SingleSms::where('user_id', auth()->id())->count();
        $purchase = Purchase::where(['user_id' => auth()->id(), 'status' => 2])->sum('amount');
        $balance = auth()->user()->balance;
        return view('dashboard', compact('sent', 'balance', 'purchase'));
    }
}
