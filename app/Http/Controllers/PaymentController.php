<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    function payment(){

        return view('payment.payment');
    }

    function verify_payment(Request $request ,$transaction_id){
        $s = $transaction_id;
        //$request->session()->put('transaction_id',$s);
        return redirect('/complete_payment');
    }

    function complete_payment(Request $request){
       

            $order_id = $request->session()->get('order_id');
          //  $transaction_id = $request->session()->get('transation_id');
            $transaction_id = '123';
            $order_status = 'paid';
            $payment_date = date('Y-m-d');

                // changer order status to paid
                $affected = DB::table('orders')
                ->where('id',$order_id)
                ->update(['status'=>$order_status]);


                //store in table payment 

                DB::table('payments')->insert([
                    'order_id'=>$order_id,
                    'transaction_id' =>$transaction_id,
                    'date' =>$payment_date,
                ]);

                // remove panier from session
                $request->session()->flush();
                
                return view('payment.thankyou')->with('order_id',$order_id);

      
    }


    function thankyou(){

        return view('payment.thankyou');
    }
}
