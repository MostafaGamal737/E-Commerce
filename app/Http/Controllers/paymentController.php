<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Stripe;
use Auth;
use App\cart;
use App\user;
use App\order;
use App\product;
class paymentController extends Controller
{
  public function payment(Request $data)
     {
         $carts=$data->carts;
         $total=$data->total_price;
         return view('body/payment',compact('carts','total'));
     }

     /**
      * success response method.
      *
      * @return \Illuminate\Http\Response
      */
     public function makepayment(Request $request)
     {

       $total=$request->total_price;
       $carts_id= explode(' ', $request->carts);

       $carts=array();
       $user=user::find(Auth::id());
       for ($i=0; $i <count($carts_id) ; $i++) {
       array_push($carts,cart::find($carts_id[$i]));
     }

     $order=new order();
     $order->user_id=Auth::id();
     $order->total_price=$total;
     $order->payments=$request->carts;


         Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
         Stripe\Charge::create ([
                 "amount" => $total,
                 "currency" => "usd",
                 "source" => $request->stripeToken,
                 "description" => "Test payment from itsolutionstuff.com."
         ]);

         Session::flash('success', 'Payment successful!');
         $order->save();
         foreach ($carts as $cart) {
           Cart::find($cart)[0]->delete();
           $product=product::find($cart->product_id);
           $product->amount=($product->amount)-($cart->quantity);
           $product->save();
         }
         return redirect('Home');
     }


















     public function order(Request $payments)
     {
      $products_id= explode(' ', $payments->carts);
      $total=$payments->total_price;
      $carts=array();
      $user=user::find(Auth::id());
      for ($i=0; $i <count($products_id) ; $i++) {
      array_push($carts,cart::find($products_id[$i]));
      }
       $order=new order();
       $order->user_id=$user->id;
       $order->total_price=$total;
       $order->payments=$payments->carts;
       $order->save();
       return view('order',compact('carts','total','user'));
     }
}
