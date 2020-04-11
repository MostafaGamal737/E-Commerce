<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;
use App\department;
use App\category;
use App\product;
use App\blog;
use App\message;
use App\order;
class dashboardController extends Controller
{
    public function dashboard()
    {
      //{{($user->created_at->addDays(30))}} sub
      return view('admin\views\dashboard',compact('user'));
    }
    public function getUsers()
    {
      $users=user::all();
      return view('admin\views\getusers',compact('users'));
    }
    public function getDebartments()
    {
      $departments=department::all();
      return view('admin\views\departments',compact('departments'));
    }
    public function getCategories()
    {
      $categories=category::all();
      return view('admin\views\categories',compact('categories'));
    }
    public function getproducts()
    {
      $products=product::all();
      return view('admin\views\products',compact('products'));
    }
    public function product()
    {
      $departments=department::all();
      $categories=category::all();
      return view('admin\add\addproducts',compact('departments','categories'));
    }

    public function ubdateproduct($id)
    {  $departments=department::all();
      $categories=category::all();
      $product=product::find($id);
      return view('admin\ubdates\ubdateproduct',compact('product','departments','categories'));
    }

    public function Blogs()
    {
      $blogs=blog::all();
      return view('admin\views\blogs',compact('blogs'));
    }
    public function AddBlog()
    {
      return view('admin\add\addblogs');
    }
    public function about()
    {
      return view('admin\views\AboutUs');
    }
    public function GetMessages()
    {
      $messages=message::all();
      return view('admin\views\messages',compact('messages'));
    }
    public function Getorders()
    {
      $orders=order::all();
    
      return view('admin\views\orders',compact('orders'));
    }

}
