<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use infobip\api\client\SendMultipleTextualSmsAdvanced;
use infobip\api\configuration\BasicAuthConfiguration;
use infobip\api\model\Destination;
use infobip\api\model\sms\mt\send\Message;
use infobip\api\model\sms\mt\send\textual\SMSAdvancedTextualRequest;
use App\GroupSms;
use App\Models\MessageStatus;

class GroupSmsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('groupsms');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $client = new SendMultipleTextualSmsAdvanced(new BasicAuthConfiguration('lanre_emplug', 'Olanrewaju@1'));
        // Array of phone numbers:
        $phoneNumbers = explode(',', $request->phone);

        // A destination object is created for each phone number:
        $destinations = array();
        foreach ($phoneNumbers as $phoneNumber) {
            $destination = new Destination();
            $destination->setTo($phoneNumber);

            $destinations[] = $destination;
        }

        // Message that uses $destinations array
        $message = new Message();
        $message->setFrom($request->suject);
        $message->setDestinations($destinations);
        $message->setText($request->message);

        $requestBody = new SMSAdvancedTextualRequest();
        $requestBody->setMessages([$message]);

        // Executing response
        $response = $client->execute($requestBody);

        $params = $request->all();
        $params['user_id'] = auth()->id();
        $sms = GroupSms::create($params);

        foreach ($response->getMessages() as $index => $sentMessageInfo) {
            echo "Message Info: #" . $index . "\n";
            echo "Message ID: " . $sentMessageInfo->getMessageId() . "\n";
            echo "Receiver: " . $sentMessageInfo->getTo() . "\n";
            echo "Message status: " . $sentMessageInfo->getStatus()->getName() . "\n\n";

            MessageStatus::create([
                'to' => $sentMessageInfo->getTo(),
                'messageId' => $sentMessageInfo->getMessageId(),
                'status' => json_encode($sentMessageInfo->getStatus()),
                'group_sms_id' => $sms->id
            ]);
        }

        // dd($response->getMessages());
        return redirect()->back()->withSuccess('Message sent');
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
