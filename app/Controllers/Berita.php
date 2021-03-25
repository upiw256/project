<?php

namespace App\Controllers;

use M_home;

class Berita extends BaseController
{


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
      // 'runtext' => $runtext,
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
}
