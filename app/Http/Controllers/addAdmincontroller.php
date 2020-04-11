<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\product;
use App\department;
use App\category;
use App\blog;
use App\information;
class addAdmincontroller extends Controller
{
  public function getDepartmenId($data)
  {  $departments=department::all();
    foreach ($departments as $department) {
      if ($department->name==$data->department) {
        return $department->id;
      }
    }
  }
  public function getcategoryId($data)
  {

    $categories=category::all();
    foreach ($categories as $category) {
      if ($category->name==$data->category) {
        return $category->id;
      }
    }
  }



    public function addproducts(Request $data)
    {
      $department=$this->getDepartmenId($data);
      $category=$this->getcategoryId($data);
       $image_name='null';
      $this->validation($data);
      $product=new product();
      $product->name=$data->name;
      $product->price=$data->price;
      $product->dealofweek=0;
      $product->dealtime=0;
      $product->discount=$data->discount;
      $product->amount=$data->amount;
      $product->material=$data->material;
      $product->department_id=$department;
      $product->category_id=$category;

      $image_name=time().'.'.$data->image->getClientOriginalExtension();
      $product->image=$image_name;
     $product->save();

        $data->image->move(public_path('images'),$image_name);

      return redirect('products')->with('message','you registered successfullyu');
    }



    public function validation($data)
    {
      return $this->validate($data,
      [
      'name'=>'required|max:20|min:6',
      'price'=>'required|numeric|min:2',
      'department'=>'required|',
      'category'=>'required|',
      'discount'=>'required|numeric|min:1',
      'material'=>'required',
      'amount'=>'required|numeric|',
      'image'=>'required|image|mimes:jpg,jpeg,gif,png',
    ]);
    }
    public function Postvalidation($data)
    {
      return $this->validate($data,
      [
      'title'=>'required|max:50|min:6',
      'body'=>'required|min:5',
      'about'=>'required|min:5|max:50',
      'image'=>'required|image|mimes:jpg,jpeg,gif,png',
    ]);
    }


  public function Adddepartment(Request $data)
  {
  //  $this->validate($data,
  //  [
  //    'name'=>'required|max:20|min:2',
  //  ]);
    $departmen=new department();
    $departmen->name=$data->name;
    $departmen->save();
    return $departmen;
  }
  public function Addcategory(Request $data)
  {
     $this->validate($data,
    [
    'name'=>'required|',
  ]);

    $category=new category();
    $category->name=$data->name;
    $category->save();

  }
  public function AddBlog(Request $data)
  {
    $image_name='null';
    $this->Postvalidation($data);
    $blog=new blog();
    $blog->title=$data->title;
    $blog->about=$data->about;
    $blog->body=$data->body;
    $image_name=time().'.'.$data->image->getClientOriginalExtension();
    $blog->image=$image_name;
    $blog->save();
    $data->image->move(public_path('postimages'),$image_name);
    return redirect()->back();
  }
 public function AddInfromation(Request $data)
 {
   $this->validate($data,
  [
  'lat'=>'required',
  'lng'=>'required',
  'email'=>'required|email',
  'address'=>'required|min:5|max:20',
  'phone'=>'required|numeric|min:6',
]);
   $information=new information();
   if (count(information::all())>0) {

   $information=information::first();
   $information->lat=$data->lat;
   $information->lng=$data->lng;
   $information->adress=$data->address;
   $information->email=$data->email;
   $information->phone=$data->phone;
   $information->save();
   return back();
 }

 $information->lat=$data->lat;
 $information->lng=$data->lng;
 $information->adress=$data->address;
 $information->email=$data->email;
 $information->phone=$data->phone;
 $information->save();
 return back();
 }

}
