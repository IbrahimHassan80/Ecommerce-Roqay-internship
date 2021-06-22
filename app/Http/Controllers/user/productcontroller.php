<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\product;
use App\Models\Admin\cart;

class productcontroller extends Controller
{
    public function show_product($id){
        $product = product::find($id);
        return view('user.products.show_product', compact('product'));
    }

    public function add_to_card(Request $request){
        $cart = cart::where('user_id', Auth()->user()->id,)->where('product_id' , $request->product_id,)->first();
        if(!$cart){
        $cart = cart::create([
            'user_id' => Auth()->user()->id,
            'product_id' => $request->product_id,
        ]); } else {
            cart::where('user_id', Auth()->user()->id)->where('product_id' , $request->product_id)->delete();
        }
        return back();       
    }

    public function showUserProducts(){
        $product = Auth()->user()->product;
        return view('user.products.users_products', compact('product'));
    }

}
