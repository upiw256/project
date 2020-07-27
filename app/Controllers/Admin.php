<?php

namespace App\Controllers;

use M_login;

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
  public function logout()
  {
    session()->destroy();
    return redirect()->to('/login');
  }

  //--------------------------------------------------------------------

}
