<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\GiftSms;

class GiftSmsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $giftsms = GiftSms::with(['fromUser', 'toUser'])->where('from_user_id', auth()->id())->orWhere('to_user_id', auth()->id())->get();

        return response()->json(['success' => true, 'data' => $giftsms]);
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
        
        $fromUser = auth()->user();
        $toUser = User::where('email',$request->email)->first();
        $unit = $request->unit;

        if($fromUser->balance->unit < $unit)
            return response()->json(['success' => false, 'message' => 'Insucifient balance.']);

        $fromUser->balance->update(['unit' => $fromUser->balance->unit-$unit]);
        $toUser->balance->update(['unit' => $toUser->balance->unit+$unit]);

        $params = [
            'from_user_id' => $fromUser->id,
            'to_user_id' => $toUser->id,
            'unit' => $unit,
        ];

        GiftSms::create($params);

        return response()->json(['success' => true, 'message' => 'Transfer successful.']);

        
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
