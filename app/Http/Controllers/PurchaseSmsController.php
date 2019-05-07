<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Purchase;

class PurchaseSmsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('purchase');
    }

    public function process(Request $request)
    {
        $unit = $request->unit;
        $data['amount'] = $amount= $unit * 2;

        $purchase = new Purchase;
        $purchase->user_id = auth()->id();
        $purchase->unit = $unit;
        $purchase->amount = $amount;
        $purchase->txnref = rand(10000001,99999999);//str_random(8);
        $purchase->save();

        $data['purchaseId'] = $purchase->id;

        return view('purchase-process', $data);
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
        $user = auth()->user();

        $user->balance->update(['unit' => $use->balance->unit+$unit]);
        $params = [
            'from_user_id' => $use->id,
            'to_user_id' => $toUser->id,
            'unit' => $unit,
        ];

        PurchaseSms::create($params);
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
