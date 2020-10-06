<?php 

class LoginController extends BaseController
{
	public function login()
	{
		return View::make('login.login');
	}

	public function doLogin()
	{

		$username = Input::get('username');
		$password = Input::get('password');

		$password = md5($password);

		if ($manage = DB::table('user')->where('name', $username)->where('password', $password)->first()) {
			Session::set('user', $manage);
			return Redirect::to('/');
		} else {
			Session::flash('info','用户名或密码错误');
			return Redirect::to('login');
		}

		

	}

	public function logout()
	{
		Session::flush();
		return Redirect::to('login');
	}

	public function register()
	{
		return View::make('login.register');
	}

	public function doRegister()
	{
		$username = Input::get('username');
		$password = Input::get('password');
		$user = DB::table('user')->where('name', $username)->first();
		if ($user) {
			Session::flash('info','用户名已存在');
			return Redirect::to('register');
		} else {
			DB::table('user')->insert(array(
				'name'=> $username,
				'password'=> md5($password),
				'created_time'=> date('y-m-d H:i:s'),
			));
			$login_user = DB::table('user')->where('name', $username)->where('password', $password)->first();
			Session::set('user', $login_user);
			return Redirect::to('/');
		}
	}
}