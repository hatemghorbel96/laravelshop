<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function AddProduct(Request $request){

        // traitement
        $c = new Product();
        // recupere mel form
        $c->name = $request->get('name');
        $c->description = $request->get('description');
        $c->price = $request->get('price');
        $c->quantity = $request->get('quantity');
        $c->category = $request->get('category');
        $c->type = $request->get('type');
        $c->image = $request->get('image');
      

        // persist
        $c->save();

        return redirect('/product/index');
    }

    public function ShowProduct(){


        return view('product.formprod');
    }

    public function products(){

        $products = DB::table('products')->get();
        return view('product.produits',[
            'products' => $products
        ]);
    }

    public function show(Request $request ,$id){

        $product = DB::table('products')->where('id',$id)->get();
        return view('product.show',[
            'product' => $product
        ]);
    }
}
