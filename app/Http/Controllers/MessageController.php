<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MessageController extends Controller
{
    // public function message(Request $request){

    // 	$message = $request->('phone');
    // 	$message = $request->('message');
    // 	$encodemessage = urlencode($message);
    // 	$authkey ='';
    // 	$senderId ='';
    // 	$route ='';
    // 	$phonenumber = implode();
    // }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('message');
    }

    public function message()
    {
        return view('groupsms');
    }
    public function gift()
    {
        return view('giftsms');
    }
}
