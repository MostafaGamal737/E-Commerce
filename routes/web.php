<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminMiddleware;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//-----------------------------user--------------------------
Route::group(['middleware' => 'auth'], function(){

  Route::post('addComment','bodyController@addComment');
  Route::post('SendMessage','bodyController@SendMessage');
  //------------------cart things--------------------
  Route::post('AddToCart','cartController@AddToCart');
  Route::post('DeleteFromCart','cartController@DeleteFromCart');
  Route::get('showCart','cartController@showCart');
  Route::get('mylikes','cartController@showLike');

  //-----------------oayment---------------------
  Route::post('CheckOut','paymentController@payment');
  Route::post('payment','paymentController@makepayment');
  Route::post('order','paymentController@order');
});
Route::get('Home','bodyController@home');
Route::get('Contact-US','bodyController@contact');
Route::get('Shop','bodyController@shop');
Route::get('Shop/{id}','bodyController@getproduct');
Route::get('Blog','bodyController@blog');
Route::get('blog/{id}','bodyController@blogdetail');
Route::get('product/{id}','bodyController@getproducts');
Route::post('like','bodyController@like');
Route::get('Search','bodyController@Search');
Route::get('departments/{name}','bodyController@GetDebartment');
Route::get('categories/{name}','bodyController@GetCategory');
Route::post('Search','bodyController@Search_Result');
Route::get('lang/{lang}','bodyController@setlang');
Route::post('searchprice','bodyController@searchprice');
Route::get('advancedsearch','bodyController@advancedsearch');
Route::post('advancedsearch/result','bodyController@advancedsearchResult');






//--------------------------custome-------------------------
Route::get('Login','customController@login');
Route::post('Login','customController@Enter');
Route::get('Logout','customController@logout');
Route::get('Registeration','customController@register');
Route::post('Registeration','customController@addUser');
Route::post('ResetPassword','customController@ResetPassword');
Route::get('ResetPassword','customController@Reset');
Route::get('ChangePassword/{id}/{reset}','customController@ChangePassword');
Route::post('Change','customController@Change');
//-------------------admin-------------------------

Route::group(['middleware' => ['auth',AdminMiddleware::class]], function(){

Route::get('dashboard','dashboardController@dashboard');
Route::get('GetUsers','dashboardController@getUsers');
Route::get('Debartments','dashboardController@getDebartments');
Route::get('categories','dashboardController@getCategories');
Route::get('products','dashboardController@getproducts');
Route::get('Blogs','dashboardController@Blogs');
  Route::get('About-Us','dashboardController@about');
//---------------------views admins------------------------
Route::get('AddProduct','dashboardController@product');
Route::get('products/{id}','dashboardController@ubdateproduct');
Route::get('AddBlogs','dashboardController@AddBlog');
Route::get('messages','dashboardController@GetMessages');
Route::get('orders','dashboardController@Getorders');
//-------------------admin Add------------------
Route::post('AddProduct','addAdmincontroller@addproducts');
Route::post('Adddepartment','addAdmincontroller@Adddepartment');
Route::post('Addcategory','addAdmincontroller@Addcategory');
Route::post('AddBlogs','addAdmincontroller@AddBlog');
Route::post('AddInfromation','addAdmincontroller@AddInfromation');

//-------------------admin ubdates--------------------
Route::post('products/{id}','ubdateDashboardController@ubdateproduct');
Route::post('user/Ubdate','ubdateDashboardController@UserUpdate');
//----------------Delete Admin----------------
Route::post('Deletedepartment','deleteAdminController@Deletedepartment');
Route::post('DeleteCategory','deleteAdminController@DeleteCategory');
Route::get('DeleteProduct/{id}','deleteAdminController@DeleteProduct');
Route::get('DeleteBlog/{id}','deleteAdminController@DeleteBlog');
Route::get('DeleteUser/{id}','deleteAdminController@DeleteUser');
});
