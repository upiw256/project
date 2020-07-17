<?php

use CodeIgniter\Model;

class M_login extends Model
{
  protected $table      = 'user';
  protected $primaryKey = 'id_user';
  protected $createdField = 'tgl_buat';
}
