<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function AddCategory(Request $request){

        // traitement
        $c = new Category();
        // recupere mel form
        $c->name = $request->get('name');

        // persist
        $c->save();

        return 'cate add with success';
    }

    public function ShowCategory(){


        return view('category.form');
    }
}
