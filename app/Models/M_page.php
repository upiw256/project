<?php

namespace App\Models;

use CodeIgniter\Model;

class M_page extends Model
{
  protected $table      = 'page';
  protected $primaryKey = 'id_page';
  protected $createdField = 'tgl_buat';
}
