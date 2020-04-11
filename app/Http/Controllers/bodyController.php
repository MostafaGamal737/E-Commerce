<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\blog;
use App\comment;
use App\department;
use App\product;
use App\category;
use App\like;
use App\information;
use App\message;
use App;
use Auth;
class bodyController extends Controller
{



  public function setlang($lang)
  {
    session(['lang' => $lang]);
    return back();
  }
    public function home()
    {
      App::setLocale(session('lang'));
      $products=product::limit(3)->get();
      $blogs=blog::limit(3)->get();
      $departments=department::all();
      $categories=category::all();
      $likes=like::where('user_id',Auth::id())->get();
      $dealofweek=product::where('dealtime','>', 0)->get()->first();

      return view('body\home',compact('dealofweek','likes','blogs','products','departments','categories'));
    }
    public function contact()
    {App::setLocale(session('lang'));
      $information= information::first();
      return view('body\contact',compact('information'));
    }
    public function shop()
    {App::setLocale(session('lang'));
      $products=product::paginate(6);
      $allproducts=product::all();
      $categories=category::all();
      $likes=like::where('user_id',Auth::id())->get();
      return view('body\shop',compact('likes','products','allproducts','categories'));
    }
    public function blog()
    {App::setLocale(session('lang'));
      $posts=blog::all();
      return view('body\blog',compact('posts'));
    }
    public function blogdetail($id)
    {App::setLocale(session('lang'));
      $post=blog::find($id);
      if ($post) {
        // code...
      $comments=comment::all();
      $prevPost=$this->PreviousPost($id);
      $nextPost=$this->nextPost($id);
      return view('body\blogdetail',compact('post','prevPost','nextPost','comments'));
    }
    else {
      return redirect('body_not_eixt');
    }
    }

    public function PreviousPost($id)
    {
      $PrevPost=blog::where('id', '<',$id)->max('id');
      $post=blog::find($PrevPost);
      return $post;
    }
    public function nextPost($id)
    {
      $nextPost=blog::where('id', '>',$id)->min('id');
      $post=blog::find($nextPost);
      return $post;
    }


    public function addComment(Request $data)
    {
      $this->validate($data,
     [
     'comment'=>'required|max:255|min:1',

   ]);
      $comment=new comment();
      $comment->comment=$data->comment;
      $comment->blog_id=$data->blog_id;
      $comment->user_id=$data->user_id;
      $comment->product_id=$data->product_id;
      $comment->save();
      return redirect()->back();

    }
    public function getproducts($id)
    {App::setLocale(session('lang'));
      $category=category::find($id);
      $products=product::where('category_id',$category->id)->limit(3)->get();
      return $products;
    }
    public function getproduct($id)
    {App::setLocale(session('lang'));
      $comments=comment::all();
      $likes=like::all();
      $product=product::find($id);
      $Previousproduct=$this->Previousproduct($id);
      $nextproduct=$this->nextproduct($id);
      if ($product!=null) {
        // code...
        return view('body/product',compact('likes','product','Previousproduct','nextproduct','comments'));
      }
      return view('errors/product');
    }
    public function Previousproduct($id)
    {
      $PrevPost=product::where('id', '<',$id)->max('id');
      $post=product::find($PrevPost);
      return $post;
    }
    public function nextproduct($id)
    {
      $nextPost=product::where('id', '>',$id)->min('id');
      $post=product::find($nextPost);
      return $post;
    }
    public function like(Request $data)
    {
       $likes=like::where('product_id',$data->product_id)->get();
      foreach ($likes as $like)
       {
         if ($like->like==true&&$like->user_id==Auth::id()) {
           $like->delete();
           return 'done';
         }

       }

      $like=new like();
      $like->like=$data->like;
      $like->product_id=$data->product_id;
      $like->user_id=$data->user_id;
      $like->save();
      return 'new like';
    }


    public function SendMessage(Request $data)
    {
      $this->validate($data,
     [
     'name'=>'required|max:20|min:3',
     'email'=>'required|max:50|min:6',
     'message'=>'required|',

   ]);
   $message=new message();
   $message->message=$data->message;
   $message->name=$data->name;
   $message->email=$data->email;
   $message->save();
   return back();
    }


    public function Search(Request $data)
    {
      $term=$data->term;
      $products=product::where('name', 'like','%'.$term.'%')->get();

      if (count($products)==0) {
        $result[]='no result';
      }
      else {
        foreach ($products as $product) {
          $result[]=$product->name;
        }
      }
      return $result;
    }

  public function Search_Result(Request $data)
  {
     $product=product::where('name','=', $data->search)->first();
     if ($product) {
       return redirect('Shop/'.$product->id);
     }
     else {
       return redirect('nomatches');
     }
  }
  public function GetDebartment($name)
  {
     $department=department::where('name', $name)->first();
     $products=product::where('department_id', $department->id)->paginate(3);
     $Allproducts=product::where('department_id', $department->id)->get();
     $likes=like::where('user_id',Auth::id())->get();
    return view('body.departments',compact('products','Allproducts','department','likes'));
  }
  public function GetCategory($name)
  {
     $thiscategory=category::where('name', $name)->first();

     $products=product::where('category_id', $thiscategory->id)->paginate(3);
     $Allproducts=product::where('category_id', $thiscategory->id)->get();
     $likes=like::where('user_id',Auth::id())->get();
    return view('body.category',compact('products','Allproducts','thiscategory','likes'));
  }
  public function searchprice(Request $data)
  {
    $products=product::where('price','>=',$data->min)->where('price','<=',$data->max)->get();
    $likes=like::where('user_id',Auth::id())->get();
    return view('body.searchprice',compact('products','likes'));
  }
  public function advancedsearch(Request $data)
  {
    return view('body.advancedsearch');
  }
  public function advancedsearchResult(Request $data)
  {

    $products=product::where('price','>=',$data->min)->where('price','<=',$data->max)->where('category_id',$data->category)->where('department_id',$data->department)->get();

    return view('body.advancedsearchresult',compact('products'));
  }











}
