<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Paystack;
use App\Model\Purchase;



class PaymentController extends Controller
{
/**
     * Redirect the User to Paystack Payment Page
     * @return Url
     */
    public function redirectToGateway()
    {
        return Paystack::getAuthorizationUrl()->redirectNow();
    }

    /**
     * Obtain Paystack payment information
     * @return void
     */
    public function handleGatewayCallback()
    {
        $paymentDetails = Paystack::getPaymentData();

        $purchase = Purchase::find($paymentDetails['data']['metadata']['purchaseId']);
        $purchase->payment_reference = $paymentDetails['data']['reference'];
        $purchase->payment_status = $paymentDetails['data']['status'];
        $purchase->payment_message = $paymentDetails['message'];
        if($paymentDetails['data']['status'] == 'success') {
            $purchase->status = 2;
        }
        $purchase->save();

        dd($paymentDetails);

        return redirect()->back()->withSuccess($paymentDetails['message']);
        // Now you have the payment details,
        
    }
}
