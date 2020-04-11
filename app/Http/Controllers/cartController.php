<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\product;
use App\cart;
use App\like;
use Auth;
class cartController extends Controller
{//
    public function AddToCart(Request $data)
    {
      $this->validate($data,
     [
     'quantity'=>'required|max:3|min:1|numeric',

   ]);
      if (Auth::check())
       {
      $product=product::find($data->product_id);
      $cart=new cart();
      if ($data->quantity>$product->amount) {
        return redirect('you_can_only_get_of_this_product_'.$product->amount);
      }
      $cart->quantity=$data->quantity;
      $cart->product_id=$data->product_id;
      $cart->user_id=Auth::id();
      $cart->total_price=($cart->quantity)*($product->price);
      $cart->save();
      return back();
    }else {
      return redirect('Login');
    }
    }
    public function showCart()
    {

      return view('body/cart');
    }
    public function DeleteFromCart(Request $data)
    {
       $cart=cart::find($data->Cartproduct_id);
       $cart->delete();
      return 'done';
    }


    public function showLike()
    {
      if (Auth::check()) {
         $likes=like::where('user_id',Auth::id())->get();
      }

      return view('body/likes',compact('likes'));
    }
}
