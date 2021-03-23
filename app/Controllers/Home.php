<?php

namespace App\Controllers;

use CodeIgniter\Debug\Toolbar\Collectors\Views;
use M_home;
use M_kepsek;

class Home extends BaseController
{

	public function index()
	{
		$pager = \Config\Services::pager();
		$db = \Config\Database::connect();
		$query = $db->query("SELECT * FROM post INNER JOIN kepsek ON post.id_kepsek = kepsek.id_kepsek ORDER BY kepsek.id_kepsek DESC LIMIT 1");
		$queryNav = $db->query("SELECT * FROM page");
		$querySub = $db->query("SELECT * FROM ((sub_menu RIGHT JOIN page ON page.id_page = sub_menu.id_page)INNER JOIN user ON page.id_user = user.id_user)");
		$kepsek = $query->getResult();
		$hasilNav = $queryNav->getResult();
		$hasilSub = $querySub->getResult();
		$BeritaModel = new M_home();
		$keyword = $this->request->getVar('berita');
		$all = $BeritaModel->orderBy('id_post', 'DESC')->findAll();
		if ($keyword) {
			$getBerita = $BeritaModel->cari($keyword);
		} else {
			$getBerita = $BeritaModel->orderBy('id_post', 'DESC');
		}
		// $kepsekModel = new M_kepsek();
		// $kepsek = $kepsekModel->getKepsek();
		// $datakepsek = $this->db->table('post')->select('*')->join('kepsek', 'kepsek.id_kepsek = post.id_post')->get();
		//dd($kepsek);
		// $runtext = $BeritaModel->orderBy('id_post', 'DESC')->findAll();
		$data = [
			'berita' => $getBerita->paginate(3, 'berita'),
			'all' => $all,
			'pager' => $BeritaModel->pager,
			// 'runtext' => $runtext,
			'kepsek' => $kepsek,
			'nav' => $hasilNav,
			'sub' => $hasilSub,
		];
		echo view('berita/head');
		echo view('berita/navbar', $data);
		echo view('berita/content', $data);
		echo view('berita/footer');
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
		$BeritaModel = new M_home();
		$berita = $BeritaModel->orderBy('id_post', 'DESC')->findAll();
		// $runtext = $BeritaModel->orderBy('id_post', 'DESC')->findAll();
		$db = \Config\Database::connect();
		$query = $db->query("SELECT * FROM page WHERE slug ='" . $page . "'");
		$queryNav = $db->query("SELECT * FROM page ");
		$querySub = $db->query("SELECT * FROM ((sub_menu INNER JOIN page ON page.id_page = sub_menu.id_page)INNER JOIN user ON page.id_user = user.id_user) ");
		$querySubIsi = $db->query("SELECT * FROM ((sub_menu INNER JOIN page ON page.id_page = sub_menu.id_page)INNER JOIN user ON page.id_user = user.id_user) WHERE sub_menu.slug_sub = '" . $page . "' ");
		$hasilSubisi = $querySubIsi->getResult();
		$hasil = $query->getResult();
		$hasilNav = $queryNav->getResult();
		$hasilSub = $querySub->getResult();
		$data = [
			'isi' => $hasil,
			'berita' => $berita,
			// 'runtext' => $runtext,
			'nav' => $hasilNav,
			'sub' => $hasilSub,
			'isiSub' => $hasilSubisi
		];
		echo view('berita/head');
		echo view('berita/navbar', $data);
		echo view('page', $data);
		echo view('berita/footer');
	}
	public function berita($page = '')
	{
		$BeritaModel = new M_home();
		$berita = $BeritaModel->orderBy('id_post', 'DESC')->findAll();
		// $runtext = $BeritaModel->orderBy('id_post', 'DESC')->findAll();
		$db = \Config\Database::connect();
		$query = $db->query("SELECT * FROM post WHERE id_post ='" . $page . "'");
		$queryNav = $db->query("SELECT * FROM page ");
		$querySub = $db->query("SELECT * FROM ((sub_menu INNER JOIN page ON page.id_page = sub_menu.id_page)INNER JOIN user ON page.id_user = user.id_user) ");
		$hasil = $query->getResult();
		$hasilNav = $queryNav->getResult();
		$hasilSub = $querySub->getResult();
		$data = [
			'isi' => $hasil,
			'berita' => $berita,
			// 'runtext' => $runtext,
			'nav' => $hasilNav,
			'sub' => $hasilSub
		];
		if ($hasil == null) {
			echo view('errors/html/error_404');
		} else {

			echo view('berita/head');
			echo view('berita/navbar', $data);
			echo view('berita', $data);
			echo view('berita/footer');
		}
	}

	//--------------------------------------------------------------------

}
