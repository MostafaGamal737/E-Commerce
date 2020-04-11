<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection\update;
use App\product;
use App\user;
class ubdateDashboardController extends Controller
{
    public function ubdateproduct(Request $data,$id)
    {$image_name='null';
      $product =product::find($id);
      $product->name=$data->name;
      $product->material=$data->material;
      $product->price=$data->price;
      $product->discount=$data->discount;
      $product->amount=$data->amount;
      $product->department_id=$data->department;
      $product->category_id=$data->category;
      if ($data->image) {
        $image_name=time().'.'.$data->image->getClientOriginalExtension();
        $product->image=$image_name;
      }
      if (($data->deal)==true)
      {
        if (count($pro=product::where('dealtime','>', 0)->get())>0)
        {
          $pro[0]->dealtime=0;
          $pro[0]->dealofweek=0;
        $pro[0]->save();
        }

        $product->dealtime=$data->dealtime;
        $product->dealofweek=1;
      }



     $product->save();
      if ($data->image) {
        $data->image->move(public_path('images'),$image_name);
      }

      return redirect()->back();
    }

   public function UserUpdate(Request $data)
   {
     $d=explode(' ',$data->role);
     $user=user::find($d[1]);
     $user->role=$d[0];
     $user->save();
     return 'doen';
   }


}
