<?php

namespace App\Controllers;


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

	//--------------------------------------------------------------------

}
