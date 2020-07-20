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
		$session = \Config\Services::session();
		$user = new M_login();
		$username = $this->request->getVar('username');
		$password = $this->request->getVar('password');
		$cekuser = $user->where('username', $username)->first();
		$cekpass = $user->where('password', $password)->first();
		if ($cekuser == null) {
			$session->setFlashdata('pesan', 'Username Salah');
			return redirect()->to('/login');
		} elseif ($cekpass == null) {
			$session->setFlashdata('pesan', 'Password Salah');
			return redirect()->to('/login');
		} elseif ($cekuser == null && $password == null) {
			$session->setFlashdata('pesan', 'Username dan Password Salah');
			return redirect()->to('/login');
		} else {
			return redirect()->to('/admin');
		}
	}
	//--------------------------------------------------------------------

}
