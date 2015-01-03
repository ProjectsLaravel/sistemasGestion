<?php

class UserController extends BaseController {

  public function register()
  {
    $data = Input::only(['first_name','last_name','username','email','password']);

    $newUser = User::create($data);

    Mail::send('emails.welcome', array('first_name'=>Input::get('first_name')), function($message){
      $message->to(Input::get('email'), Input::get('first_name').' '.Input::get('last_name'))->subject('Welcome to AuthLaravelSimple');
    });

    if($newUser){
      Auth::login($newUser);
      return View::make('auth/dash');
    }

    return Redirect::route('showRegister')->withInput();

  }

  public function account()
  {
    $user = Auth::user();
    return View::make('users/account',compact('user'));
  }

  public function updateUser()
  {
    $id = Input::get('id');
    $user = User::find($id);
    $data = Input::all();
    $user->fill($data);
    $user->save();

    Mail::send('emails.updateInfo', array('first_name'=>Input::get('first_name')), function($message){
      $message->to(Input::get('email'), Input::get('first_name').' '.Input::get('last_name'))->subject('Succes update');
    });

    return View::make('auth/dash');
  }

  public function update_account()
  {

  }

}
