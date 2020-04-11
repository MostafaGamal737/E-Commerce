<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;
use Auth;
use Mail;
use App\Mail\ResetPaswword;
use Session;
class customController extends Controller
{
    public function login()
    {

      if (Auth::check()) {
        return redirect('Home');
      }
      return view('custom\login');
    }
    public function logout()
    {
      Auth::logout();
      return redirect('Login');
    }
    public function Enter(Request $data)
    {
      $this->validate($data  ,
     [
       'email'=>'required|email|',
       'password'=>'required|min:6|max:16',
   ]);

   if (Auth::attempt(['email'=>$data->email,'password'=>$data->password]))
    {
      if (Auth::check()) {
        return redirect('Home');
      }
      Auth::login();
    return redirect('Home');
    }
    return redirect('Login')->with('message','username or password is wrong');
    }








    public function register()
    {
          if (Auth::check()) {
            return redirect('Home');
          }
      return view('custom\register');
    }



    public function addUser(Request $data)
    {
      $this->validation($data);
      $user=new user();
      $user->name=$data->user_name;
      $user->email=$data->Email;
      $user->role='user';
      $user->reset='0';
      $user->password=bcrypt($data->password);
      $user->remember_token=$data->_token;
      $user->save();
      return redirect('Login');;
    }

    public function validation($data)
    {

        return $this->validate($data,
        [
        'user_name'=>'required|max:20|min:6',
        'Email'=>'required|email|unique:users',
        'password'=>'required|confirmed|min:6|max:16',
      ]);

    }



    public function ResetPassword(Request $data)
    {
      $this->validate($data,
      [
      'email'=>'required|email',
    ]);
      $user=user::where('email' ,$data->email)->first();
      $user->reset=rand(1,10000);
      Session::put('key', $user->reset);
      Session::put('id', $user->id);
      Session::put('email', $user->email);

      $user->save();
      Mail::send(new ResetPaswword());
      return back();
    }
    public function Reset()
    {
      return view('custom\resetpassword');
    }

    public function ChangePassword($reset,$id)
    {
      $user=user::find($id);

      if ($user)
       {
         if ($user->reset==$reset)
          {
            $user_id=$user->id;
            return view('custom\changepassword',compact('user_id'));
          }

       }
       else {
         return redirect('Login');
       }
    }

    public function Change(Request $data)
    {
      $this->validate($data,
      [
      'password'=>'required|min:6',
    ]);
      $user= user::find($data->id);
      $user->reset=0;
      $user->password=bcrypt($data->password);
      $user->save();
      return redirect('Login');
    }



}
