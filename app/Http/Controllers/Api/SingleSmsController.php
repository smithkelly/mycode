<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use infobip\api\client\SendSingleTextualSms;
use infobip\api\configuration\BasicAuthConfiguration;
use infobip\api\model\sms\mt\send\textual\SMSTextualRequest;
use App\SingleSms;

class SingleSmsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('message');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

     return response()->json($request->all());
       // Initializing SendSingleTextualSms client with appropriate configuration
            $client = new SendSingleTextualSms(new BasicAuthConfiguration('lanre_emplug', 'Olanrewaju@1'));

            // Creating request body
            $requestBody = new SMSTextualRequest();
            $requestBody->setFrom($request->subject);
            $requestBody->setTo($request->phone);
            $requestBody->setText($request->message);

            // Executing request
            try {
                $response = $client->execute($requestBody);
                $sentMessageInfo = $response->getMessages()[0];

                echo "Message ID: " . $sentMessageInfo->getMessageId() . "\n";
                echo "Receiver: " . $sentMessageInfo->getTo() . "\n";
                echo "Message status: " . $sentMessageInfo->getStatus()->getName();
            } catch (Exception $exception) {
                echo "HTTP status code: " . $exception->getCode() . "\n";
                echo "Error message: " . $exception->getMessage();
            }

        $params = $request->all();
        $params['user_id'] = auth()->id();
        $sms = SingleSms::create($params);
        //return redirect()->back()->withSuccess('Message sent');  
          return response()->json(['success' => true, 'message' => 'Message sent.']); 
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
