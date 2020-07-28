<?php

namespace App\Controllers;

use M_login;
use M_kepsek;
use M_post;

class Admin extends BaseController
{
  public function index()
  {
    if (session()->get('nama_user') == null) {
      return redirect()->to("/login");
    } else if (session()->get('role') == 1) {
      return view('admin');
    } else if (session()->to('role') == 2) {
      return redirect()->to('/author');
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
    $page = $db->query("INSERT INTO `page`(`id_user`, `slug`, `judul`, `isi_page`, `tgl_buat`) VALUES (" . $author . ",'" . $slug . "','" . $judul . "','" . $isi . "','" . $tanggal . "')");
    $page->getResult();
    return redirect()->to(base_url("admin/menu"));
  }

  //--------------------------------------------------------------------

}
