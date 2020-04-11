<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;
use App\department;
use App\category;
use App\product;
use App\blog;
class deleteAdminController extends Controller
{
  public function Deletedepartment(Request $data)
  {
      $department=department::find($data->id);
      $department->delete();
  }
  public function DeleteCategory(Request $data)
  {
      $category=category::find($data->id);
      $category->delete();
  }
  public function DeleteProduct($id)
  {
      $product=product::find($id);
    $product->comments()->delete();
    $product->likes()->delete();
    $product->delete();
      return back();
  }
  public function DeleteBlog($id)
  {
    $blog=blog::find($id);
    $blog->comments()->delete();
    $blog->delete();
      return back();
  }
  public function DeleteUser($id)
  {
    $user=user::find($id);
      $user->comments()->delete();
      $user->likes()->delete();
      $user->delete();

      return back();
  }
}
