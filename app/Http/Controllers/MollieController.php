<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mollie\Laravel\Facades\Mollie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\user;

class MollieController extends Controller
{   

    public function  __construct() 
    {
        Mollie::api()->setApiKey('test_FbVACj7UbsdkHtAUWnCnmSNGFWMuuA');
    }

    /**
     * Create Mollie Payment
     *
     * @return Response
     */
    public function createPayment()
    {   
        $order = DB::table('orders')->get();
        $my_orders = $order->where('user_id', Auth::user()->id);

        $product = DB::table('products')->get();

        $my_price = 0;
        foreach($my_orders as $my_order){
            $my_order_product = $my_order->product_id;

            $my_product = $product->where('id', $my_order_product);
            $my_product_price = $my_product->pluck('price');
            $my_order_amount = $my_order->amount;
            $my_order_price = $my_order_amount * $my_product_price[0];
            
            $my_price += $my_order_price;
    
        }

        $my_price = `"` . $my_price . ".00" .`"`; // convert to string
        // check if customer already created or not
        $mollie_customer_id = User::where('id',Auth::user()->id)->pluck('mollie_customer_id')->first();

        if (empty($mollie_customer_id)) {
            //API to create customer
            $customer = Mollie::api()->customers->create([
                "name" => Auth::user()->name,
                "email" => Auth::user()->email,
            ]);

            $mollie_customer_id = $customer->id;

            User::where('id',Auth::user()->id)->update(['mollie_customer_id'=>$mollie_customer_id]);
        }

        // Creating Payment
        $payment = Mollie::api()->customers->get($mollie_customer_id)->createPayment([
            "amount" => [
               "currency" => "EUR",
               "value" => $my_price,
            ],
            "description" => "Valentijnsverkoop",
            "sequenceType" => "first",
            "redirectUrl" => route('mollie.payment.success'), // after the payment completion where you to redirect
        ]);

        $payment = Mollie::api()->payments()->get($payment->id);
        
        // redirect customer to Mollie checkout page
        return redirect($payment->getCheckoutUrl(), 303);
        
    }

    /**
     * Create Mollie Subscription
     *
     * @return Response
     */
    public function createMollieSubscription()
    {
        $mollie_customer_id = User::where('id',Auth::user()->id)->pluck('mollie_customer_id')->first();

        $customer = Mollie::api()->customers->get($mollie_customer_id);

        $subscription = $customer->createSubscription([
            "description" => "Quarterly payment",
            "interval" => "3 months",
            "amount" => [
                "currency" => "EUR",
                "value" => "25.00",
            ],
            "times" => 12,
        ]);
        dd($subscription);
    }

    /**
     * Page redirection after the successfull payment
     *
     * @return Response
     */
    public function paymentSuccess() 
    {   
        return view('mollie/mollie-success')->with('status','payment succesfully received');
    }
}