<?php
use Illuminate\Support\Facades\Config;
use App\Models\Admin\cart;

function get_default_lang(){
	if (config::get('app.locale') == "ar"){
        echo 'rtl';
    } else {
        echo 'ltr';
    };
    //APP::isLocale('ar')
}
function getquantity($productid){
   $cart = cart::where('product_id', $productid)->select('quantity')->first();
   if($cart)
   return $cart->quantity;

    else{
        return "0";
    }
}