<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Srmklive\PayPal\Services\ExpressCheckout;

class PayPalPaymentController extends Controller
{

    public function goPayment(){

       return view('welcome');

    }
    public function payment(Request $request)
    {
        $data = [];
        $data['items'] = [
            [
                'name' => 'Apple',
                'price' => $request->price,
                'desc'  => 'Macbook pro 14 inch',
                'qty' => 1
            ]
        ];

        $data['invoice_id'] = 1;
        $data['invoice_description'] = "Order #{$data['invoice_id']} Invoice";
        $data['return_url'] = route('payment.success');
        $data['cancel_url'] = route('payment.cancel');
        $data['total'] = $request->price;

        $provider = new ExpressCheckout;

        $response = $provider->setExpressCheckout($data);

        $response = $provider->setExpressCheckout($data, true);

        return redirect($response['paypal_link']);
    }

    public function cancel()
    {
        session()->flash('message', "Your payment is canceled.");
        return view('welcome');
    }

    public function success(Request $request)
    {
        $provider = new ExpressCheckout;
        $response = $provider->getExpressCheckoutDetails($request->token);

        if (in_array(strtoupper($response['ACK']), ['SUCCESS', 'SUCCESSWITHWARNING'])) {
            // dd('Your payment was successfully.');
            $transaction = Transaction::create([
                'payment_id' => $response['TOKEN'],
                'amount' => $response['AMT'],
                'currency' => $response['CURRENCYCODE'],
                'created_at' => $response['TIMESTAMP'],
                'status' => 'success',
            ]);

            session()->flash('message', "success");
            return view('welcome');
        }

        session()->flash('message', "Please try again later.");
        return view('welcome');
    }

    public function show(Request $request){
        $word = $request->input('search') ?? null;
        $transactions = Transaction::when($word != null , function ($q) use ($word){
            $q->where('payment_id' , 'like' , '%' . $word . '%');
        })->get();

        return view('all-transaction', compact('transactions'));
    }
}