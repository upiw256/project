<?php

use CodeIgniter\Model;

class M_home extends Model
{
  protected $table      = 'post';
  protected $primaryKey = 'id_post';
  protected $createdField = 'tgl_buat';
}
