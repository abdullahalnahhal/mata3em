<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\UsersRequest;
use App\Http\Requests\UsersUpdateRequest;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Hash;
use App\Http\MainControllers\DishesController  as Main;
use Auth;

class UsersController  extends Main
{
	  public function index ()
    {
        $users = User::all();
        return view('settings.index', [
            'active'=>'Users',
            'users' => $users,
        ]);
    }
    public function new()
    {
      return view('settings.form',[
        'active'=>'Users',
        'action'=>'New',
      ]);
    }
    public function create (UsersRequest $request)
		{
			$user = new User;
			$user->name = $request->name;
      $user->email = $request->username;
			$user->password = Hash::make($request->password);
		  if ($user->save()) {
		      return redirect()->route('settings.users.index')->with('created','settings.User Has Been Created ...!');
		  }
		  return back()->withErrors('common.Sorry But there Was an issue in saving Data please try again');
		}
    public function edit($id)
    {
        $user = User::find($id);
        return view('settings.form',[
            'active'=>'Users',
            'action'=>'Edit',
            'user'=>$user
        ]);
    }
    public function update (UsersUpdateRequest $request, $id)
		{
			$user = User::find($id);
			$user->name = $request->name;
      $user->email = $request->username;
      if ($request->password) {
        $user->password = Hash::make($request->password);
      }
		  if ($user->save()) {
		      return redirect()->route('settings.users.index')->with('created','settings.User Has Been Created ...!');
		  }
		  return back()->withErrors('common.Sorry But there Was an issue in saving Data please try again');
		}
		public function login()
		{
			return view('login');
		}
		public function loginSubmit(LoginRequest $request)
		{
			$credintials = [
					'email'=>$request->username,
					'password'=>$request->password,
			];
			// attempt to log the user in
			$auth = Auth::guard('web')->attempt($credintials);
			// if successful then redirect to their intended location
			if ($auth) {
				// $this->makeSession($request);
				return redirect()->intended(route("index"));
			}
			// if not success return to the login page with the form data
			return redirect()->back()->withInput($request->only('email', 'remember'));
		}
		public function logout()
		{
			Auth::guard('web')->logout();
			return redirect()->route('login');
		}
}

?>
