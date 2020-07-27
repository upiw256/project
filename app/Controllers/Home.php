<?php

namespace App\Controllers;

use M_home;

class Home extends BaseController
{
	public function index()
	{
		$model = new M_home();
		$berita = $model->orderBy('id_post', 'DESC')->findAll(3);
		$data = [
			'berita' => $berita
		];
		echo view('berita/head');
		echo view('berita/navbar', $data);
		echo view('berita/content', $data);
		echo view('berita/footer');
	}
	public function login()
	{
		echo view('login');
	}
	public function page()
	{
		echo view('page');
	}
	public function berita()
	{
		# code...
	}

	//--------------------------------------------------------------------

}
