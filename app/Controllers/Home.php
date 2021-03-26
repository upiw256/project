<?php

namespace App\Controllers;

use M_home;
use M_kepsek;

class Home extends BaseController
{
	protected $Berita;
	protected $kepsek;

	public function __construct()
	{
		$this->Berita = new M_home();
		$this->kepsek = new M_kepsek();
	}
	public function index()
	{
		$all = $this->Berita->orderBy('id_post', 'DESC')->findAll();
		$keyword = $this->request->getVar('berita');
		if ($keyword) {
			$getBerita = $this->Berita->cari($keyword);
		} else {
			$getBerita = $this->Berita->orderBy('id_post', 'DESC');
		}
		$data = [
			'berita' => $getBerita->paginate(3, 'berita'),
			'all' => $all,
			'pager' => $this->Berita->pager,
			'kepsek' => $this->kepsek->findAll(),
		];
		return view('content', $data);
	}
	public function login()
	{
		if (session()->get('nama_user') == null) {
			echo view('login');
		} else {
			return redirect()->to("/admin");
		}
	}
	public function berita($page)
	{
		$all = $this->Berita->orderBy('id_post', 'DESC')->findAll();
		$data = [
			'all' => $all,
			'isi' => $this->Berita->getWhere(['id_post' => $page])->getResult()
		];
		return view('berita', $data);
	}
	//--------------------------------------------------------------------

}
