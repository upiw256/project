<?php

namespace App\Controllers;

use M_home;
use App\Models\M_page;

class Home extends BaseController
{
	protected $page;
	public function __construct()
	{
		$this->page = new M_page();
	}
	public function index()
	{
		$BeritaModel = new M_home();
		$all = $BeritaModel->orderBy('id_post', 'DESC')->findAll();
		$keyword = $this->request->getVar('berita');
		if ($keyword) {
			$getBerita = $BeritaModel->cari($keyword);
		} else {
			$getBerita = $BeritaModel->orderBy('id_post', 'DESC');
		}
		$data = [
			'berita' => $getBerita->paginate(3, 'berita'),
			'all' => $all,
			'pager' => $BeritaModel->pager,
			'kepsek' => parent::kepsek(),
			'nav' => parent::menu(),
			'sub' => parent::subMenu(),
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
	public function page($page = '')
	{

		if ($page === "") {
			return redirect()->to("/");
		} else {

			$BeritaModel = new M_home();

			$this->page->where(['slug' => $page]);
			$query = $this->page->get();
			$this->page->select('*');
			$this->page->join('sub_menu', 'page.id_page = sub_menu.id_page', 'inner');
			$this->page->join('user', 'page.id_user = user.id_user', 'inner');
			$this->page->where(['sub_menu.slug_sub' => $page]);

			$querySubIsi = $this->page->get();
			$all = $BeritaModel->orderBy('id_post', 'DESC')->findAll();
			$data = [
				'isi' => $query,
				'all' => $all,
				'nav' => parent::menu(),
				'sub' => parent::subMenu(),
				'isiSub' => $querySubIsi
			];
			echo view('page', $data);
		}
	}
	public function berita($page = '')
	{
		if ($page === "") {
			return redirect()->to("/");
		}
		$BeritaModel = new M_home();
		$berita = $BeritaModel->orderBy('id_post', 'DESC')->findAll();
		$db = \Config\Database::connect();
		$query = $db->query("SELECT * FROM post WHERE id_post ='" . $page . "'");
		$hasil = $query->getResult();
		$data = [
			'isi' => $hasil,
			'all' => $berita,
			'nav' => parent::menu(),
			'sub' => parent::subMenu(),
		];
		if ($hasil == null) {
			echo view('errors/html/error_404');
		} else {
			echo view('berita', $data);
		}
	}

	//--------------------------------------------------------------------

}
