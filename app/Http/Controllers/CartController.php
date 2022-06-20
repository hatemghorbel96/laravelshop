<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function cart(){
        return view('panier.cart');
    }

    public function addcart(Request $request){

        // if we have a cart in the session
        if($request->session()->has('cart')){

            $cart = $request->session()->get('cart');  // ['6' => [] ]

            $products_ids = array_column($cart,'id'); // array of numbers (id)

            $id = $request->input('id');  

            if(!in_array($id,$products_ids)){  // ken id mawech mawjoud fi list mte3 product_ids nwaliw najoutiwah else augmentation fi quantity

                    $name = $request->input('name');
                    $description = $request->input('description');
                    $image = $request->input('image');
                    $price = $request->input('price'); //origin price
                    $quantity = $request->input('quantity');
                    $sale_price = $request->input('sale_price');  // discounted price

                    if($sale_price != null){
                        $change_price = $sale_price;

                    }else{
                        $change_price = $price;
                    }

                    $product_array = array(
                                'id'=>$id,
                                'name'=>$name,
                                'description'=>$description,
                                "image"=>$image,
                                'price'=>$change_price,
                                'quantity'=>$quantity,
                    );

                    $cart[$id] = $product_array;
                    $request->session()->put('cart', $cart);

                    //product already in the cart
            }else{
                echo "<script>alert('Product already in cart');</script>";

            }
               $this->calculetotal($request); 
            return view('panier.cart');

        }else{          // if we dont have a cart in session

            $cart = array();
            $id = $request->input('id');  
            $name = $request->input('name');
            $image = $request->input('image');
            $price = $request->input('price'); //origin price
            $quantity = $request->input('quantity');
            $sale_price = $request->input('sale_price');  // discounted price

            if($sale_price != null){
                $change_price = $sale_price;

            }else{
                $change_price = $price;
            }

            $product_array = array(
                        'id'=>$id,
                        'name'=>$name,
                        "image"=>$image,
                        'price'=>$change_price,
                        'quantity'=>$quantity,
            );

            $cart[$id] = $product_array;
            $request->session()->put('cart', $cart);
               $this->calculetotal($request); 
            return view('panier.cart');
        }

    }

    
    function calculetotal (Request $request){

        $cart =$request->session()->get('cart');

        $total_price = 0;
        $total_quantity = 0;
       
        foreach ($cart as $id => $p){
            $product = $cart[$id];
            $price = $p['price'];
            $quantity = $p['quantity'];

            $total_price = $total_price + ($price*$quantity);
            $total_quantity = $total_quantity + $quantity;
        }
        $request->session()->put('total',$total_price);
        $request->session()->put('quantity',$total_quantity);
    } 


    function remove_from_cart(Request $request){
        if($request->session()->has('cart')){
            $id = $request->input('id');
            $cart = $request->session()->get('cart');
            unset($cart[$id]);

            $request->session()->put('cart',$cart);

             $this->calculetotal($request); 
        }
        return view('panier.cart');
    }

    

    function edit_product_quantity(Request $request){

        if($request->session()->has('cart')){
            $product_id = $request->input('id');
            $product_quantity = $request->input('quantity');

            if($request->has('down_prod')){
                $product_quantity = $product_quantity - 1;

            }else if($request->has('up_prod')){
                $product_quantity = $product_quantity + 1;
            }else {

            }

            if($product_quantity <= 0){
                $this->remove_from_cart($request);
            }
            $cart = $request->session()->get('cart');
           
        if(array_key_exists($product_id,$cart)){
                    $cart[$product_id]['quantity'] = $product_quantity;
                    $request->session()->put('cart',$cart);
                     $this->calculetotal($request); 
        }
            
        }
        return view('panier.cart');
    }

    public function checkout(){

        return view('panier.checkout');
    }

    public function place_order(Request $request){

        // ken session fiha cart nejemou net3adew lel place order
        if($request->session()->has('cart')){
            $name = $request->input('name');
            $email = $request->input('email');
            $phone = $request->input('phone');
            $city = $request->input('city');
            $address = $request->input('address');
            $cost = $request->session()->get('total');
            $status = 'Not Paid';
            $date = date('Y-m-d');

            $cart = $request->session()->get('cart');

            if(Auth::check()){

                //they are logged in

                $user_id = Auth::id();
                
            }else {

                $user_id = 0;

            }

            $order_id = DB::table('orders')->insertGetId([
                            'name'=>$name,
                            'email'=>$email,
                            'phone'=>$phone,
                            'city'=>$city,
                            'address'=>$address,
                            'cost'=>$cost,
                            'status'=>$status,
                            'date' =>$date,
                            'user_id'=> $user_id
                        ],'id');

                        foreach ( $cart as $id =>$p){
                           $product= $cart[$id];
                           $product_id = $p['id'];
                           $product_name = $p['name'];
                           $product_price = $p['price'];
                           $product_quantity = $p['quantity'];
                           $product_image = $p['image'];

                           // insert fel ligne commande
                           DB::table('order_items')->insert([
                            'order_id'=>$order_id,
                            'product_id' =>  $product_id,
                            'product_name' =>  $product_name,
                            'product_price' =>  $product_price,
                            'product_image' =>  $product_image,
                            'product_quantity' => $product_quantity,                            
                            'order_date' =>  $date,
                           ]);
                        }

                        // make order_id in session bech nest7a9ouha fel payment
                       
                        $request->session()->put('order_id',$order_id);
                        return view('payment.payment');
            
        }else{

            return redirect('/');
        }

        return view('panier.place_order');
    }
}
