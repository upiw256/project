<?php

namespace App\Controllers;

use M_login;

class Home extends BaseController
{
	public function index()
	{
		return view('home');
	}
	public function login()
	{
		echo view('login');
	}
	public function page()
	{
		echo view('page');
	}
	public function cek()
	{
		$user = new M_login();
		$username = $this->request->getVar('username');
		$password = $this->request->getVar('password');
		$cekuser = $user->where('username', $username)->first();
		$cekpass = $user->where('password', $password)->first();
		if ($cekuser == null) {
			echo "username salah";
		} elseif ($cekpass == null) {
			echo "Password salah";
		} elseif ($cekuser == null && $password == null) {
			echo "Username dan Password salah";
		} else {
			echo "BERHASIL";
		}
	}

	//--------------------------------------------------------------------

}
