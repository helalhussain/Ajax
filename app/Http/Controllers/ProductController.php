<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function sear(Request $request){
        $query = Product::query();
        $categories = Category::all();
        if($request->ajax()){
           $products = $query->where(['category_id'=>$request->category])->get();
           return response()->json(['products'=>$products]);
        }
        $products = $query->get();
        return view('search',compact('categories','products'));
    }
}
