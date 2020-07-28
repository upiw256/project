<?php

namespace App\Controllers;

use M_login;
use M_post;

class Admin extends BaseController
{
  public function index()
  {
    if (session()->get('nama_user') == null) {
      return redirect()->to("/login");
    } else {
      return view('admin');
    }
  }
  public function cek()
  {
    $user = new M_login();
    $username = $this->request->getVar('username');
    $password = $this->request->getVar('password');
    $cekuser = $user->where('username', $username)->first();
    $cekpass = $user->where('password', $password)->first();
    if ($cekuser == null) {
      session()->setFlashdata('pesan', 'Username Salah');
      return redirect()->to('/login');
    } elseif ($cekpass == null) {
      session()->setFlashdata('pesan', 'Password Salah');
      return redirect()->to('/login');
    } elseif ($cekuser == null && $password == null) {
      session()->setFlashdata('pesan', 'Username dan Password Salah');
      return redirect()->to('/login');
    } else {
      $data = [
        'id_user' => $cekuser['id_user'],
        'username' => $cekuser["username"],
        'password' => $cekuser["password"],
        'nama_user' => $cekpass["nama_user"],
        'email' => $cekuser["email"],
        'role' => $cekuser["role"],
      ];
      session()->set($data);
      return redirect()->to('/admin');
    }
  }
  public function menu()
  {
    if (session()->get('nama_user') == null) {
      return redirect()->to("/login");
    } else if (session()->get('role') == 1) {
      echo view("admin/header.php");
      echo view("admin/menu.php");
      echo view("admin/new_menu.php");
      echo view("admin/footer.php");
      echo view("admin/js.php");
    } else if (session()->to('role') == 2) {
      return redirect()->to('/author');
    }
  }
  public function logout()
  {
    session()->destroy();
    return redirect()->to(base_url());
  }
  public function input_menu()
  {
    $post = new M_post();
    date_default_timezone_set("Asia/Jakarta");
    $author = session()->get('id_user');
    $tanggal = date("d/m/Y");
    $judul = $this->request->getVar('judul');
    $slug = url_title($judul, '-', true);
    $isi = $this->request->getVar('isi');
    $data = [
      'id_user' => intval($author),
      'slug' => $slug,
      'judul' => $judul,
      'isi' => $isi,
      'tgl_buat' => $tanggal
    ];
    $db = \Config\Database::connect();
    $page = $db->query("INSERT INTO `page`(`id_user`, `slug`, `judul`, `isi_page`, `tgl_buat`,`sub`) VALUES (" . $author . ",'" . $slug . "','" . $judul . "','" . $isi . "','" . $tanggal . "','false')");
    $hasil = $db->query("SELECT COUNT(*) AS 'page' FROM `page`");
    $count = $hasil->getResult();
    if ($count > 10) {
      session()->setFlashdata('pesan', 'Menu sudah penuh');
    } else {
      $page->getResult();
    }
    return redirect()->to(base_url("admin/menu"));
  }
  public function subMenu()
  {
    if (session()->get('nama_user') == null) {
      return redirect()->to("/login");
    } else if (session()->get('role') == 1) {
      $db = \Config\Database::connect();
      $hasil = $db->query("SELECT * FROM `page`");
      $page = $hasil->getResult();
      $data = [
        'page' => $page
      ];
      echo view("admin/header.php");
      echo view("admin/menu.php");
      echo view("admin/sub_menu.php", $data);
      echo view("admin/footer.php");
      echo view("admin/js.php");
    } else if (session()->to('role') == 2) {
      return redirect()->to('/author');
    }

    # SELECT * FROM ((sub_menu INNER JOIN page ON page.id_page = sub_menu.id_page)INNER JOIN user ON page.id_user = user.id_user)
  }
  public function input_subMenu()
  {
    $db = \Config\Database::connect();
    $id_page = $this->request->getVar('id_page');
    $judul_sub = $this->request->getVar('judul');
    $isi = $this->request->getVar('isi');
    $slug_sub = url_title($judul_sub, '-', true);
    $page = $db->query("INSERT INTO `sub_menu`(`id_page`, `judul_sub_menu`,`isi_sub_menu`, `slug_sub`) VALUES (" . $id_page . ",'" . $judul_sub . "','" . $isi . "','" . $slug_sub . "')");
    $page_edit = $db->query("UPDATE `page` SET `sub` = 'true' WHERE `id_page` = " . $id_page);
    //dd($page_edit);
    $page_edit->getResult();
    $page->getResult();
    return redirect()->to(base_url("admin/subMenu"));
  }


  //--------------------------------------------------------------------

}
