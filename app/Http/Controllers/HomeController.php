<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    function index(){
        return view('index');
    }


    function user_orders ()  {

        if(Auth::check()){
           $user_orders = DB::table('users')
                        ->rightjoin('orders','users.id','orders.user_id')
                        ->where('users.id',Auth::id()) 
                        ->get();

                        return view('orders.user_orders',[
                            'user_orders'=>$user_orders
                        ]);
        }else{
            return redirect('/');
        }
    }


    function user_orders_details(Request $request,$id){
        if(Auth::check() && $id != null){
            $details_array = DB::table('order_items')->where('order_id',$id)->get();

            return view('orders.user_orders_details',['details_array'=>$details_array,'order_id'=>$id]);
        }
    

    return redirect('/');
}

function search(){
    
    $products= DB::table('products')->limit(3)->get();
    return view('product.search',['products'=>$products]);


}

function search_func(Request $request){

    $key= $request->get('keyword');
    $products= DB::table('products')->where('name','like','%'.$key.'%')->get();

    return view('product.search',['products'=>$products]);
}


}
